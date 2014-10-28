<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Job extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jobs';
	//de naam van de primary key aangeven aangezien deze niet de standaard "id" is in dit geval
	protected $primaryKey = 'PK_jobId';

	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}

	public function jobcategorie() {
		return $this->hasMany('JobCategorie', 'FK_jobId');
	}

	public function store() {
		$job = new Job;

		$job->title = Input::get('title');
		$job->location = Input::get('location');
		$job->description = Input::get('description');
		$job->fixed = FALSE;
		$job->FK_userId = Auth::user()->PK_userId;

		$job->jobcategorie()->FK_jobbId = 2;

		$job->save();

		/*$test = Input::get('grouped');
		var_dump($test);
		foreach($test as $t => $v) {
			echo $t;
		}*/
	}
}
