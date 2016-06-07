<?php namespace App\Http\Controllers\Auth;

use Input, Session, Redirect, Auth, File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Country;

class ChangePasswordController extends Controller {

	public function getIndex(){
		$countries = Country::all()->sortBy('country_name');

		return view('general.changepassword.change-password-browse')
				->with('countries', $countries);
	}

	public function postSave(Request $request){
		$data = $request->all();
		$user = new user();
		$errorBag = $user->rules($data);

		if($this->checkOldPassword($request)){
			if(count($errorBag) > 0){
	
				Session::flash('error', $errorBag);
				return redirect('change-password');
			} else {
	
				if(isset($data['id'])){
					$user = user::find($data['id']);
					
					if($user == null){
						$user = new user();
					}
				}
				
				$user->doParams($user, $data);
				$user->save();
				
				return redirect('change-password')->with('message', array('Password berhasil diubah'))
						->withInput($user->toArray());
			}
		}
	}
	
	private function checkOldPassword(Request $request){
		$userdata = array(
			'email' => $request->email,
			'password' => $request->old_password
		);
		
		if(Auth::attempt($userdata)){
			return true;
		} else {
			Session::flash('error', 'Password lama salah');
			return redirect('change-password');
		}
	}
}
