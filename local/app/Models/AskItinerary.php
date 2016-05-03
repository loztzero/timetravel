<?php namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;

class AskItinerary extends Emodel {
	
	protected $table = 'TR0050';

	public static function rules($data) {
		$error = array();
		
		$rules = array(
			'countryId'			=> 'required',
			'departure_date'	=> 'required',
			'days'				=> 'required',
			'pax'				=> 'required',
		);

		$messages = array(
			'countryId.required'		=> 'Negara harus diisi',
			'departure_date.required'	=> 'Tanggal berangkat harus diisi',
			'days.required'				=> 'Lama harus diisi',
			'pax.required'				=> 'Pax harus diisi',
		);
		
		$v = Validator::make($data, $rules, $messages);
		
		if($v->fails()) {
			$error = $v->errors()->all();
		}

		return $error;
	}

	public function doParams($object, $data) {
		$object->mst001_id		= $data['mst001_id'];
		$object->ask_date		= date('Y-m-d');
		$object->mst002_id		= $data['countryId'];
		$object->mst003_id		= empty($data['cityId']) ? null : $data['cityId'];
		$object->period_date	= date('Y-m-d', strtotime($data['departure_date']));
		$object->days			= $data['days'];
		$object->pax			= $data['pax'];
		
		return $object;
	}
}