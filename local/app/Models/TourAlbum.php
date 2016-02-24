<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input, Auth;
use DateTime;
use App\Emodel;
use Validator;
class TourAlbum extends Emodel {
	protected $table = 'TR0030';

	public static function rules($data) {
		$error = array();
		
		$rules = array(
			'title'		=> 'required',
			'photo'		=> 'required',
		);

		$messages = array(
			'title.required'	=> 'Title is required',
			'photo.required'	=> 'File photo must be uploaded',
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
		$object->photo			= $data['photo'];
		$object->title			= $data['title'];
		
		return $object;
	}

	private function getMaxLineNumber() {
		$result = TourAlbum::where('mst001_id', '=', Auth::user()->id)
					->max('line_number');
		
		if($result != null) {
			return $result->get()->line_number + 1;
		}

		return 1;
	}
}