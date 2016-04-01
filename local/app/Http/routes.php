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
    if (Auth::guest()){
		return Redirect::guest('main');
	}
});

//script untuk menjaga apakah dia visitor atau bukan
Route::filter('isTraveler', function($route, $request){

	if(Auth::user()->role != 'User'){
		return redirect('/main/register');
	}

});

//script untuk menjaga apakah dia visitor atau bukan
Route::filter('isTour', function($route, $request){

	if(Auth::user()->role != 'Tour'){
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

	Route::group(array('before' => 'isTour'), function(){
		Route::controller('tour-profile', 'Tour\ProfileController');
		Route::controller('tour-review', 'Tour\ReviewController');
		Route::controller('tour-itinerary', 'Tour\ItineraryController');
		Route::controller('tour-album', 'Tour\AlbumController');
	});
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', function()
{
	if(Auth::check()){
		if(Auth::user()->role == 'User'){
			return redirect('visitor-profile');
		} elseif(Auth::user()->role == 'Tour'){
			return redirect('tour-profile');
		}
	} else {
		return redirect('main');
	}
});

Route::controller('tour-register', 'Tour\RegisterController');
Route::get('/facebook', 'FacebookController@facebook');
Route::get('/callback', 'FacebookController@callback');
Route::controller('sample', 'SampleController');
Route::controller('sample-upload', 'SampleUploadController');
Route::controller('main', 'MainController');
Route::controller('user', 'UserController');

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
