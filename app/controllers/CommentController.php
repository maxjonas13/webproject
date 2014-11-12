<?php

class CommentController extends BaseController {

	//function to store a new comment
	public function store() {
		//make a validator to validate the input data
		$validator = Validator::make(
			array(
				'comment' => Input::get('comment')
			),
			array(
				'comment' => 'required|min:3'
			)
		);

		//put the error messages in the variable messages
		$messages = $validator->messages();

		//check if the validator fails
		if($validator->fails()) {
			//validator faild, redirect the user back with errors and input.
			return Redirect::back()->withErrors($messages)->withInput();
		}
		else {
			//validator passed

			//make new comment
			$comment = new Comment;
			//call the sotre function in the comment model to store the data
			$comment->store();
			//call the sendMail function to notify the owner of the job
			$this->sendMail();

			//redirect the user back.
			return Redirect::back();
		}
	}

	//NOT IN USE FOR THE MOMENT, ADMIN PANEL NOT READY YET
	//function to delete a given comment
	public function delete($id) {
		//check if the user is authenticated
		if(Auth::check()) {
			$comment = Comment::find($id);
			
			if(Auth::user()->PK_userId == $comment->FK_userId) { //implement a OR state for if the user has the role admin
				$comment->deleteRecord($id);
				return Redirect::to('/jobs/details/' . $comment->FK_jobId);
			}
			else {
				return Redirect::to('/');
			}
		}
		else {
			return Redirect::to('/');
		}
	}

	//function to send a email to the owner of the job to notify him that there is a new comment
	public function sendMail() {
		//get the job id
		$jobid = Input::get('jobid');

		//get the data off the commentor
		$commentor = Auth::user()->PK_userId;
		$commentorName = Auth::user()->name;

		//get the job and his owner
		$job = Job::find($jobid);
		$user = User::find($job->FK_userId);
		
		//store the user info in varibales
		$name = $user->name;
		$email = $user->email;

		//get the comment
		$comment = Input::get('comment');

		//set the data to use in the email ready
		$data = array(
			'name' 				=> $name,
			'email'				=> $email,
			'commentorName'		=> $commentorName,
			'comment' 			=> $comment,
			'jobid'				=> $jobid
		);
			
		//send the owner off the job to notify him there is a new comment on his job
		Mail::send('emails.comment', $data , function($message) use($email, $name) {
			$message->to($email, $name)->subject('You got a new comment on youre job'); 
		});
	}

}
