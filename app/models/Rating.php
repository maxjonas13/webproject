<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Rating extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ratings';

	//the name of the primary key column
	protected $primaryKey = 'PK_ratingId';

	//there are not timestamps in this table, so put it on false
	public $timestamps = FALSE;

	//function for the relation with the user model
	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}

	//function to store a rate
	public function storeRate($userid, $ratevalue) {
		$data = $userid . ' ' . $ratevalue;
		$rating = new Rating;

		$rating->rating = $ratevalue;
		$rating->FK_userId = $userid;

		$rating->save();
	}

	//function to calculate the average rating of the user
	public function getRates($userid) {
		//average is standard 0
		$average = 0;
		
		//get all the ratings for the given user
		$rating = Rating::where('FK_userId', '=', $userid)->get();

		//count how many ratings there are for the given user
		$results = count($rating);

		//for each rating get the value off the rating
		foreach($rating as $value) {
			$average += $value->rating;
		}

		//if there are ratings calculate the average witht the formula $average divided by results
		if($results != 0) {
			$average = $average / $results;
		}
		//if there are no ratings the average is equal to zero
		else {
			$average = 0;
		}

		$average = round($average);

		//return the average rating
		return $average;
	}

}
