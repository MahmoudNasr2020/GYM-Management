<?php

namespace App\Http\Controllers\System\Admin\Fee;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Admin\Fee\FeeRequest;
use App\Models\Fee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeeController extends Controller
{
    public function index()
    {
        return view('system\admin\pages\fees\fee');
    }

    
    public function create()
    {
        //
    }

    public function store(FeeRequest $request)
    {
        $insert_fee = Fee::create(['name'=>$request->name,'amount'=>$request->amount]);
        if($insert_fee)
        {
            return ['error'=>false];
        }
    }

    public function show($id)
    {
      
    }

    public function edit($id)
    {
        $data = Fee::find($id);

        if(!$data)
        {
            return ['error'=>true];
        }
        return ['data'=>$data,'error'=>false];
    }

    public function update(FeeRequest $request, $id)
    {
        
           //this code to update element in database
           $id = Fee::find($id); //to search about id in database
           if(!$id){
               return ['error'=>true]; //if id doesn't exists return true of error
           }
           $update_fee= $id->update(['name'=>$request->name,'amount'=>$request->amount]); //to update Subject_group data in database

          if(!$update_fee)
          {
              return ['error'=>true]; //if any error
          }
    }

    public function destroy($id)
    {
           //this code to delete element in database
           $id = Fee::find($id); //to search about id in database
           if(!$id){
               return ['error'=>true]; //if id doesn't exists return true of error
           }          
          $id->delete(); //to update data in database
          return ['error'=>false];
    }
    
    public function multi_delete(Request $request)
    {
        $id = $request->id; //get all id in request
        Fee::whereIn('id',$id)->delete(); //to delete all grade which selected
        return 'done';
    }
    
    public function getFees(Request $request)
    {
        if ($request->ajax()) {
            $data = Fee::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="#" style="color:green" class="edit_element" data-id="'.$row->id.'" 
                    data-route="'.route('admin.fees.edit',$row->id).'"
                    title="Edit">
                    <i class="fa fa-edit" style="top:0;color:green;font-size: 14px;"></i>
               </a>
               
               <a href="#" style="color:red" class="delete_element" data-id="'.$row->id.'"
               data-route="'.route('admin.fees.destroy',$row->id).'"
               title="Delete">
                   <i class="fa fa-trash-alt" style="top:0;color:red;font-size: 14px;"></i>
               </a>';
                    return $actionBtn;
                })
                ->addColumn('multi_delete', function ($row)
                {
                   return '<label class="checkbox checkbox-outline checkbox-success">
                                <input type="checkbox" class="check_row" name="Checkboxes'.$row->id.'" value='.$row->id.'>
                                <span></span>
                            </label>';
               })
                ->rawColumns(['action','multi_delete'])
                ->make(true);
        }
    }

}
