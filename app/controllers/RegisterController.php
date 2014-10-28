<?php

class RegisterController extends BaseController {

	//function to load the view with the register form
	public function index() {
		return View::make('content/register');
	}

	//function to validate form data and speak to the Register model
	public function save() {
		//create new validator
		$validator = Validator::make(
			//array with the input fields
			array(
				'name'				=> Input::get('name'),
				'firstname'			=> Input::get('firstname'),
				'email'				=> Input::get('email'),
				'password'			=> Input::get('password')
			),

			//array with the rules for validation
			array(
				'name'				=> 'required|min:3|max:30',
				'firstname'			=> 'required|min:3|max:30',
				'email'				=> 'required|email|unique:users',
				'password'			=> 'required|min:3'
			)
		);

		//store messages from the validator in the messages variable
		$messages = $validator->messages();

		//check if the validation fails
		if( $validator->fails() ) {
			//validation faild

			//return back with errors and input
			return Redirect::back()->with('register', TRUE)->withErrors($messages)->withInput();
		}
		else {
			//validation passed

			//create new User
			$user = new User;
			//call to model function to store the register data
			$user->storeRegistrationData();

			//set the data to use in the email ready
			$data = array(
				'name' 	=> Input::get('firstname') . ' ' . Input::get('name'),
				'email' => Input::get('email')
			);
			
			//send the user an email with some more information
			Mail::send('emails.registration', $data , function($message) {
			    $message->to(Input::get('email'), Input::get('firstname') . ' ' . Input::get('name'))->subject('Welcome to BeeHive'); 
			});

			return Redirect::to('/register/confirmation')->with('stored', TRUE);
		}
	}

	//function to load the confirmation view.
	//NEEDS TO BE CREATED, ONLY DISPLAYS MESSAGES FOR THE MOMENT
	public function confirmation() {
		return "You're account has been created. Good luck with it normaly you could use the variable stored in the view.";
	}

}
