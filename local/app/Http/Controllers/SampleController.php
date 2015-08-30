<?php namespace App\Http\Controllers;

use Input, Session, Redirect;
use App\Models\Sample;
use Facebook;
class Samplecontroller extends Controller {

	public function getIndex(){
		//print_r($sample);
		$sample = Sample::all();

		$fb = new Facebook\Facebook([
  'app_id' => '{app-id}',
  'app_secret' => '{app-secret}',
  'default_graph_version' => 'v2.2',
  ]);

		return view('sample.sample-browse')->with('sample', $sample);
	}

	public function getInput(){
		return view('sample.sample-input');
	}

	public function postSave(){
		$data = Input::all();
		$sample = new Sample();
		$errorBag = $sample->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('sample/input')
				->withInput($data);	
		} else {

			if(isset($data['id'])){
				$sample = Sample::find($data['id']);
				if($sample == null){
	    			$sample = new Sample();
	    		}
			}

			$sample->doParams($sample, $data);
			$sample->save();
			
			return redirect('sample')->with('message', array('Data sample telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['ID'])){
            $sample = Sample::find($passvalue['ID']);

            if($sample == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('sample');
            }

            //print_r($sample->toArray());
            return Redirect::to('sample/input')->withInput($sample->toArray());
        }

    	
    }
}
