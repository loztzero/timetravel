<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourReview;
use App\Models\Country;

class ReviewController extends Controller {

	public function getIndex() {
		$tourReview = TourReview::where('mst001_id', '=', Auth::user()->id)->paginate(config('constants.PAGINATION_REVIEW'));
		$countries = Country::all()->sortBy('country_name');
		
		return view('tour.review.tour-review-browse')
				->with('tourReview', $tourReview)
				->with('countries', $countries);
	}
}
