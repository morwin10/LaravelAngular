<?php  namespace App\Http\Controllers\AuthAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\User;
use Validator;


class AuthController extends Controller
{

   

    // inital - validator for signup 
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:1',
        ]);
    }
    // inital
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'api_token' => str_random(60),
            'password' => bcrypt($data['password']),
        ]);
    }




    public function postLogin(Request $request)
    {
        return $this->login($request);
    }

    protected function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        if ( Auth::once(['email' => $request->email, 'password' => $request->password]) ) { 
            
            User::find(Auth::user()->id)->update([ 'api_token' => str_random(60) ]);

            Auth::user()->email == 'morwin10@gmail.com' ? Auth::user()->admin = '1' : false;

            return Auth::user();
        }

        return response()->json([
            'error' => 'Username and password do not match.'
        ], 422);

    }    

    public function getUniqueEmail($request, $user) // Auth::user()
    {
        return;
    }

    //  RedirectsUsers.php

    protected function register(Request $request)
    {

        $validator = $this->validator($request->all()); // validate inputs

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        return $this->create($request->all());
    }

    protected function emailExist(Request $request){

        return response('', User::where('email',$request->email)->first() ? 422 : 200);

    }

    public function postRegister(Request $request)
    {
        return $this->register($request);
    }


}
