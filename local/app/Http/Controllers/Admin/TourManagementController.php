<?php namespace App\Http\Controllers\Admin;

use Input, Session, Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
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
			
			return view('admin.tourmanagement.tour-management-browse')->with('message', array('Data album telah berhasil di hapus'))
					->with('userTour', $userTour)
					->with('countries', $countries);
		}
	}

	public function getData(Request $request){
		$id = $request->id;

		if(isset($id)){
			$userTour = User::find($id);

			if(isset($userTour)){
				Session::flash('error', array('Data value dengan id ' . $id . ' tidak ditemukan'));
				return Redirect::to('tour-itinerary');
			}

			$userTour['cities'] = $cities = City::where('mst002_id', '=', $userTour['mst002_id'])->orderBy('city_name')->get();

			return $userTour->toJson();
		}
	}
}
