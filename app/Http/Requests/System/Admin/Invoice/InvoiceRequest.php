<?php

namespace App\Http\Requests\System\Admin\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'member_id'        =>            ['required'],
            'start_date'       =>            ['required'],
            'end_date'         =>            ['required'],
            'fee'              =>            ['required','not_in:0'],
            'status'           =>            ['required','not_in:0'],
            'paid_up'          =>            ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'member_id.required'                    =>    'الرقم الخاص بالمشترك مطلوب',
            'start_date.required'                   =>    'تاريخ بداية الاشتراك مطلوب',
            'end_date.required'                     =>    'تاريخ نهاية الاشتراك مطلوب',
            'fee.required'                          =>    'نوع الاشتراك مطلوب',
            'fee.not_in'                            =>    'يجب اختيار نوع الاشتراك',
            'status.required'                       =>    'حالة الاشتراك مطلوبة',
            'status.not_in'                         =>    'يجب اختيار حالة الاشتراك',
            'paid_up.required'                      =>    'المبلغ المدفوع مطلوب',
            'paid_up.numeric'                       =>    'قيمة المبلغ المدفوع يجب ان تكون رقمية',
        ];
    }
}
