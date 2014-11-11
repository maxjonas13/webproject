<?php

class RatingController extends BaseController {

	public function rate() {
		$userid = str_replace("user", "", Input::get('data')[0]);;
		$rating = Input::get('data')[1];
		if(Auth::check()) {
			if(Auth::user()->PK_userId != $userid) {
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

	public function getRates($userid) {
		$rate = new Rating;
		return $rate->getRates($userid);
	}

	public function sendMail($userid, $rating) {
		$user = User::find($userid);

		$email = $user->email;
		$name = $user->name;
		$rater = Auth::user()->name;

		//set the data to use in the email ready
		$data = array(
			'name' 		=> $name,
			'email'		=> $email,
			'rater'		=> $rater,
			'rating' 	=> $rating
		);
			
		//send the user an email with some more information
		Mail::send('emails.rating', $data , function($message) use($email, $name) {
			$message->to($email, $name)->subject('You got a new rating'); 
		});
	}

}
