<?php

class HomeController extends BaseController {

	public function index()
	{
		$job = Job::where('fixed', '=', FALSE)->with('User', 'JobCategorie', 'Category')->get();
		
		return View::make('content/index')->with('data', $job);
	}

}
