<?php

class CandidateController extends BaseController {

	//function to apply on a job
	public function apply($id) {
		//create a new instance of the Candidate Model
		$candidate = new Candidate;
		//store the result off the checkIfUserHasSolicitated function in the $check variable
		$check = $candidate->checkIfUserHasSolicitated($id);

		//check if the user has allready solicitated
		if(!$check) {
			//the user has not solicitated yet, store his solicitation
			$candidate->store($id);
			//call the sendMail function to notify the owner off the job
			$this->sendMail($id);
		}
		else {
			//the user has allready solicitated, so he has pressed the cancel button
			$candidate->cancelSolicitation($id);
		}
	}

	//function to cancel a solicitation
	public function cancelSolicitation($id) {
		//check if the user is authenticated
		if(Auth::check()) {
			//cancel the solicitation off the user
			$candidate = new Candidate;
			$candidate->cancelSolicitation($id);
		}
	}

	//function to get all the solicitants
	public function getSolicitants($id) {
		//create 2 arrays to store the results
		$userids = array();
		$users = array();

		//get all the candidates for the current job
		$candidates = Candidate::where('FK_jobId', '=', $id)->with('User')->get();
		
		//store all the user id's in the $userids array
		foreach($candidates as $candidate) {
			array_push($userids, $candidate->user->PK_userId);
		}

		//store all the users in the $users array
		foreach($userids as $id) {
			array_push($users, User::where('PK_userId', '=', $id)->with('Profile')->get());
		}

		//return all the users for this job
		return $users;
	}
	
	//function to send a mail to the owner off the job to notify him there is a Candidate
	public function sendMail($id) {
		//get the data from the candidate
		$nameSolicitant = Auth::user()->name;
		$emailSolicitant = Auth::user()->email;

		//get the data off the job
		$job = Job::find($id);
		$jobTitle = $job->title;
		$userid = $job->FK_userId;

		//get the data off the job owner
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
			
		//send the owner off the job an email to notify him there is a new candidate
		Mail::send('emails.apply', $data , function($message) use($email, $name){
		    $message->to($email, $name)->subject('You got a new solicitant for youre job'); 
		});
	}

}
