<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\TourAlbum;
class TourAlbumController extends Controller {

	public function getIndex(){
		//print_r($tourAlbum);
		$tourAlbum = TourAlbum::all();
		return view('touralbum.tour-album-browse')->with('tourAlbum', $tourAlbum);
	}

	public function getInput(){
		return view('touralbum.tour-album-input');
	}

	public function postSave(){
		$data = Input::all();
		$tourAlbum = new TourAlbum();
		$errorBag = $tourAlbum->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-album/input')
				->withInput($data);	
		} else {

			if(isset($data['id'])){
				$tourAlbum = TourAlbum::find($data['id']);
				if($tourAlbum == null){
	    			$tourAlbum = new TourAlbum();
	    		}
			}

			$tourAlbum->doParams($tourAlbum, $data);
			$tourAlbum->save();
			
			return redirect('tour-album')->with('message', array('Photo telah berhasil di upload'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $tourAlbum = TourAlbum::find($passvalue['ID']);

            if($tourAlbum == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-album');
            }

            //print_r($tourAlbum->toArray());
            return Redirect::to('tour-album/input')->withInput($tourAlbum->toArray());
        }
    }
}
