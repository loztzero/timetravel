<?php namespace App\Models;

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
			'cityId'		=> 'required',
			'countryId'		=> 'required',
			'phone_number'	=> 'required',
		);

		$messages = array(
			'tour_name.required'		=> 'Nama Tour harus diisi',
			'first_name.required'		=> 'First Name harus diisi',
			'last_name.required'		=> 'Last Name harus diisi',
			'address1.required'			=> 'Alamat 1 harus diisi',
			'cityId.required'			=> 'Kota harus diisi',
			'countryId.required'		=> 'Negara harus diisi',
			'phone_number.required'		=> 'No Telepon harus diisi',
		);
		
		$v = Validator::make($data, $rules, $messages);
		if($v->fails()) {
			$error = $v->errors()->all();
		}

		return $error;
	}

	public function doParams($object, $data) {
		$object->mst001_id		= Auth::user()->id;
		$object->tour_name		= Input::get('tour_name');
		$object->first_name		= Input::get('first_name');
		$object->last_name		= Input::get('last_name');
		$object->address1		= Input::get('address1');
		$object->address2		= Input::get('address2');
		$object->address3		= Input::get('address3');
		$object->mst002_id		= Input::get('countryId');
		$object->mst003_id		= Input::get('cityId');
		$object->zip_code		= Input::get('zip_code');
		$object->phone_number	= Input::get('phone_number');
		$object->instagram		= Input::get('instagram');
		$object->facebook		= Input::get('facebook');
		$object->twitter		= Input::get('twitter');
		$object->website		= Input::get('website');
		
		return $object;
	}
}