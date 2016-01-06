<?php namespace App\Http\Controllers\Visitor;

use Input, Session, Redirect, Auth;
use App\Http\Controllers\Controller;
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

	public function getKambing(){
		$result = VisitorItenary::where('mst001_id', '=', Auth::user()->id)->max('line_number');
		print_r($result);
	}

	public function postSave(){
		$data = Input::all();
		$visitorItenary = new VisitorItenary();
		$errorBag = $visitorItenary->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('visitor-itenary/input')
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
			
			return redirect('visitor-itenary')->with('message', array('Data tour-profile telah berhasil di buat'));
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
            	return Redirect::to('visitor-itenary');
            }

            //print_r($visitorItenary->toArray());
            return Redirect::to('visitor-itenary/input')->withInput($visitorItenary->toArray());
        }
    }
}
