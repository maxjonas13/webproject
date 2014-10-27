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
	//de naam van de primary key aangeven aangezien deze niet de standaard "id" is in dit geval
	protected $primaryKey = 'PK_profileId';

	public function user() {
		return $this->belongsTo('User');
	}
}
