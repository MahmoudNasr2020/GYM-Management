<?php

namespace App\Http\Requests\System\Admin\Message;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'message'   => ['required','string'],
           'member_id' => ['required_if:form_type,==,single_member'],
        ];
    }
    public function messages()
    {
        return [
            'message.required'                      =>    'يجب ادخال الرسالة',
            'message.string'                        =>    'الرسالة يجب ان تكون نصية',
            'member_id.required_if'                    =>    'رقم المشترك مطلوب',

        ];
    }
}
