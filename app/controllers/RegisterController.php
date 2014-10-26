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
				'name'				=> Input::get('name'),
				'fistname'			=> Input::get('firstname'),
				'email'				=> Input::get('email'),
				'password'			=> Input::get('password')
			);

			//array with the rules for validation
			array(
				'name'				=> 'required|min:3|max:30',
				'firstname'			=> 'required|min:3|max:30',
				'email'				=> 'required|email|unique:users',
				'password'			=> ''
			);
		);
	}

}
