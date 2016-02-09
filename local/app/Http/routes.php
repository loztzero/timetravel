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

Route::get('password', function(){
	echo Hash::make('bebek123');
});

Route::filter('auth', function($route, $request)
{
    // Login check (Default)
    if (Auth::guest()) return Redirect::guest('/main');
});

//script untuk menjaga apakah dia visitor atau bukan
Route::filter('isTraveler', function($route, $request){

	if(Auth::user()->role != 'User'){
		return redirect('/main/register');
	}

});

Route::group(array('before' => 'auth'), function(){
	Route::group(array('before' => 'isTraveler'), function(){
		Route::controller('visitor-profile', 'Visitor\ProfileController');
		Route::controller('visitor-itenary', 'Visitor\ItenaryController');
		Route::controller('visitor-favorite-tour', 'Visitor\FavoriteTourController');
		Route::controller('visitor-journey', 'Visitor\JourneyController');
	});
});

Route::get('/facebook', 'FacebookController@facebook');
Route::get('/callback', 'FacebookController@callback');
Route::controller('sample', 'SampleController');
Route::controller('sample-upload', 'SampleUploadController');
Route::controller('/', 'MainController');
Route::controller('user', 'UserController');
Route::controller('tour-profile', 'TourProfileController');
Route::controller('tour-review', 'TourReviewController');
Route::controller('tour-itenary', 'TourItenaryController');
Route::controller('tour-album', 'TourAlbumController');

/*Route::get('/', function () {
    return view('welcome');
});*/

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