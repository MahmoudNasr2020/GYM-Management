<?php

namespace App\Http\Requests\System\Admin\Fee;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'       =>            ['required','unique:fees,name,'.$this->id],
            'amount'      =>            ['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'           =>    'اسم الاشتراك مطلوب',
            'name.unique'             =>    'هذا الاشتراك موجود بالفعل',
            'amount.required'         =>    'قيمة الاشتراك مطلوبة',
            'amount.numeric'            =>    'قيمة الاشتراك يجب ان تكون رقمية',
        ];
    }
}
