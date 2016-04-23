<?php namespace App\Http\Controllers\Visitor;

use Input, Session, Redirect, Auth, File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitorProfile;
use App\Models\Country;
use App\Models\City;
class ProfileController extends Controller {

	public function getIndex(){
		//print_r($visitorProfile);
		$visitorProfile = VisitorProfile::where('mst001_id', '=', Auth::user()->id)->first();
		$countries = Country::all()->sortBy('country_name');
		$countryList = Country::orderBy('country_name')->lists('country_name', 'id');
		
		return view('visitor.profile.visitor-profile-browse')
				->with('profile', $visitorProfile)
				->with('countries', $countries)
				->with('countryList', $countryList);
	}

	public function getInput(){
		return view('visitorprofile.visitor-profile-input');
	}

	public function postSave(Request $request){
		$data = Input::all();
		$visitorProfile = new VisitorProfile();
		$errorBag = $visitorProfile->rules($data);

		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('visitor-profile')
				->withInput($data);
		} else {

			if(isset($data['id'])){
				$visitorProfile = VisitorProfile::find($data['id']);
				if($visitorProfile == null){
	    			$visitorProfile = new VisitorProfile();
	    		}
			}

			$visitorProfile->doParams($visitorProfile, $data);
			

			if($request->hasFile('photo')){
				if($request->file('photo')->isValid()){

					$path = './files/visitor/'.Auth::user()->id;
					if(!File::exists($path)) {
					    File::makeDirectory($path, $mode = 0777, true, true);
					}
					
					$visitorProfile->photo = $request->file('photo')->getClientOriginalName();
		            $request->file('photo')->move($path, $visitorProfile->photo);
					
				}
			} 
			
			$visitorProfile->save();
			return redirect('visitor-profile')->with('message', array('Data anda telah berhasil di simpan'))
			->withInput($visitorProfile->toArray());
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $visitorProfile = VisitorProfile::find($passvalue['ID']);

            if($visitorProfile == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('visitor-profile');
            }

            //print_r($visitorProfile->toArray());
            return Redirect::to('visitor-profile')->withInput($visitorProfile->toArray());
        }
    }

    public function postCityByCountry(Request $request){
    	$country = $request->country;
    	$cities = City::where('mst002_id', '=', $country)->orderBy('city_name')->get(['id', 'city_name'])->toArray();
    	return json_encode($cities);
    }
}
