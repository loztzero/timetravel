<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourAlbum;
use App\Models\TourProfile;
use App\User;
use App\Models\Country;
use App\Models\Currency;

class AlbumViewedController extends Controller {

	public function getIndex($userId){
		$tourProfile = TourProfile::where('mst001_id', '=', $userId)->first();
		$tourAlbum = TourAlbum::where('mst001_id', '=', $userId)->paginate(config('constants.PAGINATION_ALBUM_VIEWED'));
		$countries = Country::all()->sortBy('country_name');
		$currencies = Currency::all()->sortBy('curr_name');

		return view('tour.albumviewed.tour-album-viewed-browse')
				->with('tourProfile', $tourProfile)
				->with('tourAlbum', $tourAlbum)
				->with('countries', $countries)
				->with('currencies', $currencies);
	}
}
