<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourReview;
use App\Models\Country;
use App\Models\City;

class ReviewController extends Controller {

	public function getIndex() {
		$tourReview = TourReview::where('mst001_id', '=', Auth::user()->id)->paginate(config('constants.PAGINATION'));
		$countries = Country::all()->sortBy('country_name');
		
		return view('tour.review.tour-review-browse')
				->with('tourReview', $tourReview)
				->with('countries', $countries);
	}

	public function getCityByCountrySearch(Request $request){
		$countryIdSearch = $request->countryIdSearch;
		$cities = City::where('mst002_id', '=', $countryIdSearch)->orderBy('city_name')->get()->toJson();
		
		return $cities;
	}
}
