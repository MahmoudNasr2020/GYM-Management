<?php

namespace App\Http\Requests\System\Admin\Admin_Setting;

use Illuminate\Foundation\Http\FormRequest;

class Admin_SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'      =>          ['required','string'],
            'username'  =>          ['required','string','unique:admins,username,'.$this->admin_id],
            'password'  =>          ['nullable','string', 'confirmed'],
            'image'     =>          ['nullable','image','max:4000'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'               =>    'الاسم مطلوب',
            'name.string'                 =>    'الاسم يجب ان يكون نصي',
            'username.required'           =>    'اسم المستخدم مطلوب',
            'username.string'             =>    'اسم المستخدم يجب ان يكون نصي',
            'username.unique'             =>    ' اسم المستخدم مسجل بالفعل',
            'password.confirmed'          =>    'كلمة السر غير متطابقة',
            'password.string'             =>    'كلمة السر يجب ان تكون نصية',
            'image.image'                 =>    'الصورة غير صالحة',
            'image.max'                   =>    'حجم الصورة كبير',
        ];
    }
}
