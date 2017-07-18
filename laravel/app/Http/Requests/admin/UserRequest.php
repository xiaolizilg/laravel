<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'user_name'=>'required',
            'phone'=>'required|numeric|min:10',
            'email'=>'email',
        ];
    }


    public  function messages(){

        return [
            'user_name.required'=>'用户名不能为空',
            'phone.required'=>'手机不能为空',
            'email.email'=>'请输入正确的邮箱地址',
            'phone.numeric'=>'请输入正确的手机号码',
            'phone.min'=>'请输入11位手机号码',
            
        ];

    }
}
