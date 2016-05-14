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

	public function getIndex($userId){
		$tourProfile = TourProfile::where('mst001_id', '=', $userId)->first();
		$tourItinerary = TourItinerary::where('mst001_id', '=', $userId)->where('end_period', '>=', date('Y-m-d'))->paginate(config('constants.PAGINATION_PROFILE_VIEWED'));
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
						->leftJoin('MST003 AS C', 'A.mst003_id', '=', 'C.id')
						->join('MST004 AS D', 'A.mst004_id', '=', 'D.id')
						->where('A.end_period', '>=', date('Y-m-d'));
	
		if($request->has('category')){
			$tourItinerary->where('A.category', '=', $request->category);
		}
	
		if($request->has('departure_date')){
			$tourItinerary->where(date('Y-m-d', strtotime($request->departure_date)), 'between', 'A.start_period', 'AND', 'A.end_period');
		}
	
		if($request->has('countryId')){
			$tourItinerary->where('B.id', '=', $request->countryId);
		}
	
		if($request->has('cityId')){
			$tourItinerary->where('C.id', '=', $request->cityId);
		}
	
		if($request->has('currencyId')){
			$tourItinerary->where('D.id', '=', $request->currencyId);
		}
	
		if($request->has('budget_from')){
			$tourItinerary->where('A.price', '>=', $request->budget_from);
		}
	
		if($request->has('budget_to')){
			$tourItinerary->where('A.price', '<=', $request->budget_to);
		}

		$tourItinerary = $tourItinerary->select('A.id', 'A.price', 'A.mst001_id', 'A.photo', 'A.title', 'A.category', 'D.curr_code', 'A.start_period', 'A.end_period');
		$tourItinerary = $tourItinerary->paginate(config('constants.PAGINATION_PROFILE_VIEWED'));
	
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
}
