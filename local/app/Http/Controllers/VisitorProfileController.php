<?php namespace App\Http\Controllers;

use Input, Session, Redirect, Auth, Request, File;
use App\Models\VisitorProfile;
class VisitorProfileController extends Controller {

	public function getIndex(){
		//print_r($visitorProfile);
		$visitorProfile = VisitorProfile::where('mst001_id', '=', Auth::user()->id)->first();
		return view('visitorprofile.visitor-profile-browse')->with('profile', $visitorProfile);
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
			return redirect('visitor-profile')
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

			if(Request::hasFile('photo')){
				if(Request::file('photo')->isValid()){

					$path = './files/visitor/'.$visitorProfile->id;
					if(!File::exists($path)) {
					    File::makeDirectory($path, $mode = 0777, true, true);
					}
		            Request::file('photo')->move($path, Request::file('photo')->getClientOriginalName());
					
				}
			}
			
			return redirect('visitor-profile')->with('message', array('Data anda telah berhasil di simpan'))
			->withInput($visitorProfile->toArray());
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
            	return Redirect::to('visitor-profile');
            }

            //print_r($visitorProfile->toArray());
            return Redirect::to('visitor-profile')->withInput($visitorProfile->toArray());
        }
    }
}
