<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;
class TourProfile extends Emodel {
	protected $table = 'VST001';

	public static function rules($data)
	{
		$error = array();
		$rules = array(
			'address1'      	=> 'required',
            'phone_number'      => 'required',
        );

		$messages = array(
            'address1.required'		=> 'Alamat harus diisi',
            'phone_number.required'		=> 'Nomor Telepon harus diisi',
		);
		
        $v = Validator::make($data, $rules, $messages);
        if($v->fails()){
    		$error = $v->errors()->all();
        }

		return $error;
	}

	public function doParams($object, $data)
	{
		$object->address1      = Input::get('address1');
		$object->address2      = Input::get('address2');
		$object->address3      = Input::get('address3');
		$object->city      	   = Input::get('city');
		$object->country       = Input::get('country');
		$object->zip_code      = Input::get('zipCode');
		$object->phone_number  = Input::get('phoneNumber');
		$object->photo  	   = Input::get('photo');
		
		return $object;
	}

}