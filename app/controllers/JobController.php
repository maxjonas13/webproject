<?php
use Carbon\Carbon;
class JobController extends BaseController {

	//function to load the job view
	public function index() {
		return View::make('content/jobs');
	}

	//function to load an overview off all the jobs with pagination
	public function jobOverviewWithPagination() {
		$job = Job::where('fixed', '=', FALSE)->with('User', 'Category', 'Candidate')->orderBy('created_at', 'DESC')->paginate(5);
			
		return $job;
	}

	//function to filter the jobs on category with pagination
	public function filterCategorieWithPagination($cat) {
		$job = Job::whereHas('Category' , function($query) use($cat) {
			$query->where(strtolower('categoryName'), '=', strtolower($cat));
		})->with('User', 'Category')->where('fixed', '=', FALSE)->orderBy('created_at', 'DESC')->paginate(5);
		
		return $job;
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
		$job = Job::with('User', 'JobCategorie', 'Category', 'Comment', 'Candidate')->find($id);

		$candidate = User::whereHas('Candidate' , function($query) use($id) {
			$query->where('FK_jobId', '=' , $id);
			$query->where('canceled' , '=', false);
		})->with("profile")->get();
		
		return View::make('content/jobsDetails')->with('data', array('job'=>$job, 'candidate'=>$candidate));
	}

	//function to show the view with the form to edit a selected job
	public function edit($id) {
		if(Auth::check()) {
			//find the wright job
			$job = Job::with('User', 'Category')->find($id);

			//check if the authenticated user is the owner off the job
			if(Auth::user()->PK_userId == $job->user->PK_userId) {
				return View::make('content/jobsEdit')->with('data', $job);
			}
			else {
				//the authenticated user is not the owner off the job, redirect him back to the homepage
				return Redirect::to('/');
			}
		}
		else {
			//the user is not authenticated, redirect him back to the homepage
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
	public function closeOrOpen($id, $candidate) {
		//check if the user is loggedin
		if(Auth::check()) {
			//get the job
			$job = Job::find($id);
			//check if the user off the job matches the authenticated user
			if(Auth::user()->PK_userId == $job->FK_userId) {
				//call the fixed function in the model
				$job->closeOrOpen($id, $candidate);
			}
		}

		//redirect the user back to the detail page of the job
		return Redirect::to('/jobs/details/' . $id);
	}

}
