<?php  namespace App\Http\Requests;

use App\Http\Requests\Request;

class CMSNewCategorie extends Request
{
    public function authorize()
    {
        return TRUE;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:2',
            'article' => 'required|min:2',

        ];
    }
    
    public function messages() {
        return [
            
        ];
    }
}
