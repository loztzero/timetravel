<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\SampleUpload;
class SampleUploadController extends Controller {

	public function getIndex(){
		//print_r($sample);
		$sampleUpload = SampleUpload::all();
		return view('sampleupload.sample-upload-browse')->with('sampleUpload', $sampleUpload);
	}

	public function getInput(){
		return view('sampleupload.sample-upload-input');
	}

	public function postSave(){
		$data = Input::all();
		$sampleUpload = new SampleUpload();
		$errorBag = $sampleUpload->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('sample-upload/input')
				->withInput($data);	
		} else {

			if(isset($data['id'])){
				$sampleUpload = SampleUpload::find($data['id']);
				if($sampleUpload == null){
	    			$sampleUpload = new SampleUpload();
	    		}
			}


			$data = Input::hasFile('fileUpload');
            Input::file('fileUpload')->move('./files/', Input::file('fileUpload')->getClientOriginalName());

			$sampleUpload->doParams($sampleUpload, $data);
			$sampleUpload->save();
			
			return redirect('sample-upload')->with('message', array('Data sample telah berhasil di buat'));
		}
	}

	public function postSavez(){
		print_r(Input::all());
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $sample = SampleUpload::find($passvalue['ID']);

            if($sample == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('sample-upload');
            }

            //print_r($sample->toArray());
            return Redirect::to('sample-upload/input')->withInput($sample->toArray());
        }

    	
    }
}
