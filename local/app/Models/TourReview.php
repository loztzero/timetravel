<?php namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;
use App\Models\VisitorProfile;

class TourReview extends Emodel {
	
	protected $table = 'TR0020';

	public static function rules($data)	{
		$error = array();
		
		$rules = array(
			'range'		=> 'required',
			'review'	=> 'required',
		);

		$messages = array(
			'range.required'		=> 'Rating harus diisi',
			'description.required'	=> 'Description harus diisi',
		);
		
		$v = Validator::make($data, $rules, $messages);
		
		if($v->fails()) {
			$error = $v->errors()->all();
		}

		return $error;
	}

	public function doParams($object, $data) {
		$object->mst001_id		= $data['mst001_id'];
		$object->vst001_id		= $this->getVisitorId(Auth::user()->id);
		$object->line_number	= $this->getMaxLineNumber($data['mst001_id']);
		$object->review			= $data['review'];
		$object->range			= $data['range'];
		
		return $object;
	}
	
	public function traveler(){
		return $this->hasOne('App\Models\VisitorProfile', 'id', 'vst001_id');
	}

	public function getMaxLineNumber($mst001_id) {
		$result = TourReview::where('mst001_id', '=', $mst001_id)->where('vst001_id', '=', $this->getVisitorId(Auth::user()->id))->max('line_number');
		
		if(isset($result)){
			return $result+=1;
		}

		return 1;
	}

	private function getVisitorId($mst001_id) {
		$result = VisitorProfile::where('mst001_id', '=', $mst001_id)->first();
		
		return $result->id;
	}
}