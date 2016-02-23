<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator, Auth;

class Currency extends Emodel {
	protected $table = 'MST004';

}