<?php namespace App\Http\Controllers\Admin;

use Input, Session, Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\TourProfile;
use App\Models\Country;
use App\Models\City;

class TourManagementController extends Controller {

	public function getIndex(){
		$userTour = User::where('role', '=', config('constants.TOUR'))->paginate(config('constants.PAGINATION_TOUR_MANAGEMENT'));
		$countries = Country::all()->sortBy('country_name');

		return view('admin.tourmanagement.tour-management-browse')
				->with('userTour', $userTour)
				->with('countries', $countries);
	}

	public function getChangeStatus($id){
		$userTour = User::find($id);
		
		if(isset($userTour)){
			if($userTour->status == config('constants.ACTIVE')){
				$userTour->status = config('constants.INACTIVE');
			} else {
				$userTour->status = config('constants.ACTIVE');
			}
			
			$userTour->save();
			$userTour = User::where('role', '=', config('constants.TOUR'))->paginate(config('constants.PAGINATION_TOUR_MANAGEMENT'));
			$countries = Country::all()->sortBy('country_name');
			
			return redirect('tour-management')->with('message', array('Status telah berhasil di ubah'))
					->withInput($userTour->toArray());
		}
	}

	public function getData(Request $request){
		$id = $request->id;
		
		if(isset($id)){
			$tourProfile = TourProfile::where('mst001_id', '=', $id)->first();

			if($tourProfile == null){
				Session::flash('error', array('Data value dengan id ' . $id . ' tidak ditemukan'));
				return Redirect::to('tour-management');
			}

			$tourProfile['country'] = Country::where('id', '=', $tourProfile['mst002_id'])->first();
			$tourProfile['city'] = City::where('id', '=', $tourProfile['mst003_id'])->first();

			return $tourProfile->toJson();
		}
	}

	public function getCityByCountrySearch(Request $request){
		$countryIdSearch = $request->countryIdSearch;
		$cities = City::where('mst002_id', '=', $countryIdSearch)->orderBy('city_name')->get()->toJson();

		return $cities;
	}
}
