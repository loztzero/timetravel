<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Input, Auth, Session, Redirect, Hash;
use App\User;
class MainController extends Controller {

	public function getIndex()
	{
		return view('main.main-page');
	}

	public function postCheck(Request $request){
		
		$userdata = array(
			'email' => $request->email,
			'password' => $request->password
		);

		if(Auth::attempt($userdata, true)){
			return Redirect::to('/');
		} else {
			Session::flash('error', 'User atau password salah');
			return Redirect::to('/');
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
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

	public function getTrialNewLayout(){
		return view('layouts.common-layout');
	}


}
