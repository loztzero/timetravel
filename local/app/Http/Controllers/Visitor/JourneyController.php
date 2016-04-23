<?php namespace App\Http\Controllers\Visitor;

use Input, Session, Redirect, Auth, File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitorJourney;
use App\Models\Country;
class JourneyController extends Controller {

	public function getIndex(){
		//print_r($visitorJourney);
		$visitorJourney = VisitorJourney::all();
		$countries = Country::all()->sortBy('country_name');
		
		return view('visitor.journey.visitor-journey-browse')
			->with('visitorJourney', $visitorJourney)
				->with('countries', $countries);
	}

	public function getInput(){
		return view('visitor.journey.visitor-photo-album-input');
	}

	public function postSave(Request $request){
		$data = $request->all();
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


			if($request->hasFile('photo')){
				if($request->file('photo')->isValid()){

					$path = './files/visitor/'.Auth::user()->id;
					if(!File::exists($path)) {
					    File::makeDirectory($path, $mode = 0777, true, true);
					}
		            $request->file('photo')->move($path, $request->file('photo')->getClientOriginalName());

		            $visitorJourney->photo = $request->file('photo')->getClientOriginalName();
				}

			} else {
				//echo $request->hasFile('photo')
			}

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
	
	public function getDelete($id)
	{
		if(!empty($id)){
			$master = VisitorJourney::find($id);
			if($master != null){

				try {
					
					$existsFile = './files/visitor/'.Auth::user()->id .'/'. $master->photo;
					if(File::exists($existsFile)) {
					    File::delete($existsFile);
					}
					$master->delete();
					
				} catch (\Illuminate\Database\QueryException $e) {
					Session::flash('error', array('This data already used by others'));
					return redirect('visitor-journey');
				}
				Session::flash('message', array('Data successfully deleted'));
			} else {
				Session::flash('error', array('Data does not exists'));
			}
		} else {
			Session::flash('error', array('There is a problem, please try again or contact our support if you feel this is error.'));
		}

		return redirect('visitor-journey');
	}
}
