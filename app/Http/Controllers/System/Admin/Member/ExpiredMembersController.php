<?php

namespace App\Http\Controllers\System\Admin\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Admin\Message\MessageRequest;
use App\Models\Invoice;
use App\Models\Member;
use App\Models\Message;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExpiredMembersController extends Controller
{
    public function index()
    {
        return view('system.admin.pages.members_expired.member_expired');
    }
    public function send_message(MessageRequest $request)
    {
        
        if($request->form_type == 'all_members')
        {
            $members = explode(',',$request->id);
            foreach($members as $member)
            {
                Message::create([
                    'member_id'=>$member,
                    'message' =>$request->message
                ]);
            }
            return ['error'=>false];
        }
        elseif($request->form_type == 'single_member')
        {
            $member = Member::find($request->member_id);
            if(!$member)
            {
                return ['error'=>true];
            }
            Message::create([
                'member_id'=>$request->member_id,
                'message' =>$request->message
            ]);
            return ['error'=>false];
        }
    }
    public function messages($id)
    {
        $member = Member::select('id','name','image')->find($id);
        $member_messages = Message::where('member_id',$id)->get();
        return view('system.admin.pages.indebted_members.components.include.messages',['member_messages'=>$member_messages,'member'=>$member]);
    }
    public function getExpiredMembers(Request $request)
    {
        if ($request->ajax()) {
            $data = Invoice::with('member')->where(['status'=>'active'])->latest()->get();
            $new_data = [];
            foreach($data as $item)
            {
                $diff_date = strtotime($item->end_date) - strtotime(date('Y-m-d'));
               if(round($diff_date / (60 * 60 * 24)) <= 7)
               {
                 $item->remaining_date =  round($diff_date / (60 * 60 * 24)); 
                 $new_data[] = $item;
               }
            }
            return DataTables::of($new_data)
                ->addIndexColumn()
                ->addColumn('name', function($row){
                    return $row->member->name;
                })
                ->addColumn('phone', function($row){
                    return $row->member->phone;
                })
                ->addColumn('remaining_date', function($row){
                    return $row->remaining_date .' يوم';
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
                                <a href="'.route('admin.indebted_members.messages',['id'=>$row->member->id,'name'=>strtr($row->member->name,' ','_')]).'" 
                                target="_blank" style="color:red" class="navi-link show_element" data-id="'.$row->member->id.'">	                                            
                                    <span class="navi-icon"><i class="la la-eye"></i></span>	                                            
                                    <span class="navi-text">عرض الرسائل</span>	                                        
                                </a>	                                    
                            </li>
                        <li class="navi-item">	                                        
                            <a href="'.route('admin.invoice.index',['id'=>$row->member->id,'name'=>strtr($row->member->name,' ','_')]).'"
                            target="_blank" style="color:red" class="navi-link" data-id="'.$row->id.'">	                                            
                                <span class="navi-icon"><i class="la la-file-invoice-dollar"></i></span>	                                            
                                <span class="navi-text">الاشتراكات</span>	                                        
                            </a>	                                    
                        </li>                                    	                                    

                        <li class="navi-item">	                                        
                                <a href="'.route('admin.members.show',$row->member->id).'" 
                                target="_blank" style="color:red" class="navi-link show_element" data-id="'.$row->member->id.'">	                                            
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
                ->addColumn('multi_send', function ($row)
                {
                   return '<a href="#" class="send_message" title="send message"
                   data-member_id='.$row->member_id.' data-member_name="'.$row->member->name.'">
                   <i class="fas fa-envelope" style="cursor:pointer"></i>
                   </a>';
               })
                ->rawColumns(['multi_send','remaining','name','phone','action'])
                ->make(true);
        }
    }
}
