<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
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
            'user_name'=>'required',
            'password'=>'required',
        ];
    }


    public  function messages(){

        return [
            'user_name.required' =>'用户名不能为空',
            'password.required'  =>'密码不能为空',
        ];

    }
}
