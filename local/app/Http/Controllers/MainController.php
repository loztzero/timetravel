<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Input, Auth, Session, Redirect, Hash, Mail, Validator, Exception, DB;
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

	public function postRegister(Request $request){

		// $data = $request->all();
		// $user = new User();
		// $errorBag = $user->rulesRegister($request);
		// if(count($errorBag) > 0){
		// 	return redirect('main')->with('error', $errorBag);
		// } else {

			// old script
			// $user = new User();
			// $user->password = Hash::make('tester123'); //$data['password']
			// $user->email = $request->email;
			// $user->role = 'User';
			// $user->save();
			// return redirect('main')->with('message', 'Register success, please check your email for verification');
		
			$rules = array(
	            'email'      => 'required|email',
			 );
			
			$messages = array(
				'email.required' => 'Your email is required',
	      		'email.email' => 'Your email format must be valid',
		 	);

		    $v = Validator::make($request->all(), $rules, $messages );
			if($v->fails()){
				$error = $v->errors()->all();

				Session::flash('error', $error);
                return Redirect::to('main');
			} else {
				$existsMail = User::where('email', '=', $request->email)->first();
				if($existsMail){
					Session::flash('error', array('This email already exists in our system, if already activated you can login with this mail'));
                	return Redirect::to('main');
				}
			}

			//send mail script
			DB::beginTransaction();
			try {
				
				$newPassword = str_random(6);
				$activatedLink = Hash::make(str_random(10));
				$user = new User();
				$user->email = $request->email;
				$user->role = 'User';
				$user->activation_key = $activatedLink;
	            $user->password = Hash::make($newPassword);
	            $user->save();
	            Mail::send('main.main-email-register', 
	            	array('username' => $request->email, 'newPassword' => $newPassword, 'activatedLink' => $activatedLink), 
	            	function($message) use ($user, $request) {
	                $message->to($request->email, $request->email)->subject('Your Email Activation');
	            });

	            DB::commit();
	            Session::flash('message', array('Please check your email in inbox, or our email might went to your spam folder.'));
	            return Redirect::to('main');
			} catch (\Exception $e) {
				DB::rollBack();
				Session::flash('error', array('There is error when process your register, please try again', $e->getMessage(), $e->getLine()));
	            return Redirect::to('main');
			}
			
		// }

	}

	public function getActivateEmail(Request $request){

		if($request->has('key')){
			$key = $request->key;
			$existsKey = User::where('activation_key', '=', $key)->first();
			if($existsKey){
				$existsKey->status = 'Active';
				$existsKey->save();
				Session::flash('message', array('Thank you for activate your email, now you can login to our web'));
				return Redirect::to('main');
			}
		}

		Session::flash('error', array('This link is not valid, please check your email for get the activation link'));
		return Redirect::to('main');
		
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
