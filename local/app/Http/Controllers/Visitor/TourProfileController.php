<?php namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Input, Session, Redirect;
use App\Models\VisitorTourProfile;
use App\Models\Country;
class TourProfilecontroller extends Controller {

	public function getIndex(){
		//print_r($tourProfile);
		$tourProfile = VisitorTourProfile::all();
		return view('tour-profile.tour-profile-browse')->with('tour-profile', $tourProfile);
	}

	public function getInput(){
		return view('tour-profile.tour-profile-input');
	}

	public function postSave(){
		$data = Input::all();
		$tourProfile = new VisitorTourProfile();
		$errorBag = $tourProfile->rules($data);

		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-profile/input')
				->withInput($data);
		} else {

			if(isset($data['id'])){
				$tourProfile = VisitorTourProfile::find($data['id']);
				if($tourProfile == null){
	    			$tourProfile = new VisitorTourProfile();
	    		}
			}

			$tourProfile->doParams($tourProfile, $data);
			$tourProfile->save();

			return redirect('tour-profile')->with('message', array('Data tour-profile telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $tourProfile = VisitorTourProfile::find($passvalue['ID']);

            if($tourProfile == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-profile');
            }

            //print_r($tourProfile->toArray());
            return Redirect::to('tour-profile/input')->withInput($tourProfile->toArray());
        }


    }
}
