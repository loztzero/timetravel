<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\TourReview;

class TourReviewController extends Controller {

	public function getIndex() {
		
		$tourReview = TourReview::all();
		return view('tourreview.tour-review-browse')->with('tourReview', $tourReview);
	}
}
