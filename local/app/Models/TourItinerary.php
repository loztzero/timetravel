<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;
class TourItinerary extends Emodel {
	protected $table = 'TR0040';

	public static function rules($data)	{
		$error = array();
		
		$rules = array(
			'currency'		=> 'required',
			'countryId'		=> 'required',
			'cityId'		=> 'required',
			'price'			=> 'required',
			'start_period'	=> 'required',
			'min_pax'		=> 'required',
		);

		$messages = array(
			'currency.required'		=> 'Currency harus diisi',
			'countryId.required'	=> 'Negara harus diisi',
			'cityId.required'		=> 'Kota harus diisi',
			'price.required'		=> 'Price harus diisi',
			'start_period.required'	=> 'Start period harus diisi',
			'min_pax.required'		=> 'Min pax harus diisi',
		);
		
		$v = Validator::make($data, $rules, $messages);
		if($v->fails()) {
			$error = $v->errors()->all();
		}

		return $error;
	}

	public function doParams($object, $data) {
		$object->mst001_id		= Auth::user()->id;
		$object->line_number	= $this->getMaxLineNumber();
		$object->category		= $data['category'];
		$object->mst002_id		= $data['countryId'];
		$object->mst003_id		= $data['cityId'];
		$object->currency		= $data['currency'];
		$object->price			= $data['price'];
		$object->description	= $data['description'];
		$object->start_period	= $data['start_period'];
		$object->end_period		= $data['end_period'];
		$object->photo			= $data['photo'];
		$object->min_pax		= $data['min_pax'];
		
		return $object;
	}

	private function getMaxLineNumber() {
		$result = TourItinerary::max('line_number')->where('mst001_id', '=', Auth::user()->id);
		if($result != null) {
			return $result->get()->line_number + 1;
		}

		return 1;
	}
}