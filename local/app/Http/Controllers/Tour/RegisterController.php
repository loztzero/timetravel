<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourRegister;

class RegisterController extends Controller {

	public function getIndex() {
		$tourRegister = TourRegister::all();
		
		return view('tour.register.tour-register-input')->with('tourRegister', $tourRegister);
	}

	public function postSave(){
		$data = Input::all();
		$tourRegister = new TourRegister();
		$errorBag = $tourRegister->rules($data);
		
		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('tour-register-input')->withInput($data);	
		} else {

			if(isset($data['id'])){
				$tourRegister = TourRegister::find($data['id']);
				if($tourRegister == null){
					$tourRegister = new TourRegister();
				}
			}

			$tourRegister->doParams($tourRegister, $data);
			$tourRegister->save();
			
			return redirect('tour-registe-input')->with('message', array('Data tour telah berhasil di buat'));
		}
	}
	
	private function createDir(){
		if(!File::exists($path)) {
			$result = File::makeDirectory('/path/to/directory');
		}
	}
}
