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

	//function to check if the user has allready solicitated
	public function checkIfUserHasSolicitated($id) {
		$solicitated = Candidate::where(function($query) use($id) {
			$query->where('FK_userId', '=', Auth::user()->PK_userId);
				$query->where('FK_jobId', '=', $id);
		})->get();
			
		if(count($solicitated) > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	//function to store a candidate
	public function store($id) {
		$candidate = new Candidate;

		$candidate->FK_jobId = $id;
		$candidate->FK_userId = Auth::user()->PK_userId;
		$candidate->canceled = FALSE;

		$candidate->save();
	}

	public function cancelSolicitation($id) {
		$candidate = Candidate::where(function($query) use($id){
			$query->where('FK_jobId', '=', $id);
			$query->where('FK_userId', '=', Auth::user()->PK_userId);
		})->first();

		if($candidate->canceled) {
			$candidate->canceled = FALSE;
		}
		else {
			$candidate->canceled = TRUE;
		}

		$candidate->save();
	}
	
}
