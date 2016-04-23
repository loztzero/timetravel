<?php namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;

class TourProfile extends Emodel {
	
	protected $table = 'TR0010';

	public static function rules($data) {
		$error = array();
		
		$rules = array(
			'tour_name'		=> 'required',
			'first_name'	=> 'required',
			'last_name'		=> 'required',
			'address1'		=> 'required',
			'zip_code'		=> 'required',
			'countryId'		=> 'required',
			'cityId'		=> 'required',
			'phone_number'	=> 'required',
		);

		$messages = array(
			'tour_name.required'		=> 'Nama Tour harus diisi',
			'first_name.required'		=> 'First Name harus diisi',
			'last_name.required'		=> 'Last Name harus diisi',
			'address1.required'			=> 'Alamat 1 harus diisi',
			'zip_code.required'			=> 'Kode pos harus diisi',
			'countryId.required'		=> 'Negara harus diisi',
			'cityId.required'			=> 'Kota harus diisi',
			'phone_number.required'		=> 'No Telepon harus diisi',
		);
		
		$v = Validator::make($data, $rules, $messages);
		
		if($v->fails()) {
			$error = $v->errors()->all();
		}

		return $error;
	}

	public function doParams($object, $data) {
		$object->mst001_id		= isset(Auth::user()->id) ? Auth::user()->id : $data['mst001_id'];
		$object->tour_name		= $data['tour_name'];
		$object->first_name		= $data['first_name'];
		$object->last_name		= $data['last_name'];
		$object->address1		= $data['address1'];
		$object->address2		= isset($data['address2']) ? $data['address2'] : null;
		$object->address3		= isset($data['address3']) ? $data['address3'] : null;
		$object->mst002_id		= $data['countryId'];
		$object->mst003_id		= $data['cityId'];
		$object->zip_code		= $data['zip_code'];
		$object->phone_number	= $data['phone_number'];
		$object->instagram		= isset($data['instagram']) ? $data['instagram'] : null;
		$object->facebook		= isset($data['facebook']) ? $data['facebook'] : null;
		$object->twitter		= isset($data['twitter']) ? $data['twitter'] : null;
		$object->website		= isset($data['website']) ? $data['website'] : null;
		$object->logo			= isset($data['logo']) ? $data['logo']->getClientOriginalName() : $object->logo;
		
		return $object;
	}
	
	public function country(){
		return $this->hasOne('App\Models\Country', 'id', 'mst002_id');
	}
	
	public function city(){
		return $this->hasOne('App\Models\City', 'id', 'mst003_id');
	}
}