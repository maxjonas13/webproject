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

	public function user() {
		return $this->belongsTo('User', 'FK_userId');
	}

	public function jobcategorie() {
		return $this->hasMany('JobCategorie', 'FK_jobId');
	}

	public function category() {
		return $this->belongsToMany('Category', 'jobs_categories', 'FK_jobId', 'FK_categoryId');
	}

	public function store() {
		$checkboxes = Input::get('grouped');
		$categories = Category::all();
		
		$job = new Job;

		$job->title = Input::get('title');
		$job->location = Input::get('location');
		$job->description = Input::get('description');
		$job->fixed = FALSE;
		$job->FK_userId = Auth::user()->PK_userId;

		$job->save();
		
		foreach($checkboxes as $checkbox => $value) {
			if($value) {
				foreach($categories as $category) {
					if($checkbox == strtolower($category->categoryName)) {
						$jobcategorie = new JobCategorie;
						$jobcategorie->FK_categoryId = $category->PK_categoryId;
						$jobcategorie->job()->associate($job);

						$jobcategorie->save();
					}
				}
			}
		}
	}
}
