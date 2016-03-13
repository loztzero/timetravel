<?php namespace App\Http\Controllers\Visitor;

use Input, Session, Redirect, Auth;
use App\Http\Controllers\Controller;
use App\Models\VisitorFavoriteTour;
class FavoriteTourController extends Controller {

	public function getIndex(){
		//print_r($visitorFavoriteTour);
		$visitorFavoriteTour = VisitorFavoriteTour::where('mst001_id', '=', Auth::user()->id)->get();
		return view('visitor.favoritetour.visitor-favorite-tour-browse')
				->with('favoriteTours', $visitorFavoriteTour);
	}

	public function getInput(){
		return view('visitorfavoritetour.visitor-favorite-tour-input');
	}

	public function postSave(){
		$data = Input::all();
		$visitorFavoriteTour = new VisitorFavoriteTour();
		$errorBag = $visitorFavoriteTour->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-profile/input')
				->withInput($data);	
		} else {

			if(isset($data['id'])){
				$visitorFavoriteTour = VisitorFavoriteTour::find($data['id']);
				if($visitorFavoriteTour == null){
	    			$visitorFavoriteTour = new VisitorFavoriteTour();
	    		}
			}

			$visitorFavoriteTour->doParams($visitorFavoriteTour, $data);
			$visitorFavoriteTour->save();
			
			return redirect('tour-profile')->with('message', array('Data tour-profile telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $visitorFavoriteTour = VisitorFavoriteTour::find($passvalue['ID']);

            if($visitorFavoriteTour == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-profile');
            }

            //print_r($visitorFavoriteTour->toArray());
            return Redirect::to('tour-profile/input')->withInput($visitorFavoriteTour->toArray());
        }
    }
}
