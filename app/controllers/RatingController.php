<?php

class RatingController extends BaseController {

	public function rate() {
		$userid = str_replace("user", "", Input::get('data')[0]);;
		$rating = Input::get('data')[1];
		if(Auth::check()) {
			if(Auth::user()->PK_userId != $userid) {
				$rate = new Rating;
				$test = $rate->storeRate($userid, $rating);
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

}
