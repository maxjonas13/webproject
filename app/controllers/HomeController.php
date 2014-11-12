<?php

class HomeController extends BaseController {

	//function to load the view off the homepage
	public function index()
	{
		return View::make('content/index');
	}

}
