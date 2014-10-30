<?php

class CommentController extends BaseController {

	//function to store a new comment
	public function store() {
		$validator = Validator::make(
			array(
				'comment' => Input::get('comment')
			),
			array(
				'comment' => 'required|min:3'
			)
		);

		$messages = $validator->messages();

		if($validator->fails()) {
			return Redirect::back()->withErrors($messages)->withInput();
		}
		else {
			$comment = new Comment;
			$comment->store();

			return Redirect::back();
		}
	}

}
