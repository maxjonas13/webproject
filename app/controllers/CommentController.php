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

}
