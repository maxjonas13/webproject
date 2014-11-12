<?php

class RatingController extends BaseController {

	//function to rate a user
	public function rate() {
		//get the rated user
		$userid = str_replace("user", "", Input::get('data')[0]);
		$rating = Input::get('data')[1];

		//check if the user is authenticated
		if(Auth::check()) {
			//check if the user is not trying to rate his self
			if(Auth::user()->PK_userId != $userid) {
				//store rate
				$rate = new Rating;
				$test = $rate->storeRate($userid, $rating);
				
				//send rated user an email to notify him
				$this->sendMail($userid, $rating);
			}
		}
		else {
			return Redirect::to('/');
		}
	}

	//function to get the average rates off the user
	public function getRates($userid) {
		$rate = new Rating;
		
		return $rate->getRates($userid);
	}

	//function to send a mail to the owner of the profile
	public function sendMail($userid, $rating) {
		//get data from the owner
		$user = User::find($userid);

		$email = $user->email;
		$name = $user->name;

		//get data from the rater
		$rater = Auth::user()->name;

		//set the data to use in the email ready
		$data = array(
			'name' 		=> $name,
			'email'		=> $email,
			'rater'		=> $rater,
			'rating' 	=> $rating
		);
			
		//send the owner of the profile an email to notify him that there is a new rate
		Mail::send('emails.rating', $data , function($message) use($email, $name) {
			$message->to($email, $name)->subject('You got a new rating'); 
		});
	}

}
