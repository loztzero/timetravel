<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth, File, Hash, Mail, Validator, Exception, DB;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourProfile;
use App\User;
use App\Models\Country;
use App\Models\City;

class RegisterController extends Controller {

	public function getIndex() {
		$countries = Country::all()->sortBy('country_name');
		
		return view('tour.register.tour-register-input')
				->with('countries', $countries);
	}

	public function postSave(Request $request){
		$data = $request->all();

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
		
		DB::beginTransaction();
		try {
			$activatedLink = Hash::make(str_random(10));
			$user = new User();
			$user->email = $request->email;
			$user->password = Hash::make($request->password);
			$user->role = 'Tour';
			$user->activation_key = $activatedLink;
			$user->save();
			Mail::send('main.main-email-register',
					array('username' => $request->email, 'newPassword' => $request->password, 'activatedLink' => $activatedLink),
					function($message) use ($user, $request) {
						$message->to($request->email, $request->email)->subject('Your Email Activation');
					});
		
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			Session::flash('error', array('There is error when process your register, please try again', $e->getMessage(), $e->getLine()));
			return Redirect::to('main');
		}
		
		$tourProfile = new TourProfile();
		$errorBag = $tourProfile->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-register-input')->withInput($data);	
		} else {

			if(isset($data['id'])){
				$tourProfile = TourProfile::find($data['id']);
				if($tourProfile == null){
					$tourProfile = new TourProfile();
				}
			}
			
			$data['mst001_id'] = $user->id;
			$tourProfile->doParams($tourProfile, $data);
			$tourProfile->save();
			
			if($request->hasFile('logo')){
				if($request->file('logo')->isValid()){

					$path = './'.config('constants.TOUR_ALBUM').Auth::user()->id;
					
					if(!File::exists($path)) {
						File::makeDirectory($path, $mode = 0777, true, true);
					}
					
					$request->file('logo')->move($path, $request->file('logo')->getClientOriginalName());
					$tourProfile->logo = $request->file('logo')->getClientOriginalName();
				}

			}
			
			Session::flash('message', array('Please check your email in inbox, or our email might went to your spam folder.'));
			return Redirect::to('main');
		}
	}

	public function getCityByCountry(Request $request){
		$countryId = $request->countryId;
		$cities = City::where('mst002_id', '=', $countryId)->orderBy('city_name')->get()->toJson();
		
		return $cities;
	}
}
