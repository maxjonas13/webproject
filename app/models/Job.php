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

	//function for the relation with the comment model
	public function comment() {
		return $this->hasMany('Comment', 'FK_jobId');
	}

	//function for the relation with the comment model
	public function candidate() {
		return $this->hasMany('Candidate', 'FK_jobId');
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
		
		$jobid = $job->PK_jobId;

		//loop true the checkboxes
		//checkbox = name of the checkbox, value = true / false
		foreach($checkboxes as $checkbox => $value) {
			var_dump($checkboxes);
			//check if the checkbox is checked
			if($value == "") {
				//loop true the categories
				foreach($categories as $category) {
					//check if the checkbox name and categoryName maches
					if($checkbox == strtolower($category->categoryName)) {
						//if they match create a new reacord in the pivot table
						$jobcategorie = new JobCategorie;
						$jobcategorie->FK_categoryId = $category->PK_categoryId;
						
						$jobcategorie->FK_jobId = $jobid;

						//save the data in the pivot table
						$jobcategorie->save();
					}
				}
			}
		}

		//retrieve credits from the user who created the job
		$credits = Credit::where('FK_userId', '=', Auth::user()->PK_userId)->first();
		$credits->credits--;

		$credits->save();

		//return the id off the job
		return $jobid;
	}

	public function updateJob() {
		//get all the checkboxes and put in a variable (array)
		$checkboxes = Input::get('grouped');

		//get all the categories and put it in a variable (array)
		$categories = Category::all();

		//get the job and his related tables
		$job = Job::with('User', 'Category', 'JobCategorie')->find(Input::get('id'));

		//update the job data
		$job->title = Input::get('title');
		$job->location = Input::get('location');
		$job->description = Input::get('description');
		
		//save the job data in to the db
		$job->save();

		//get all the categories off the job
		$jobCategorie = JobCategorie::where('FK_jobId', '=', $job->PK_jobId)->get();

		//loop true alle the categories off the job
		foreach($jobCategorie as $row) {
			//get the id out off the pivot table
			$id = $row->PK_jobs_categoryId;
			//delete the categorie out of the pivot table
			JobCategorie::where('PK_jobs_categoryId', '=', $id)->delete();
		}

		// loop true the checkboxes
		// checkbox = name of the checkbox, value = true / false
		foreach($checkboxes as $checkbox => $value) {
			//check if the value of the checkbox is true or an empty string (true eighter).
			if($value || $value == '') {
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

		//return the id of the job
		return $job->PK_jobId;
	}

	public function closeOrOpen($id) {
		//find the job
		$job = Job::find($id);

		//check if job is fixed
		if(!$job->fixed) {
			//job is fixed and this function is called so open job again
			$job->fixed = TRUE;
		}

		//save the job
		$job->save();

		//GIVE THE SELECTED USER A CREDIT FOR HIS HELP
	}
}
