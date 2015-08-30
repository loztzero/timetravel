<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.x
|
*/
use App\Models\VisitorPhotoAlbum;

Route::controller('sample', 'SampleController');
Route::controller('visitor-profile', 'VisitorProfileController');
Route::controller('visitor-itenary', 'VisitorItenaryController');
Route::controller('visitor-favorite-tour', 'VisitorFavoriteTourController');
Route::controller('visitor-photo-album', 'VisitorPhotoAlbumController');
Route::controller('sample-upload', 'SampleUploadController');
Route::controller('main', 'MainController');
Route::controller('user', 'UserController');
Route::controller('tour-profile', 'TourProfileController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('yo', function()
{

	print_r(VisitorPhotoAlbum::max('line_number'));

});

Route::get('duck', function()
{
	//echo Uuid::generate();
	
	$pdf = App::make('dompdf.wrapper');
	$pdf->loadHTML('<h1>Test</h1>');
	return $pdf->stream();
});

Route::get('excel', function()
{
	 Excel::create('Laravel Excel', function($excel) {

	$excel->sheet('Excel sheet', function($sheet) {

		$sheet->setOrientation('landscape');

	});

})->export('xls'); 
});