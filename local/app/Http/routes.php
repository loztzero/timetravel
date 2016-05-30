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
Route::get('about-us', function(){
	//$countryList = App\Models\Country::orderBy('country_name')->lists('country_name', 'id');
	$countries = App\Models\Country::all()->sortBy('country_name');
	return view('main.main-about')->with('countries', $countries);
});

Route::get('faq', function(){
	//$countryList = App\Models\Country::orderBy('country_name')->lists('country_name', 'id');
	$countries = App\Models\Country::all()->sortBy('country_name');
	return view('main.main-faq')->with('countries', $countries);
});


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

//script untuk menjaga apakah dia tour atau bukan
Route::filter('isTour', function($route, $request){

	if(Auth::user()->role != config('constants.TOUR')){
		return redirect('/tour-register');
	}
});

//script untuk menjaga apakah dia admin atau bukan
Route::filter('isAdmin', function($route, $request){

	if(Auth::user()->role != config('constants.ADMIN')){
		return redirect('/');
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

	Route::group(array('before' => 'isAdmin'), function(){
		Route::controller('tour-management', 'Admin\TourManagementController');
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
		} else if(Auth::user()->role == config('constants.TOUR')){
			return redirect('tour-profile');
		} else if(Auth::user()->role == config('constants.ADMIN')){
			return redirect('tour-management');
		}
	} else {
		return redirect('main');
	}
});

Route::controller('tour-profile-viewed', 'Tour\ProfileViewedController');
Route::controller('tour-album-viewed', 'Tour\AlbumViewedController');
Route::controller('tour-itinerary-viewed', 'Tour\ItineraryViewedController');
Route::controller('tour-review-viewed', 'Tour\ReviewViewedController');
Route::controller('ask-itinerary', 'Tour\AskItineraryController');

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
