<?php namespace App\Http\Controllers\Tour;

use Input, Session, Redirect, Auth, Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourProfile;
use App\Models\VisitorProfile;
use App\Models\AskItinerary;
use App\User;
use App\Models\Country;
use App\Models\City;

class AskItineraryController extends Controller {

	public function getIndex($userId){
		$tourProfile = TourProfile::where('mst001_id', '=', $userId)->first();
		$countries = Country::all()->sortBy('country_name');
		
		return view('tour.askitinerary.ask-itinerary-browse')
				->with('tourProfile', $tourProfile)
				->with('countries', $countries);
	}

	public function postSave(Request $request){
		$data = $request->all();
		$askItinerary = new AskItinerary();
		$user = User::find($data['mst001_id']);
		
		$errorBag = $askItinerary->rules($data);

		if(count($errorBag) > 0){

			Session::flash('error', $errorBag);
			return redirect('ask-itinerary')->withInput($data);
		} else {

			if(isset($data['id'])){
				$askItinerary = AskItinerary::find($data['id']);
				
				if($askItinerary == null){
					$askItinerary = new AskItinerary();
				}
			}

			$askItinerary->doParams($askItinerary, $data);
			$askItinerary->save();

			$mail = $this->setMailData($data);
			
			Mail::send('tour.askitinerary.ask-itinerary-email', $mail, function($message) use ($user, $request) {
				$message->to($user->email)->subject('Permintaan Itinerary');
			});
			
			return redirect('ask-itinerary/index/'.$data['mst001_id'])->with('message', array('Data permintaan itinerary telah berhasil di buat dan di kirim ke tour'))
					->withInput($askItinerary->toArray());
		}
	}

	public function getCityByCountry(Request $request){
		$countryId = $request->countryId;
		$cities = City::where('mst002_id', '=', $countryId)->orderBy('city_name')->get()->toJson();

		return $cities;
	}
	
	public function setMailData($data){
		$tourProfile = TourProfile::where('mst001_id', '=', $data['mst001_id'])->first();
		$visitorProfile = VisitorProfile::where('mst001_id', '=', Auth::user()->id)->first();
		$user = User::find(Auth::user()->id);
		$country = Country::find($data['countryId']);
		$city = City::find($data['cityId']);
		
		$tourName = $tourProfile->tour_name;
		$firstName = $visitorProfile->first_name;
		$lastName = $visitorProfile->last_name;
		$phoneNumber = $visitorProfile->phone_number;
		$email = $user->email;
		$countryName = $country->country_name;
		$cityName = $city == null ? "" : $city->city_name;
		$departureDate = $data['departure_date'];
		$days = $data['days'];
		$pax = $data['pax'];
		
		return array(	'tour_name' => $tourName,
						'first_name' => $firstName,
						'last_name' => $lastName,
						'phone_number' => $phoneNumber,
						'email' => $email,
						'country_name' => $countryName,
						'city_name' => $cityName,
						'departure_date' => $departureDate,
						'days' => $days,
						'pax' => $pax
		);
	}
}
