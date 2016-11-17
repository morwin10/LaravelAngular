<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRegister extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            're_password' => 'required|same:password',
        ];
    }
}
