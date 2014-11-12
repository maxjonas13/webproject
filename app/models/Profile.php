<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Profile extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profiles';
	//the name of the primary key column
	protected $primaryKey = 'PK_profileId';

	//function for the relation with the user model
	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}
}
