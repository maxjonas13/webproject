<?php

class CandidateController extends BaseController {

	public function apply($id) {
		// $candidate = new Candidate;
		// $candidate->FK_jobId = 54;
		// $candidate->FK_userId = Auth::user()->PK_userId;
		// $candidate->canceled = FALSE;

		// $candidate->save();
		$candidate = new Candidate;
		$check = $candidate->checkIfUserHasSolicitated($id)
		if(!$check) {
			$candidate->store($id);
		}
	}
	

}
