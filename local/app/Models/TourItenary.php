<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;
class TourItenary extends Emodel {
	protected $table = 'TR0040';

	public static function rules($data)
	{
		$error = array();
		$rules = array(
			'currency'		=> 'required',
            'price'			=> 'required',
        );

		$messages = array(
            'currency.required'		=> 'Currency harus diisi',
            'price.required'		=> 'Price harus diisi',
		);
		
        $v = Validator::make($data, $rules, $messages);
        if($v->fails()){
    		$error = $v->errors()->all();
        }

		return $error;
	}

	public function doParams($object, $data)
	{
		$object->mst001_id		= "1";
		$object->line_number	= (is_null($object['line_number']))?getMaxLineNumber():$object['line_number'];
		$object->category		= $data['category'];
		$object->currency		= $data['currency'];
		$object->price			= $data['price'];
		$object->description	= $data['description'];
		return $object;
	}

	private function getMaxLineNumber(){
		$result = TourItenary::max('line_number')->where('mst001_id', '=', "1");
		if($result != null){
			return $result->get()->line_number + 1;
		}

		return 1;
	}
}