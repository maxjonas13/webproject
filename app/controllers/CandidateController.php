<?php

class CandidateController extends BaseController {

	public function apply($id) {
		$candidate = new Candidate;
		$check = $candidate->checkIfUserHasSolicitated($id);
		if(!$check) {
			$candidate->store($id);
		}
		else {
			$candidate->cancelSolicitation($id);
		}
	}

	//function to cancel a solicitation
	public function cancelSolicitation($id) {
		if(Auth::check()) {
			$candidate = new Candidate;
			$candidate->cancelSolicitation($id);
		}
	}

	public function getSolicitants($id) {
		$userids = array();
		$users = array();

		$candidates = Candidate::where('FK_jobId', '=', $id)->with('User')->get();
		
		foreach($candidates as $candidate) {
			array_push($userids, $candidate->user->PK_userId);
		}

		foreach($userids as $id) {
			array_push($users, User::where('PK_userId', '=', $id)->with('Profile')->get());
		}

		return $users;
	}
	

}
