<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourItinerary;
use App\Models\TourProfile;
use App\Models\Country;
use App\Models\City;
use App\Models\Currency;

class ItineraryViewedController extends Controller {

	public function getIndex($itineraryId){
		$tourItinerary = TourItinerary::where('id', '=', $itineraryId)->first();
		$tourProfile = TourProfile::where('mst001_id', '=', $tourItinerary['mst001_id'])->first();
		$country = Country::where('id', '=', $tourItinerary['mst002_id'])->first();
		$city = City::where('id', '=', $tourItinerary['mst003_id'])->first();
		$currency = Currency::where('id', '=', $tourItinerary['mst004_id'])->first();
		$countries = Country::all()->sortBy('country_name');
		$currencies = Currency::all()->sortBy('curr_name');
		
		return view('tour.itineraryviewed.tour-itinerary-viewed-browse')
				->with('tourItinerary', $tourItinerary)
				->with('tourProfile', $tourProfile)
				->with('country', $country)
				->with('city', $city)
				->with('currency', $currency)
				->with('countries', $countries)
				->with('currencies', $currencies);
	}

	public function getCityByCountrySearch(Request $request){
		$countryIdSearch = $request->countryIdSearch;
		$cities = City::where('mst002_id', '=', $countryIdSearch)->orderBy('city_name')->get()->toJson();
		
		return $cities;
	}
}
