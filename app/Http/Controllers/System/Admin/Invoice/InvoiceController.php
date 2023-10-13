<?php

namespace App\Http\Controllers\System\Admin\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Admin\Invoice\InvoiceRequest;
use App\Models\Fee;
use App\Models\Invoice;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    
    public function index($id)
    {
        $fees = Fee::get(); 
        $member = Member::select('name')->find($id); 
        return view('system\admin\pages\invoices\invoice',['member_id'=>$id,'member'=>$member ,'fees'=>$fees]);
    }

   
    public function create()
    {
        //
    }

   
    public function store(InvoiceRequest $request)
    {
       
        $fee= Fee::find($request->fee);
        $remaining = $fee->amount - $request->paid_up;
        $start_date = strtr($request->start_date, '/', '-');
        $end_date = strtr($request->end_date, '/', '-');
        $start_date = date('Y-m-d',strtotime($start_date));
        $end_date = date('Y-m-d',strtotime($end_date));
        $invoice_member = Invoice::where(['member_id'=>$request->member_id,'fee_id'=>$request->fee])
        ->whereDate('start_date',$start_date)->whereDate('end_date',$end_date)->first();
        if($invoice_member)
        {
            return ['error'=>true];  
        }
        if($request->status == 'active')
        {
            Invoice::where(['member_id'=>$request->member_id,'status'=>'active'])
            ->orderBy('id','desc')->update(['status'=>'finished']);
        }
        $insert_invoice = Invoice::create([
            'member_id'=>$request->member_id,'start_date'=>$start_date,
            'end_date'=>$end_date,'fee_id'=>$request->fee,
            'paid_up'=>$request->paid_up,
            'remaining'=>$remaining,
            'status'=>$request->status
        ]);
        if($insert_invoice)
        {
            return ['error'=>false];
        }
    }

    public function show($id)
    {
        $invoice = Invoice::with('member','fee')->findOrFail($id);
        return view('system.admin.pages.invoices.components.include.show',['invoice'=>$invoice]);
    }

  
    public function edit($id)
    {
        $data = Invoice::find($id);

        if(!$data)
        {
            return ['error'=>true];
        }
        return ['data'=>$data,'error'=>false];
    }

    public function update(InvoiceRequest $request)
    {
          //this code to update element in database
        $id = Invoice::find($request->id); //to search about id in database
        if(!$id)
        {
              return ['error'=>true,'msg'=>'404']; //if id doesn't exists return true of error
        }
        $fee= Fee::find($request->fee);
        $remaining = $fee->amount - $request->paid_up;
        $start_date = strtr($request->start_date, '/', '-');
        $end_date = strtr($request->end_date, '/', '-');
        $start_date = date('Y-m-d',strtotime($start_date));
        $end_date = date('Y-m-d',strtotime($end_date));
        $invoice_member = Invoice::where('id','!=',$request->id)->where(['member_id'=>$request->member_id,'fee_id'=>$request->fee])
        ->whereDate('start_date',$start_date)->whereDate('end_date',$end_date)->first();
        if($invoice_member)
        {
            return ['error'=>true,'msg'=>'200'];  
        }
        if($request->status == 'active')
        {
            Invoice::where('id','!=',$id->id)->where(['member_id'=>$request->member_id,'status'=>'active'])
            ->orderBy('id','desc')->update(['status'=>'finished']);
        }
          $update_invoice= $id->update([
            'member_id'=>$request->member_id,'start_date'=>$start_date,
            'end_date'=>$end_date,'fee_id'=>$request->fee,
            'paid_up'=>$request->paid_up,
            'remaining'=>$remaining,
            'status'=>$request->status
          ]); //to update Subject_group data in database

         if($update_invoice)
         {
             return ['error'=>false]; //if any error
         }
    }

    public function destroy(Request $request)
    {
         //this code to delete element in database
         $id = Invoice::find($request->id); //to search about id in database
         if(!$id){
             return ['error'=>true]; //if id doesn't exists return true of error
         }          
        $id->delete(); //to update data in database
        return ['error'=>false];
    }

    public function multi_delete(Request $request)
    {
        $id = $request->id; //get all id in request
        Invoice::whereIn('id',$id)->delete(); //to delete all grade which selected
        return 'done';
    }
    public function inquiry_remainig(Request $request)
    {
      $data = Invoice::where('member_id',$request->member_id)->sum('remaining');
      return ['data'=>$data,'error'=>false];
    } 
    
    public function remaining(Request $request)
    {
       Invoice::where('member_id',$request->member_id)->orderBy('id','desc')->update(['remaining'=>0]);
       $members_invoice = Invoice::with('fee')->where('member_id',$request->member_id)->get();
        foreach($members_invoice as $member_invoice)
        {
            $member_invoice->update(['paid_up'=>$member_invoice->fee->amount]);
        }
       return ['error'=>false];
    }

    public function getInvoices(Request $request)
    {
        if ($request->ajax()) {
            $data = Invoice::where('member_id',$request->member_id)->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('fee', function($row){
                   return $row->fee->name .' ('. $row->fee->amount.')';

                })
                ->addColumn('status', function($row){
                    $status='';
                   if($row->status == 'active')
                   {
                       $status='<span style="color:red">ساري</span>';
                   }
                   elseif($row->status == 'finished')
                   {
                        $status='<span style="color:green" >منتهي</span>';
                   }
                   elseif($row->status == 'future')
                   {
                        $status='<span style="color:blue">مقبل</span>';
                   }
                   return $status;

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
                                <a href="#" style="color:green" class="edit_element navi-link" data-id="'.$row->id.'" 
                                data-route="'.route('admin.invoice.edit',$row->id).'">	                                            
                                <span class="navi-icon"><i class="la la-edit"></i></span>	                                            
                                <span class="navi-text">تعديل</span>	                                        
                                </a>
                                
                        </li>	                                    
                        <li class="navi-item">	                                        
                        <a href="#" style="color:red" class="navi-link delete_element" data-id="'.$row->id.'"
                        data-route="'.route('admin.invoice.destroy').'">                                            
                                <span class="navi-icon"><i class="la la-trash"></i></span>	                                            
                                <span class="navi-text">حذف</span>	                                        
                                </a>	                                    
                        </li>	                                    
                        <li class="navi-item">	                                        
                                <a href="'.route('admin.invoices.show',$row->id).'" 
                                target="_blank" style="color:red" class="navi-link show_element" data-id="'.$row->id.'">	                                            
                                    <span class="navi-icon"><i class="la la-eye"></i></span>	                                            
                                    <span class="navi-text">عرض</span>	                                        
                                </a>	                                    
                        </li>	                                    	                                
                    </ul>	                            
                    </div>
                    </div>';
                    return $actionBtn;
                })
                ->addColumn('multi_delete', function ($row)
                {
                   return '<label class="checkbox checkbox-outline checkbox-success">
                                <input type="checkbox" class="check_row" name="Checkboxes'.$row->id.'" value='.$row->id.'>
                                <span></span>
                            </label>';
               })
                ->rawColumns(['fee','status','action','multi_delete'])
                ->make(true);
        }
    }
}
