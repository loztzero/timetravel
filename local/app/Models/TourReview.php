<?php namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;

class TourReview extends Emodel {
	
	protected $table = 'TR0020';
	
	public function travelers(){
		return $this->hasMany('App\Models\VisitorProfile', 'id', 'vst001_id');
	}
}