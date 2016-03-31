<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth, File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourAlbum;
use App\Models\Country;
use App\Models\City;

class AlbumController extends Controller {

	public function getIndex(){
		$tourAlbum = TourAlbum::where('mst001_id', '=', Auth::user()->id)->paginate(config('constants.PAGINATION'));
		$countries = Country::all()->sortBy('country_name');

		return view('tour.album.tour-album-browse')
				->with('tourAlbum', $tourAlbum)
				->with('countries', $countries);
	}

	public function postSave(Request $request){
		$data = $request->all();
		$tourAlbum = new TourAlbum();
		$errorBag = $tourAlbum->rules($data);

		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-album');
		} else {

			if(isset($data['id'])){
				$tourAlbum = TourAlbum::find($data['id']);
				if(isset($tourAlbum)){
					$tourAlbum = new TourAlbum();
				}
			}
			
			$tourAlbum->doParams($tourAlbum, $data);
			$tourAlbum->save();
			
			if($request->hasFile('photo')){
				if($request->file('photo')->isValid()){

					$path = $this->getPath();
					
					if(!File::exists($path)) {
						File::makeDirectory($path, $mode = 0777, true, true);
					}
					
					$request->file('photo')->move($path, $request->file('photo')->getClientOriginalName());
				}
			}
			
			return redirect('tour-album')->with('message', array('Photo telah berhasil di upload'))
					->withInput($tourAlbum->toArray());
		}
	}

	public function getDelete($id){
		$tourAlbum = TourAlbum::find($id);
		
		if(isset($tourAlbum)){
			$tourAlbum->delete();
			File::delete($this->getPath().'/'.$tourAlbum->photo);
			
			return redirect('tour-album')->with('message', array('Data album telah berhasil di hapus'));
		}
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
