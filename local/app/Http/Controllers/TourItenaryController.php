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
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $tourItenary = TourItenary::find($passvalue['ID']);

            if($tourItenary == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-itenary');
            }

            //print_r($tourItenary->toArray());
            return Redirect::to('tour-itenary/input')->withInput($tourItenary->toArray());
        }
    }
}
