<?php

namespace App\Http\Controllers\System\Admin\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Admin\Member\Edit_MemberRequest;
use App\Http\Requests\System\Admin\Member\MemberRequest;
use App\Models\Member;
use App\traits\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
class MemberController extends Controller
{
    use Image;
    public function index()
    {
        return view('system.admin.pages.members.member');
    }

    
    public function create()
    {
        //
    }

    public function store(MemberRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = $this->singel_image('Member',$request->name,$request->file('image'));
        }
        else 
        {
            $data['image'] = 'main/main.png';
        }
        $insert_member = Member::create($data);
        if($insert_member)
        {
            return ['error'=>false];
        }
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('system.admin.pages.members.components.include.show',['member'=>$member]);
    }

    public function edit($id)
    {
        $data = Member::find($id);

        if(!$data)
        {
            return ['error'=>true];
        }
        return ['data'=>$data,'error'=>false];
    }

    public function update(Edit_MemberRequest $request, $id)
    {
        
           //this code to update element in database
           $id = Member::find($id); //to search about id in database
           if(!$id){
               return ['error'=>true]; //if id doesn't exists return true of error
           }
           $data = $request->all(); // to set all data from request in data variable

           if($request->hasFile('image'))
           {
               if($id->image != 'main/main.png')
               {
                  $this->delete_singel_image('Member',$id->image);
               }
                $data['image'] = $this->singel_image('Member',$request->name,$request->file('image'));
           }
           $update_member= $id->update($data); //to update Subject_group data in database

          if(!$update_member)
          {
              return ['error'=>true]; //if any error
          }
    }

    public function destroy($id)
    {
           //this code to delete element in database
           $id = Member::find($id); //to search about id in database
           if(!$id){
               return ['error'=>true]; //if id doesn't exists return true of error
           }
           if($id->image != 'main/main.png')
           {
              $this->delete_singel_image('Member',$id->image);
           }          
           $id->invoices()->delete();
           $id->attendances()->delete();
          $id->delete(); //to update data in database
          return ['error'=>false];
    }
    
    public function multi_delete(Request $request)
    {
        $id = $request->id; //get all id in request
        foreach($id as $item)
        {
            $item = Member::find($item);
            if($item->image != 'main/main.png')
            {
               $this->delete_singel_image('Member',$item->image);
            }  
        }
        Member::whereIn('id',$id)->delete(); //to delete all grade which selected
        return 'done';
    }
    
    public function getMembers(Request $request)
    {
        if ($request->ajax()) {
            $data = Member::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('age', function($row){
                    return $row->age != null ? $row->age : 'غير مسجل' ;
                })
                
                ->addColumn('type', function($row){
                    return $row->type != null ? $row->type : 'غير مسجل' ;
                })
                ->addColumn('date_joining', function($row){
                    return $row->date_joining != null ? $row->date_joining : 'غير مسجل' ;
                })
                ->addColumn('status', function($row){
                   $active = $row->active == 'on' ? 'checked' : '' ;
                   return '<div class="custom-control custom-switch custom-control-inline mb-1"
                    style="display: block;margin: auto 0;">
                   <input type="checkbox" class="custom-control-input custom-switch-input"
                    '.$active.' id="customSwitch'.$row->id.'" data-route="'.route('admin.members.status_member').'" data-id='.$row->id.'>
                   <label class="custom-control-label mr-1" for="customSwitch'.$row->id.'">
                   </label>
                 </div>';

                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="dropdown dropdown-inline">	                            
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown" aria-expanded="false">	 
                        <span class="svg-icon svg-icon-md">	                                    
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                        
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                            
                        <rect x="0" y="0" width="24" height="24"></rect>	                                            
                        <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>	                                        
                        </g>	                                    
                        </svg>	                                
                        </span>	                            
                        </a>	                            	                        
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="display: none;">	                                
                        <ul class="navi flex-column navi-hover py-2">	                                    
                            <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">اختر الاعداد : 	                                    
                            </li>	
                                                   
                        <li class="navi-item">	                                        
                            <a href="'.route('admin.invoice.index',['id'=>$row->id,'name'=>strtr($row->name,' ','_')]).'"
                            target="_blank" style="color:red" class="navi-link" data-id="'.$row->id.'">	                                            
                                <span class="navi-icon"><i class="la la-file-invoice-dollar"></i></span>	                                            
                                <span class="navi-text">الاشتراكات</span>	                                        
                            </a>	                                    
                        </li>                                    
                        <li class="navi-item">	                                        
                                <a href="#" style="color:green" class="edit_element navi-link" data-id="'.$row->id.'" 
                                data-route="'.route('admin.members.edit',$row->id).'">	                                            
                                <span class="navi-icon"><i class="la la-edit"></i></span>	                                            
                                <span class="navi-text">تعديل</span>	                                        
                                </a>
                                
                        </li>	                                    
                        <li class="navi-item">	                                        
                        <a href="#" style="color:red" class="navi-link delete_element" data-id="'.$row->id.'"
                        data-route="'.route('admin.members.destroy',$row->id).'">                                            
                                <span class="navi-icon"><i class="la la-trash"></i></span>	                                            
                                <span class="navi-text">حذف</span>	                                        
                                </a>	                                    
                        </li>	                                    
                        <li class="navi-item">	                                        
                                <a href="'.route('admin.members.show',$row->id).'" 
                                target="_blank" style="color:red" class="navi-link show_element" data-id="'.$row->id.'">	                                            
                                    <span class="navi-icon"><i class="la la-eye"></i></span>	                                            
                                    <span class="navi-text">عرض</span>	                                        
                                </a>	                                    
                        </li>	                                    	                                
                    </ul>	                            
                    </div>
                    </div>
                    ';
                    return $actionBtn;
                })
                ->addColumn('multi_delete', function ($row)
                {
                   return '<label class="checkbox checkbox-outline checkbox-success">
                                <input type="checkbox" class="check_row" name="Checkboxes'.$row->id.'" value='.$row->id.'>
                                <span></span>
                            </label>';
               })
                ->rawColumns(['age','type','status','date_joining','action','multi_delete'])
                ->make(true);
        }
    }

    public function status_member(Request $request)
    {
        //this ifunction to insert value of checkbox
        $id = Member::find($request->id); //to search about id in database
        if(!$id)
        {
            return ['error'=>true];
        }
        if ($request->status == 1) // this refer to if checkbox input is checked
        {
            $id->update(['active' => 'on']); //to update statue value in database
        }
        else 
        {
            $id->update(['active' => 'off']); //to update statue value in database
        }
         return ['error'=>false]; //return any result

    }
}
