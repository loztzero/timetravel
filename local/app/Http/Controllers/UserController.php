<?php namespace App\Http\Controllers;

use Illuminate\Routing\UrlGenerator;
use Input, Auth, Request, Session, Redirect, Hash;
use App\User;
class UserController extends Controller {

	public function getIndex()
	{
		if(Auth::check()){
			//echo "welcome".Auth::user()->email;
		}

		echo "nothing here";
		//return view('main.main-browse', array('data' => 'bebek'));
	}

	public function postValidateUser(){

		$data = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($data, true)){
			return Redirect::to('/main');
		} else {
			Session::flash('error', array('Wrong email or password.', 'Sign up here for new account'));
			return Redirect::to('/main/register');
		}

	}

	public function getLogout(){
		Auth::logout();
		return Redirect::to('/main');
	}

}
