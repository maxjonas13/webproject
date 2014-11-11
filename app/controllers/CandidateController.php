<?php

class CandidateController extends BaseController {

	public function apply($id) {
		$candidate = new Candidate;
		$check = $candidate->checkIfUserHasSolicitated($id);
		if(!$check) {
			$candidate->store($id);
			$this->sendMail($id);
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
	
	public function sendMail($id) {
		$nameSolicitant = Auth::user()->name;
		$emailSolicitant = Auth::user()->email;

		$job = Job::find($id);
		$jobTitle = $job->title;
		$userid = $job->FK_userId;

		$user = User::find($userid);
		$name = $user->name;
		$email = $user->email;

		//set the data to use in the email ready
		$data = array(
			'name' 				=> $name,
			'email' 			=> $email,
			'nameSolicitant' 	=> $nameSolicitant,
			'emailSolicitant' 	=> $emailSolicitant,
			'jobTitle'			=> $jobTitle
		);
			
		//send the user an email with some more information
		Mail::send('emails.apply', $data , function($message) use($email, $name){
		    $message->to($email, $name)->subject('You got a new solicitant for youre job'); 
		});
	}

}
