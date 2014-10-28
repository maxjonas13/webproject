<?php

class JobController extends BaseController {

	//function to show the view with all the jobs
	public function index() {
		$job = Job::where('fixed', '=', FALSE)->with('User', 'JobCategorie', 'Category')->get();
		
		return View::make('content/jobs')->with('data', $job);
	}

	//function to show the view with the form to create a new job
	public function create() {
		return View::make('content/jobsCreate');
	}

	//function to store the data of the new job
	public function store() {
		$validator = Validator::make(
			array(
				'title'			=> Input::get('title'),
				'location'		=> Input::get('location'),
				'description'	=> Input::get('description'),
				'grouped'		=> Input::get('grouped')
			),
			array(
				'title'			=>	'required|min:3|max:50',
				'location'		=>	'required|min:3|max:50',
				'description'	=>	'required',
				'grouped'		=>	'required|min:1'
			)
		);

		$messages = $validator->messages();

		if($validator->fails()) {
			return Redirect::back()->withErrors($messages)->withInput();
		}
		else {
			$job = new Job;
			$job->store();

			//return Redirect::to('/jobs/details/' . $jobid);
		}
	}

	//function to show the details view off a job by job id
	public function details($id) {
		//when comments are integrated add Comments to this one to
		$job = Job::with('User', 'JobCategorie', 'Category')->find($id);

		return View::make('content/jobsDetails')->with('data', $job);
	}

	//function to show the view with the form to edit a selected job
	public function edit($id) {
		if(Auth::check()) {
			$job = Job::with('User')->find($id);
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

	}

	

}
