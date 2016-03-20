<?php namespace App\Http\Controllers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Input, Auth, Session, Redirect, Hash, Socialite;
use App;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
class FacebookController extends Controller {

	public function facebook(){
		return Socialite::with('facebook')->redirect();
	}

	public function callback(){

		if (Auth::check()) {
			Auth::logout();
		}

		$user = Socialite::with('facebook')->user();
		if($user){
			$userDB = User::where('email', '=', $user->email)->first();
			if($userDB){
				Auth::loginUsingId($userDB->id);
			} else {
				$newUser = new User();
				$newUser->email = $user->email;
				$newUser->password = Hash::make(uniqid());
				$newUser->role = 'User';
				$newUser->save();
				Auth::loginUsingId($newUser->id);
			}
			
		}

		return redirect('main');
	}

}