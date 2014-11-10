<?php

class RatingController extends BaseController {

	public function index() {
		$rating = Rating::with('User')->get();
		return $rating;
	}

}
