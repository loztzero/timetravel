<?php namespace App\Models;

use Auth;
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
			'photo'			=> 'required',
			'title'			=> 'required',
			'category'		=> 'required',
			'currencyId'	=> 'required',
			'price'			=> 'required',
			'min_pax'		=> 'required',
			'start_period'	=> 'required',
			'end_period'	=> 'required',
			'countryId'		=> 'required',
			'cityId'		=> 'required',
			'description'	=> 'required',
		);

		$messages = array(
			'photo.required'		=> 'Photo harus diisi',
			'title.required'		=> 'Title harus diisi',
			'category.required'		=> 'Category harus diisi',
			'currencyId.required'	=> 'Currency harus diisi',
			'price.required'		=> 'Price harus diisi',
			'min_pax.required'		=> 'Min pax harus diisi',
			'start_period.required'	=> 'Start period harus diisi',
			'end_period.required'	=> 'End period harus diisi',
			'countryId.required'	=> 'Negara harus diisi',
			'cityId.required'		=> 'Kota harus diisi',
			'description.required'	=> 'Description harus diisi',
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
		$object->title			= $data['title'];
		$object->category		= $data['category'];
		$object->mst002_id		= $data['countryId'];
		$object->mst003_id		= $data['cityId'];
		$object->mst004_id		= $data['currencyId'];
		$object->price			= $data['price'];
		$object->description	= $data['description'];
		$object->start_period	= $data['start_period'];
		$object->end_period		= $data['end_period'];
		$object->min_pax		= $data['min_pax'];
		$object->photo			= $data['photo']->getClientOriginalName();
		
		return $object;
	}
	
	public function currencies(){
		return $this->hasMany('App\Models\Currency', 'id', 'mst004_id');
	}
	
	public function countries(){
		return $this->hasMany('App\Models\Country', 'id', 'mst002_id');
	}
	
	public function cities(){
		return $this->hasMany('App\Models\City', 'id', 'mst003_id');
	}

	private function getMaxLineNumber() {
		$result =  TourItinerary::where('mst001_id', '=', Auth::user()->id)->max('line_number');
		
		if($result){
			return $result+=1;
		}

		return 1;
	}
}