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
	
	public function postSearch(Request $request){
		$tourProfile = TourProfile::find($request['id']);
		$countries = Country::all()->sortBy('country_name');
		$currencies = Currency::all()->sortBy('curr_name');

		$tourItinerary = TourItinerary::from('TR0040 AS A')
						->join('MST002 AS B', 'A.mst002_id', '=', 'B.id')
						->join('MST003 AS C', 'A.mst003_id', '=', 'C.id')
						->join('MST004 AS D', 'A.mst004_id', '=', 'D.id');
	
		if($request->has('category')){
			$tourItinerary->where('a.category', '=', $request->category);
		}
	
		if($request->has('start_period')){
			$tourItinerary->where('a.start_period', '>=', $request->budget_from);
		}
	
		if($request->has('end_period')){
			$tourItinerary->where('a.end_period', '<=', $request->budget_to);
		}
	
		if($request->has('countryId')){
			$tourItinerary->where('b.id', '=', $request->countryId);
		}
	
		if($request->has('cityId')){
			$tourItinerary->where('c.id', '=', $request->cityId);
		}
	
		if($request->has('currencyId')){
			$tourItinerary->where('D.id', '=', $request->currencyId);
		}
	
		if($request->has('budget_from')){
			$tourItinerary->where('a.price', '>=', $request->budget_from);
		}
	
		if($request->has('budget_to')){
			$tourItinerary->where('a.price', '<=', $request->budget_to);
		}
	
		$tourItinerary = $tourItinerary->paginate(config('constants.PAGINATION'));
	
		return view('tour.profileviewed.tour-profile-viewed-browse')
				->with('tourProfile', $tourProfile)
				->with('tourItinerary', $tourItinerary)
				->with('countries', $countries)
				->with('currencies', $currencies);
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
