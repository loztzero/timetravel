<?php namespace App\Http\Controllers;

use Illuminate\Routing\UrlGenerator;
use Input, Auth, Request, Session, Redirect, Hash;
use App\User;
class MainController extends Controller {

	public function getIndex()
	{
		if(Auth::check()){
			//echo "welcome".Auth::user()->email;
		}

		return view('main.main-browse', array('data' => 'bebek'));
	}

	public function getRegister()
	{
		return view('main.main-register');	
	}

	public function postSave(){

		$data = Input::all();
		$user = new User();
		$errorBag = $user->rules($data);
		
		if(count($errorBag) > 0){
			return redirect('main/register')
				->withInput(Request::except('password', 'repassword'))
				->with('error', $errorBag);	
		} else {

			$userMail = User::where('email' , '=', $data['email'])->first();
			if($userMail != null) {

				return redirect('main/register')
				->withInput(Request::except('password', 'repassword'))
				->with('errors', array('Time travel <b>'.$data['email'].'</b> telah digunakan'));

			}

			$user = new User();
			$user->password = Hash::make($data['password']);
			$user->email = $data['email'];
			$user->role = 'User';
			$user->save();

			return redirect('main/success');
		}

		
		// print_r($errorBag);
	}

	public function getSuccess(){
		return view('main.main-register-success');
	}


}
