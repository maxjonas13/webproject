<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Credit extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'credits';
	//Define the name of the primary key, in this case this is diffrent from the default "id"
	protected $primaryKey = 'PK_creditId';

	//disable timestamps for this model
	public $timestamps = FALSE;

	public function user() {
		return $this->belongsTo('User');
	}
}
