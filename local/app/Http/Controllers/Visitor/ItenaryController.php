<?php namespace App\Http\Controllers\Visitor;

use Input, Session, Redirect, Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VisitorItenary;
use App\Models\Country;
class ItenaryController extends Controller {

	public function getIndex(){
		//print_r($visitorItenary);
		$visitorItenary = VisitorItenary::from('VST030 as a')->paginate(20);
		$countries = Country::all()->sortBy('country_name');
		
		return view('visitor.itenary.visitor-itenary-browse')
			->with('visitorItenary', $visitorItenary)
				->with('countries', $countries);
	}

	public function getInput(){
		$countryList = Country::orderBy('country_name')->lists('country_name', 'id');
		return view('visitor.itenary.visitor-itenary-input')
		->with('countryList', $countryList);
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
			$visitorItenary->mst001_id = Auth::user()->id;
			$visitorItenary->save();

			return redirect('visitor-itenary')->with('message', array('Data tour-profile telah berhasil di buat'));
		}
	}

	public function postLoadData(){
    	$this->layout = null;
    	$passvalue = Input::all();
    	//Session::flash('selectedData', $passvalue);
        if(isset($passvalue['id'])){
            $visitorItenary = VisitorItenary::find($passvalue['id']);

            if($visitorItenary == null){
            	Session::flash('error', array('pass value dengan id ' . $passvalue['ID'] . ' tidak ditemukan'));
            	return Redirect::to('visitor-itenary');
            }

            //print_r($visitorItenary->toArray());
            return Redirect::to('visitor-itenary/input')->withInput($visitorItenary->toArray());
        }

        Session::flash('error', array('Nothing to load'));
    	return Redirect::to('visitor-itenary');
    }

    public function postDelete(Request $request)
	{
		if($request->id){
			$master = VisitorItenary::find($request->id);
			if($master != null){

				try {
					$master->delete();
				} catch (\Illuminate\Database\QueryException $e) {
					Session::flash('error', array('Data sudah pernah digunakan oleh transaksi, jadi tidak dapat dihapus'));
					return redirect('visitor-itenary');
				}
				Session::flash('message', array('Data berhasil dihapus'));
			} else {
				Session::flash('error', array('Tidak ada data yang dihapus'));
			}
		} else {
			Session::flash('error', array('Terjadi kesalahan, silahkan di coba lagi, jika masi terjadi hubungi programmer'));
		}

		return redirect('visitor-itenary');
	}
}
