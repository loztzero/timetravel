<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourItinerary;
use App\Models\TourProfile;
use App\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Currency;

class ProfileViewedController extends Controller {

	public function getIndex($profileId){
		$tourProfile = TourProfile::where('mst001_id', '=', $profileId)->first();
		$tourItinerary = TourItinerary::where('mst001_id', '=', $profileId)->paginate(config('constants.PAGINATION'));
		$countries = Country::all()->sortBy('country_name');
		$currencies = Currency::all()->sortBy('curr_name');

		return view('tour.profileviewed.tour-profile-viewed-browse')
				->with('tourProfile', $tourProfile)
				->with('tourItinerary', $tourItinerary)
				->with('countries', $countries)
				->with('currencies', $currencies);
	}

	public function postSave(Request $request){
		
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
