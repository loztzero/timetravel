<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\TourProfile;
class TourProfileController extends Controller {

	public function getIndex(){
		//print_r($profile);
		$tourProfile = TourProfile::all();
		return view('tourprofile.tour-profile-browse')->with('tourProfile', $tourProfile);
	}

	public function getInput(){
		return view('tourprofile.tour-profile-browse');
	}

	public function postSave(){
		// echo "yeye";
		$data = Input::all();
		$tourProfile = new TourProfile();
		$errorBag = $tourProfile->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-profile')->withInput($data);	
		} else {

			if(isset($data['id'])){
				$tourProfile = TourProfile::find($data['id']);
				if($tourProfile == null){
	    			$tourProfile = new TourProfile();
	    		}
			}

			$tourProfile->doParams($tourProfile, $data);
			$tourProfile->save();
			
			return redirect('tour-profile')->with('message', array('Data tour profile telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $tourProfile = TourProfile::find($passvalue['ID']);

            if($tourProfile == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-profile');
            }

            //print_r($profile->toArray());
            return Redirect::to('tour-profile')->withInput($tourProfile->toArray());
        }
    }
}
