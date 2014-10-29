<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Category extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	//de naam van de primary key aangeven aangezien deze niet de standaard "id" is in dit geval
	protected $primaryKey = 'PK_categoryId';

	//There are no timestamps in the category table, so put it on false
	public $timestamps = FALSE;

	//function for the relation with the JobCategorie model
	public function jobcategorie() {
		return $this->hasMany('JobCategorie', 'FK_categoryId');
	}

	//function for the relation with the Job model
	public function job() {
		return $this->hasMany('Job');
	}

	
}
