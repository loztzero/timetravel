<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth, File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourProfile;
use App\User;
use App\Models\Country;
use App\Models\City;

class ProfileController extends Controller {

	public function getIndex(){
		$tourProfile = TourProfile::where('mst001_id', '=', '2')->first();//Auth::user()->id)->first();
		$tourProfile['user'] = User::find($tourProfile['mst001_id'])->toArray();
		$countries = Country::all()->sortBy('country_name');
		$cities = City::where('mst002_id', '=', $tourProfile['mst002_id'])->orderBy('city_name')->get();

		return view('tour.profile.tour-profile-browse')
				->with('tourProfile', $tourProfile)
				->with('countries', $countries)
				->with('cities', $cities);
	}

	public function postSave(){
		$data = Input::all();
		$tourProfile = new TourProfile();
		$errorBag = $tourProfile->rules($data);

		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-profile')->withInput($data);
		} else {

			if(isset($data['id'])){
				$tourProfile = TourProfile::find($data['id']);
				if($tourProfile == null){
					$tourProfile = new TourProfile();
				}
			}

// 			$data = Input::hasFile('fileUpload');
// 			Input::file('fileUpload')->move('./files/', Input::file('fileUpload')->getClientOriginalName());

			$tourProfile->doParams($tourProfile, $data);
			$tourProfile->save();

			return redirect('tour-profile')->with('message', array('Data tour profile telah berhasil di buat'));
		}
	}

	public function getCityByCountry(Request $request){
		$countryId = $request->countryId;
		$cities = City::where('mst002_id', '=', $countryId)->orderBy('city_name')->get()->toJson();

		return $cities;
	}

	public function getCityByCountrySearch(Request $request){
		$countryIdSearch = $request->countryIdSearch;
		$cities = City::where('mst002_id', '=', $countryIdSearch)->orderBy('city_name')->get()->toJson();

		return $cities;
	}
}
