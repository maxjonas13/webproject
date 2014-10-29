<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Job extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jobs';
	//de naam van de primary key aangeven aangezien deze niet de standaard "id" is in dit geval
	protected $primaryKey = 'PK_jobId';

	//function for the relation with the User model
	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}

	//function for the relation with the JobCategorie model
	public function jobcategorie() {
		return $this->hasMany('JobCategorie', 'FK_jobId');
	}

	//function for the relation with the Category model
	public function category() {
		return $this->belongsToMany('Category', 'jobs_categories', 'FK_jobId', 'FK_categoryId');
	}

	//functin to store a new job in the database
	public function store() {
		//get all the checkboxes and put in a variable (array)
		$checkboxes = Input::get('grouped');
		//get all the categories and put it in a variable (array)
		$categories = Category::all();
		
		//create new job
		$job = new Job;

		//put the input data in the wright column
		$job->title = Input::get('title');
		$job->location = Input::get('location');
		$job->description = Input::get('description');
		$job->fixed = FALSE;
		$job->FK_userId = Auth::user()->PK_userId;

		//save the job
		$job->save();
		
		//loop true the checkboxes
		//checkbox = name of the checkbox, value = true / false
		foreach($checkboxes as $checkbox => $value) {
			//check if the checkbox is checked
			if($value) {
				//loop true the categories
				foreach($categories as $category) {
					//check if the checkbox name and categoryName maches
					if($checkbox == strtolower($category->categoryName)) {
						//if they match create a new reacord in the pivot table
						$jobcategorie = new JobCategorie;
						$jobcategorie->FK_categoryId = $category->PK_categoryId;
						$jobcategorie->job()->associate($job);

						//save the data in the pivot table
						$jobcategorie->save();
					}
				}
			}
		}

		//return the id off the job
		return $job->PK_jobId;
	}
}
