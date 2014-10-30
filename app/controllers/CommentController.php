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

			//redirect the user back.
			return Redirect::back();
		}
	}

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

}
