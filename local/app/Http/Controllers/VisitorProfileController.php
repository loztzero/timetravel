<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\VisitorProfile;
class VisitorProfileController extends Controller {

	public function getIndex(){
		//print_r($visitorProfile);
		$visitorProfile = VisitorProfile::all();
		return view('visitorprofile.visitor-profile-browse')->with('visitor-profile', $visitorProfile);
	}

	public function getInput(){
		return view('visitorprofile.visitor-profile-input');
	}

	public function postSave(){
		$data = Input::all();
		$visitorProfile = new VisitorProfile();
		$errorBag = $visitorProfile->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-profile/input')
				->withInput($data);	
		} else {

			if(isset($data['id'])){
				$visitorProfile = VisitorProfile::find($data['id']);
				if($visitorProfile == null){
	    			$visitorProfile = new VisitorProfile();
	    		}
			}

			$visitorProfile->doParams($visitorProfile, $data);
			$visitorProfile->save();
			
			return redirect('tour-profile')->with('message', array('Data tour-profile telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $visitorProfile = VisitorProfile::find($passvalue['ID']);

            if($visitorProfile == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-profile');
            }

            //print_r($visitorProfile->toArray());
            return Redirect::to('tour-profile/input')->withInput($visitorProfile->toArray());
        }
    }
}
