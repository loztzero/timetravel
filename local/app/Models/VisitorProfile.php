<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator, Auth;
class VisitorProfile extends Emodel {
	protected $table = 'VST001';

	public static function rules($data)
	{
		$error = array();
		$rules = array(
			'firstName'     => 'required',
            'address1'      => 'required',
            'phoneNumber'   => 'required',
        );

		$messages = array(
            'firstName.required'	=> 'First name is required',
            'address1.required'		=> 'First address is required',
            'phoneNumber.required'	=> 'Phone number is required'
		);
		
        $v = Validator::make($data, $rules, $messages);
        if($v->fails()){
    		$error = $v->errors()->all();
        }

		return $error;
	}

	public function doParams($object, $data)
	{
		$object->mst001_id 	   = Auth::user()->id;
		$object->first_name      = $data['firstName'];
		$object->last_name      = $data['lastName'];
		$object->address1      = $data['address1'];
		$object->address2      = isset($data['address2']) ? $data['address2'] : null;
		$object->address3      = isset($data['address3']) ? $data['address3'] : null;
		$object->city      	   = isset($data['city']) ? $data['city'] : null;
		$object->country       = isset($data['country']) ? $data['country'] : null;
		$object->zip_code      = isset($data['zipCode']) ? $data['zipCode'] : null;
		$object->phone_number  = $data['phoneNumber'];
		$object->photo  	   = isset($data['photo']) ? $data['photo']->getClientOriginalName() : $object->photo;
		return $object;
	}

}