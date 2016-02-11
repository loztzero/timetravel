<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\TourItenary;
class TourItenaryController extends Controller {

	public function getIndex(){
		$tourItenary = TourItenary::all();
		return view('touritenary.tour-itenary-browse')->with('tourItenary', $tourItenary);
	}

	public function getInput(){
		return view('touritenary.tour-itenary-input');
	}

	public function postSave(){
		$data = Input::all();
		$tourItenary = new TourItenary();
		$errorBag = $tourItenary->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-itenary/input')->withInput($data);	
		} else {

			if(isset($data['id'])){
				$tourItenary = TourItenary::find($data['id']);
				if($tourItenary == null){
	    			$tourItenary = new TourItenary();
	    		}
			}

			$tourItenary->doParams($tourItenary, $data);
			$tourItenary->save();
			
			return redirect('tour-itenary')->with('message', array('Data itenary telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$data = Input::all();
    	//Session::flash('selectedData', $data);
        if(isset($data['ID'])){
            $tourItenary = TourItenary::find($data['ID']);

            if($tourItenary == null){
            	Session::flash('error', array('Data value dengan id ' . $data['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-itenary');
            }

            //print_r($tourItenary->toArray());
            return Redirect::to('tour-itenary/input')->withInput($tourItenary->toArray());
        }
    }
}
