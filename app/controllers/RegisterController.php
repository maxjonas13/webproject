<?php

class RegisterController extends BaseController {

	//function to load the view with the register form
	public function index() {
		return View::make('register.index');
	}

	//function to validate form data and speak to the Register model
	public function save() {
		//nieuwe validator aanmaken
		$validator = new Validator::make(
			//array with the input fields
			array(
				''
			);

			//array with the rules for validation
			array(

			);
		);
	}

}
