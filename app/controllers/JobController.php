<?php

class JobController extends BaseController {

	//function to show the view with all the jobs
	public function index() {
		//$job = Job::where('fixed', '=', FALSE)->with('User', 'JobCategorie', 'Category')->paginate(2);
		
		return View::make('content/jobs');//->with('data', $job);
	}

	//function to load an overview off all the jobs with pagination
	public function jobOverviewWithPagination() {
			$job = Job::where('fixed', '=', FALSE)->with('User', 'Category')->paginate(5);
	
			return $job;
	}

	//function to filter the jobs on category with pagination
	public function filterCategorieWithPagination($cat) {
			
		$job = Job::whereHas('Category' , function($query) use($cat) {
			$query->where(strtolower('categoryName'), '=', strtolower($cat));
		})->with('User', 'Category')->where('fixed', '=', FALSE)->paginate(5);
		
		return $job;
	}

	//function to show the view with the form to create a new job
	public function create() {
		return View::make('content/jobsCreate');
	}

	//function to store the data of the new job
	public function store() {
		//create a validator to validate the data
		$validator = Validator::make(
			//array with the field and there value
			array(
				'title'			=> Input::get('title'),
				'location'		=> Input::get('location'),
				'description'	=> Input::get('description'),
				'grouped'		=> Input::get('grouped')
			),
			//array with the rules for every field
			array(
				'title'			=>	'required|min:3|max:50',
				'location'		=>	'required|min:3|max:50',
				'description'	=>	'required',
				'grouped'		=>	'required|min:1'
			)
		);

		//put validator messages in a variable messages
		$messages = $validator->messages();

		//check if the validator passes
		if($validator->fails()) {
			//validator faild, return back with errors and input
			return Redirect::back()->withErrors($messages)->withInput();
		}
		else {
			//validator passed

			//create a new job
			$job = new Job;
			//call the store function in the model
			$jobid = $job->store();
			//redirect the user to the job that he created
			return Redirect::to('/jobs/details/' . $jobid);
		}
	}

	//function to show the details view off a job by job id
	public function details($id) {
		//when comments are integrated add Comments to this one to
		$job = Job::with('User', 'JobCategorie', 'Category', 'Comment', 'Candidate')->find($id);

		return View::make('content/jobsDetails')->with('data', $job);
	}

	//function to show the view with the form to edit a selected job
	public function edit($id) {
		if(Auth::check()) {
			$job = Job::with('User', 'Category')->find($id);

			if(Auth::user()->PK_userId == $job->user->PK_userId) {
				return View::make('content/jobsEdit')->with('data', $job);
			}
			else {
				return Redirect::to('/');
			}
		}
		else {
			return Redirect::to('/');
		}
	}

	//function to update the job data
	public function update() {
		$validator = Validator::make(
			//array with the field and there value
			array(
				'title'			=> Input::get('title'),
				'location'		=> Input::get('location'),
				'description'	=> Input::get('description'),
				'grouped'		=> Input::get('grouped')
			),
			//array with the rules for every field
			array(
				'title'			=>	'required|min:3|max:50',
				'location'		=>	'required|min:3|max:50',
				'description'	=>	'required',
				'grouped'		=>	'required|min:1'
			)
		);

		//put validator messages in a variable messages
		$messages = $validator->messages();

		//check if the validator passes
		if($validator->fails()) {
			//validator faild, return back with errors and input
			return Redirect::back()->withErrors($messages)->withInput();
		}
		else {
			//validator passed

			//get the job that needs to be updated
			$job = Job::with('User', 'Category')->find(Input::get('id'));
			//call the updateJob function in the model to store the data in the db.
			$job->updateJob();
			
			//redirect the user back to the job details page
			return Redirect::to('/jobs/details/' . Input::get('id'));
		}
	}

	//function to set a job to the fixed state
	public function closeOrOpen($id) {
		//check if the user is loggedin
		if(Auth::check()) {
			//get the job
			$job = Job::find($id);
			//check if the user off the job matches the authenticated user
			if(Auth::user()->PK_userId == $job->FK_userId) {
				//call the fixed function in the model
				$job->closeOrOpen($id);
			}
		}

		return Redirect::to('/jobs/details/' . $id);
	}
	

}
