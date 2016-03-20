<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth, File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourRegister;
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
		$tourRegister = new TourRegister();
		$errorBag = $tourRegister->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-register-input')->withInput($data);	
		} else {

			if(isset($data['id'])){
				$tourRegister = TourRegister::find($data['id']);
				if($tourRegister == null){
					$tourRegister = new TourRegister();
				}
			}

			$tourRegister->doParams($tourRegister, $data);
			
			if($request->hasFile('logo')){
				if($request->file('logo')->isValid()){

					$path = './'.config('constants.TOUR_ALBUM').Auth::user()->id;
					
					if(!File::exists($path)) {
						File::makeDirectory($path, $mode = 0777, true, true);
					}
					
					$request->file('logo')->move($path, $request->file('logo')->getClientOriginalName());
					$tourRegister->logo = $request->file('logo')->getClientOriginalName();
				}

			} else {
				//echo $request->hasFile('photo')
			}
			
			$tourRegister->save();
			
			return redirect('tour-registe-input')->with('message', array('Data tour telah berhasil di buat'));
		}
	}

	public function getCityByCountry(Request $request){
		$countryId = $request->countryId;
		$cities = City::where('mst002_id', '=', $countryId)->orderBy('city_name')->get()->toJson();
		
		return $cities;
	}
}
