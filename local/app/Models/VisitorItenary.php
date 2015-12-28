<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use DB;
use Validator;
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
            'title.required'		=> 'Title must be filled',
            'description.required'		=> 'Description must be filled',
		);
		
        $v = Validator::make($data, $rules, $messages);
        if($v->fails()){
    		$error = $v->errors()->all();
        }

		return $error;
	}

	public function doParams($object, $data)
	{
		$object->mst001_id 		= '7d88f93d-6af6-4e9d-9235-2e7b005f5a0d';//Auth::user()->id;
		$object->line_number 	= $this->getMaxLineNumber();
		$object->title      	= $data['title'];
		$object->description   	= $data['description'];
		return $object;
	}

	private function getMaxLineNumber(){
		$result =  VisitorItenary::where('mst001_id', '=', '7d88f93d-6af6-4e9d-9235-2e7b005f5a0d')
					->max('line_number')->get()
					;
		if($result != null){
			return $result->line_number + 1;
		}

		return 1;
	}


}