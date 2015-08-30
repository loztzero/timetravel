<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Input;
use DateTime;
use App\Emodel;
use Validator;
class SampleUpload extends Emodel {
	protected $table = 'sample_upload';

	public static function rules($data)
	{
		$error = array();
		$rules = array(
			'fileCode'      	=> 'required',
        );

		$messages = array(
            'fileCode.required'		=> 'Kode file harus diisi',
		);
		
        $v = Validator::make($data, $rules, $messages);
        if($v->fails()){
    		$error = $v->errors()->all();
        }

		return $error;
	}

	public function doParams($object, $data)
	{
		$object->file_code      = Input::get('fileCode');
		$object->file_upload    = Input::file('fileUpload')->getClientOriginalName();
		
		return $object;
	}


//SCRIPT UNTUK BUAT TABLE SAMPLE UPLOAD
// 	CREATE TABLE IF NOT EXISTS `sample_upload` (
//   `id` varchar(100) NOT NULL,
//   `file_code` varchar(100) NOT NULL,
//   `file_upload` varchar(100) NOT NULL,
//   `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
// ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

// 	ALTER TABLE `sample_upload`
//  ADD PRIMARY KEY (`id`);

}