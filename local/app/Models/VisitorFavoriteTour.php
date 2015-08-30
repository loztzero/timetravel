<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;
class VisitorFavoriteTour extends Emodel {
	protected $table = 'VST010';

	public static function rules($data)
	{
		$error = array();
		$rules = array(
            'tourId'      => 'required',
        );

		$messages = array(
            'tourId.required'		=> 'Profil Tur harus terpilih',
		);
		
        $v = Validator::make($data, $rules, $messages);
        if($v->fails()){
    		$error = $v->errors()->all();
        }

		return $error;
	}

	public function doParams($object, $data)
	{
		$object->mst001_id = Auth::user()->id;
		$object->tr010_id  = $data['tourId'];
		return $object;
	}

}