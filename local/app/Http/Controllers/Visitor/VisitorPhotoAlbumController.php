<?php namespace App\Http\Controllers\Visitor;

use Input, Session, Redirect;
use App\Http\Controllers\Controller;
use App\Models\VisitorPhotoAlbum;
class VisitorPhotoAlbumController extends Controller {

	public function getIndex(){
		//print_r($visitorPhotoAlbum);
		$visitorPhotoAlbum = VisitorPhotoAlbum::all();
		return view('visitorphotoalbum.visitor-photo-album-browse')->with('visitorItenary', $visitorPhotoAlbum);
	}

	public function getInput(){
		return view('visitorphotoalbum.visitor-photo-album-input');
	}

	public function postSave(){
		$data = Input::all();
		$visitorPhotoAlbum = new VisitorPhotoAlbum();
		$errorBag = $visitorPhotoAlbum->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('visitor-photo-album/input')
				->withInput($data);	
		} else {

			if(isset($data['id'])){
				$visitorPhotoAlbum = VisitorPhotoAlbum::find($data['id']);
				if($visitorPhotoAlbum == null){
	    			$visitorPhotoAlbum = new VisitorPhotoAlbum();
	    		}
			}

			$visitorPhotoAlbum->doParams($visitorPhotoAlbum, $data);
			$visitorPhotoAlbum->save();
			
			return redirect('visitor-photo-album')->with('message', array('Data visitor-photo-album telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $visitorPhotoAlbum = VisitorPhotoAlbum::find($passvalue['ID']);

            if($visitorPhotoAlbum == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('visitor-photo-album');
            }

            //print_r($visitorPhotoAlbum->toArray());
            return Redirect::to('visitor-photo-album/input')->withInput($visitorPhotoAlbum->toArray());
        }
    }
}
