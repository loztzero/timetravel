<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\VisitorItenary;
class VisitorItenaryController extends Controller {

	public function getIndex(){
		//print_r($visitorItenary);
		$visitorItenary = VisitorItenary::all();
		return view('visitoritenary.visitor-itenary-browse')->with('visitorItenary', $visitorItenary);
	}

	public function getInput(){
		return view('visitoritenary.visitor-itenary-input');
	}

	public function postSave(){
		$data = Input::all();
		$visitorItenary = new VisitorItenary();
		$errorBag = $visitorItenary->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-profile/input')
				->withInput($data);	
		} else {

			if(isset($data['id'])){
				$visitorItenary = VisitorItenary::find($data['id']);
				if($visitorItenary == null){
	    			$visitorItenary = new VisitorItenary();
	    		}
			}

			$visitorItenary->doParams($visitorItenary, $data);
			$visitorItenary->save();
			
			return redirect('tour-profile')->with('message', array('Data tour-profile telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $visitorItenary = VisitorItenary::find($passvalue['ID']);

            if($visitorItenary == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-profile');
            }

            //print_r($visitorItenary->toArray());
            return Redirect::to('tour-profile/input')->withInput($visitorItenary->toArray());
        }
    }
}
