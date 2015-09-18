<?php namespace App\Libraries;

class Helpers { 

	public static function mysqlID(){
		$results = DB::select('select uuid() as z from dual ');
		return $results[0]->z;
	}

} 

?>