<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;
class VisitorFavoriteTour extends Emodel {
	protected $table = 'VST010';

	public function tour()
    {
        return $this->hasOne('TourProfile', 'id', 'tr0010_id');
    }

    public function user()
    {
        return $this->hasOne('User', 'id', 'mst001_id');
    }


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