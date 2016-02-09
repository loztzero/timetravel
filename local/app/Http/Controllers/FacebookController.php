<?php namespace App\Http\Controllers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Input, Auth, Session, Redirect, Hash, Socialite;
use App;
use App\User;
class FacebookController extends Controller {

	public function facebook(){
		return Socialite::with('facebook')->redirect();
	}

	public function callback(){
		$user = Socialite::with('facebook')->user();
		print_r($user);
	}

}