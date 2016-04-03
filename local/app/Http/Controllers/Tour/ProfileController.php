<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth, File, Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourProfile;
use App\User;
use App\Models\Country;
use App\Models\City;

class ProfileController extends Controller {

	public function getIndex(){
		$tourProfile = TourProfile::where('mst001_id', '=', Auth::user()->id)->first();
		$countries = Country::all()->sortBy('country_name');
		$cities = City::where('mst002_id', '=', $tourProfile['mst002_id'])->orderBy('city_name')->get();

		return view('tour.profile.tour-profile-browse')
				->with('tourProfile', $tourProfile)
				->with('countries', $countries)
				->with('cities', $cities);
	}

	public function postSave(Request $request){
		$data = $request->all();
		$tourProfile = new TourProfile();
		$errorBag = $tourProfile->rules($data);
		$logoFile;

		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-profile')->withInput($data);
		} else {

			if(isset($data['id'])){
				$tourProfile = TourProfile::find($data['id']);
				
				if($tourProfile == null){
					$tourProfile = new TourProfile();
				} else {
					$logoFile = $tourProfile->logo;
				}
			}

			$tourProfile->doParams($tourProfile, $data);
			$tourProfile->save();
			
			if($request->hasFile('logo')){
				if($request->file('logo')->isValid()){

					$path = $this->getPath();
					
					if(!File::exists($path)) {
						File::makeDirectory($path, $mode = 0777, true, true);
					}
					
					$request->file('logo')->move($path, $request->file('logo')->getClientOriginalName());

					if($request->hasFile('logo')){
						if($logoFile != $request->file('logo')){
							File::delete($path.'/'.$logoFile);
						}
					}
				}
			}
			
			if(isset($request->password)){
				$this->saveUser($request);
			}
			
			return redirect('tour-profile')->with('message', array('Data tour profile telah berhasil di buat'))
					->withInput($tourProfile->toArray());
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
	
	private function saveUser(Request $request){
		$user = User::find(Auth::user()->id);
		$user->password = Hash::make($request->password);
		$user->save();
	}
	
	private function getPath(){
		return './'.config('constants.TOUR_ALBUM').Auth::user()->id;
	}
}
