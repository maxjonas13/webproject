<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Comment extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';
	
	//de naam van de primary key aangeven aangezien deze niet de standaard "id" is in dit geval
	protected $primaryKey = 'PK_commentId';

	//function for the relation with the Job model
	public function job() {
		return $this->belongsTo('Job', 'FK_jobId');
	}

	//function for the relationship with the user model
	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}

	//function to store a new comment into the db
	public function store() {
		//make new comment
		$comment = new Comment;

		//put the input data in the wright column
		$comment->FK_jobId = Input::get('jobid');
		$comment->FK_userId = Auth::user()->PK_userId;
		$comment->comment = Input::get('comment');

		//save the comment
		$comment->save();
	}

	//funtion to delte a comment with a given id
	public function deleteRecord($id) {
		//find the comment with the given id
		$comment = Comment::find($id);
		
		$comment->delete();
	}
	
}
