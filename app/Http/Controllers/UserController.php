<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Input;

class UserController extends BaseController
{
  public function __construct() {
    parent::__construct();
    $this->middleware('user', ['except' => ['getLogout', 'getEdit']]);;
  }



  public function getLogin(){
        self::$data['ds'] = 'store/order';
        self::$data['title'] = 'Sign in';
        return view('form.signin', self::$data);
    }
    
    public function postSingin(Requests\UserValidate $valid){
        if( User::UserValidate($valid['email'], $valid['password']) ){
          return ($valid['ds']) ? redirect($valid['ds']) : redirect('');
        } else {
            Session::flash('em','Sorry, Wrong Email / Password combination');
            return redirect('user/login');
        }
    }   
    
    public function getRegister(){
        self::$data['title'] = 'Sign up';
        return view('form.signup', self::$data);
    }
    
    public function postSignup(\App\Http\Requests\UserRegister $request){
      User::NewUser($request);
      return redirect('user/login');
    }

    public function getEdit(){
      echo 'Edit';
    }
    
    public function getLogout(){
      Session::forget('user_id');
      Session::forget('user_name');
      if(Session::has('is_admin')){
        Session::forget('is_admin');
      }
      return redirect('');
    }
}
