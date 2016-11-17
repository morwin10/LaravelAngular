<?php  namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{

	public function postRegister(Request $request)
	{
		return $this->register($request);
	}

	protected function register(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}

		Auth::login($this->create($request->all()));

		return redirect($this->redirectPath());
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:1',
		]);
	}


	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

	public function postSignin(Request $request){
    	print_r( $request->all() );
    	dd( $request->session()->all() );
    }


}
