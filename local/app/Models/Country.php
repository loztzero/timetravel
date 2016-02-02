<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator, Auth;
class Country extends Emodel {
	protected $table = 'MST002';

}