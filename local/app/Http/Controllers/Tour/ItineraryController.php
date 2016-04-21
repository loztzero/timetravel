<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth, File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourItinerary;
use App\Models\Country;
use App\Models\City;
use App\Models\Currency;

class ItineraryController extends Controller {

	public function getIndex(){
		$tourItinerary = TourItinerary::where('mst001_id', '=', Auth::user()->id)->paginate(config('constants.PAGINATION'));
		$countries = Country::all()->sortBy('country_name');
		$currencies = Currency::all()->sortBy('curr_name');

		return view('tour.itinerary.tour-itinerary-browse')
				->with('tourItinerary', $tourItinerary)
				->with('countries', $countries)
				->with('currencies', $currencies);
	}

	public function postSave(Request $request){
		$data = $request->all();
		$tourItinerary = new TourItinerary();
		$errorBag = $tourItinerary->rules($data);
		$photoFile = null;

		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-itinerary')->withInput($data);
		} else {

			if(isset($data['id'])){
				$tourItinerary = TourItinerary::find($data['id']);
				
				if($tourItinerary == null){
					$tourItinerary = new TourItinerary();
				} else {
					$photoFile = $tourItinerary->photo;
				}
			}

			$tourItinerary->doParams($tourItinerary, $data);
			$tourItinerary->save();
			
			if($request->hasFile('photo')){
				if($request->file('photo')->isValid()){

					$path = $this->getPath();
					
					if(!File::exists($path)) {
						File::makeDirectory($path, $mode = 0777, true, true);
					}
					
					$request->file('photo')->move($path, $request->file('photo')->getClientOriginalName());
					
					if($photoFile != null){
						if($photoFile != $request->file('photo')){
							File::delete($path.'/'.$photoFile);
						}
					}
				}
			}
			
			return redirect('tour-itinerary')->with('message', array('Data itinerary telah berhasil di buat'))
					->withInput($tourItinerary->toArray());
		}
	}

	public function getData(Request $request){
		$id = $request->id;

		if(isset($id)){
			$tourItinerary = TourItinerary::find($id);

			if($tourItinerary == null){
				Session::flash('error', array('Data value dengan id ' . $id . ' tidak ditemukan'));
				return Redirect::to('tour-itinerary');
			}

			$tourItinerary['cities'] = $cities = City::where('mst002_id', '=', $tourItinerary['mst002_id'])->orderBy('city_name')->get();

			return $tourItinerary->toJson();
		}
	}

	public function getDelete($id){
		$tourItinerary = TourItinerary::find($id);
		
		if($tourItinerary == null){
			$tourItinerary->delete();
			File::delete($this->getPath().'/'.$tourAlbum->photo);
			return redirect('tour-itinerary')->with('message', array('Data itinerary telah berhasil di hapus'));
		}
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
	
	private function getPath(){
		return './'.config('constants.TOUR_ALBUM').Auth::user()->id;
	}
}
