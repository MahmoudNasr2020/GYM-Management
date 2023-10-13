<?php

namespace App\Http\Requests\System\Admin\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            //'name'=>['required','string','max:100'],
            'username' => ['required'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return 
        [
            'username.required' => 'اسم المستخدم مطلوب',
            'password.required' => ' كلمة السر مطلوبة'
        ];
    }
}
