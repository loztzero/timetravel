<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourReview;
use App\Models\TourProfile;
use App\Models\Country;
use App\Models\City;
use App\Models\Currency;

class ReviewViewedController extends Controller {

	public function getIndex($userId){
		$tourReview = TourReview::where('mst001_id', '=', $userId)->paginate(config('constants.PAGINATION'));
		$tourProfile = TourProfile::where('mst001_id', '=', $userId)->first();
		$country = Country::where('id', '=', $tourReview['mst002_id'])->first();
		$city = City::where('id', '=', $tourReview['mst003_id'])->first();
		$currency = Currency::where('id', '=', $tourReview['mst004_id'])->first();
		$countries = Country::all()->sortBy('country_name');
		$currencies = Currency::all()->sortBy('curr_name');
		
		return view('tour.reviewviewed.tour-review-viewed-browse')
				->with('tourReview', $tourReview)
				->with('tourProfile', $tourProfile)
				->with('country', $country)
				->with('city', $city)
				->with('currency', $currency)
				->with('countries', $countries)
				->with('currencies', $currencies);
	}

	public function postSave(Request $request){
		$data = $request->all();
		$tourReview = new TourReview();
		$errorBag = $tourReview->rules($data);

		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-review-viewed')->withInput($data);
		} else {

			if(isset($data['id'])){
				$tourReview = TourReview::find($data['id']);
				
				if($tourReview == null){
					$tourReview = new TourReview();
				}
			}

			$tourReview->doParams($tourReview, $data);
			$tourReview->save();
			
			return redirect('tour-review-viewed/index/'.$data['mst001_id'])->with('message', array('Data review telah berhasil di buat'))
					->withInput($tourReview->toArray());
		}
	}

	public function getCityByCountrySearch(Request $request){
		$countryIdSearch = $request->countryIdSearch;
		$cities = City::where('mst002_id', '=', $countryIdSearch)->orderBy('city_name')->get()->toJson();
		
		return $cities;
	}
}
