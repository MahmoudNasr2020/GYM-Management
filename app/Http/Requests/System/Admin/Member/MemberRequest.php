<?php

namespace App\Http\Requests\System\Admin\Member;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'       =>            ['required'],
            'phone'      =>            ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10','unique:members,phone'],
            'f-weight'   =>            ['nullable','numeric'],
            'age'        =>            ['nullable','numeric'],
            'type'       =>            ['nullable','string'],
            'image'      =>            ['nullable','image','max:2064'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'           =>    'اسم العضو مطلوب',
            'phone.required'          =>    'رقم التلفون مطلوب',
            'phone.regex'             =>    'يجب ادخال رقم تلفون صالح',
            'phone.unique'            =>    'رقم الموبايل مسجل بالفعل',
            'f-weight.numeric'        =>    'وزن العضو يجب ان يكون رقمي',
            'age.numeric'             =>    'عمر العضو يجب ان يكون رقمي',
            'type.string'             =>    'نوع الاشتراك يجب ان يكون نصي',
            'image.image'             =>    'الصورة غير صالحة',
            'image.max'               =>    'حجم الصورة كبير',
        ];
    }
}
