<?php namespace App\Http\Controllers\Visitor;

use Input, Session, Redirect;
use App\Http\Controllers\Controller;
use App\Models\VisitorJourney;
class JourneyController extends Controller {

	public function getIndex(){
		//print_r($visitorJourney);
		$visitorJourney = VisitorJourney::all();
		return view('visitor.journey.visitor-journey-browse')->with('visitorJourney', $visitorJourney);
	}

	public function getInput(){
		return view('visitor.journey.visitor-photo-album-input');
	}

	public function postSave(){
		$data = Input::all();
		$visitorJourney = new VisitorJourney();
		$errorBag = $visitorJourney->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('visitor-journey');
			
		} else {

			if(isset($data['id'])){
				$visitorJourney = VisitorJourney::find($data['id']);
				if($visitorJourney == null){
	    			$visitorJourney = new VisitorJourney();
	    		}
			}

			$visitorJourney->doParams($visitorJourney, $data);
			$visitorJourney->save();
			
			return redirect('visitor-journey')->with('message', array('Data Journey Successfully uploaded'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $visitorJourney = VisitorJourney::find($passvalue['ID']);

            if($visitorJourney == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('visitor-jurney');
            }

            //print_r($visitorJourney->toArray());
            return Redirect::to('visitor-journey/input')->withInput($visitorJourney->toArray());
        }
    }
}
