<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;
class Sample extends Emodel {
	protected $table = 'sample';

	public static function rules($data)
	{
		$error = array();
		$rules = array(
			'field1'      	=> 'required',
            'field2'      => 'required',
        );

		$messages = array(
            'field1.required'		=> 'Field 1 harus diisi',
            'field2.required'		=> 'Field 2 harus diisi',
		);
		
        $v = Validator::make($data, $rules, $messages);
        if($v->fails()){
    		$error = $v->errors()->all();
        }

		return $error;
	}

	public function doParams($object, $data)
	{
		$object->field1      = Input::get('field1');
		$object->field2    	 = Input::get('field2');
		
		return $object;
	}

}