<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Candidate extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'candidates';
	
	//de naam van de primary key aangeven aangezien deze niet de standaard "id" is in dit geval
	protected $primaryKey = 'PK_candidateId';

	//function for the relation with the Job model
	public function job() {
		return $this->belongsTo('Job', 'FK_jobId');
	}

	//function for the relationship with the user model
	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}

	//function to store a candidate
	public function store() {
		
	}
	
}
