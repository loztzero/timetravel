<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\TourProfile;
use App\User;
class TourProfileController extends Controller {

	public function getIndex(){
		$tourProfile = TourProfile::all()->toArray()[0];
		$tourProfile['user'] = User::find($tourProfile['mst001_id'])->toArray();
		return view('tourprofile.tour-profile-browse')->with('tourProfile', $tourProfile);
	}

	public function postSave(){
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
    	$data = Input::all();
    	//Session::flash('selectedData', $data);
        if(isset($data['ID'])){
            $tourProfile = TourProfile::find($data['ID']);

            if($tourProfile == null){
            	Session::flash('error', array('Data value dengan id ' . $data['ID'] . ' tidak ditemukan'));
            	return Redirect::to('tour-profile');
            }

            //print_r($profile->toArray());
            return Redirect::to('tour-profile')->withInput($tourProfile->toArray());
        }
    }
}
