<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class JobCategorie extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_categories';
	
	//de naam van de primary key aangeven aangezien deze niet de standaard "id" is in dit geval
	protected $primaryKey = 'PK_users_categoryId';

	//There are no timestamps in the category table, so put it on false
	public $timestamps = false;

	//function for the relation with the Job model
	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}

	//function for the relation with the Category model
	public function categorie() {
		return $this->belongsTo('Category', 'FK_categoryId');
	}

	
}
