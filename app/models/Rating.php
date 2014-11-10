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
	protected $primaryKey = 'PK_ratingId';
	public $timestamps = FALSE;

	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}

	public function storeRate($userid, $ratevalue) {
		$data = $userid . ' ' . $ratevalue;
		$rating = new Rating;

		$rating->rating = $ratevalue;
		$rating->FK_userId = $userid;

		$rating->save();
	}

	public function getRates($userid) {
		$average = 0;
		
		$rating = Rating::where('FK_userId', '=', $userid)->get();

		$results = count($rating);

		foreach($rating as $value) {
			$average += $value->rating;
		}

		if($results != 0) {
			$average = $average / $results;
		}
		else {
			$average = 0;
		}
		$average = round($average);

		return $average;
	}

}
