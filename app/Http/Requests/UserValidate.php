<?php  namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserValidate extends Request
{
    public function authorize()
    {
        return TRUE;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    
    public function messages() {
        return [
            
        ];
    }
}
