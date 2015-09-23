<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator, Auth;
class VisitorItenary extends Emodel {
	protected $table = 'VST030';

	public static function rules($data)
	{
		$error = array();
		$rules = array(
			'title'      	=> 'required',
            'description'      => 'required',
        );

		$messages = array(
            'title.required'		=> 'Field 1 harus diisi',
            'description.required'		=> 'Field 2 harus diisi',
		);
		
        $v = Validator::make($data, $rules, $messages);
        if($v->fails()){
    		$error = $v->errors()->all();
        }

		return $error;
	}

	public function doParams($object, $data)
	{
		$object->mst001_id 		= Auth::user()->id;
		$object->line_number 	= $this->getMaxLineNumber();
		$object->title      	= $data['title'];
		$object->description   	= $data['description'];
		return $object;
	}

	private function getMaxLineNumber(){
		$result = VisitorItenary::where('mst001_id', '=', Auth::user()->id)->max('line_number');
		if($result != null){
			return $result + 1;
		}

		return 1;
	}


}