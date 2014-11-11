<?php

class LoginController extends BaseController {

	//function to load the view with the login form
	public function index() {
		return View::make('include/login');
	}

	//function to check if the login data is correct.
	//when the data is correct the user will be logged in.
	public function check() {
		//check if input data is correct login data
		if ( Auth::attempt( array( 'email' => Input::get('email'), 'password' => Input::get('password') ), TRUE ) ) {
			//data is correct and user is logged in.

			//redirect the user to the homepage
			return Redirect::to('/');
		}
		else {
			//data is not correct

			//redirect the user back with an error messages
			return Redirect::back()->with('error_message', 'Foutief e-mail adres en/of wachtwoord. Probeer opnieuw. ');
		}
	}

	//function to log a user out
	public function logout() {
		//log the user out
		Auth::logout();

		//return the user to the homepage
		return Redirect::to('/');
	}

	public function wachtwoordVergeten() {
		return View::make('include.wachtwoordvergeten');
	}

	public function resetWachtwoord() {
		$validator = Validator::make(
			array(
				'email'	=> Input::get('email')
			),
			array(
				'email'	=> 'required|email|exists:users,email'
			)
		);

		$messages = $validator->messages();

		if($validator->fails()) {
			return Redirect::back()->withErrors($messages)->withInput();
		}
		else {
			$user = new User;
			$temporarypassword = $user->createTempPassword();

			//set the data to use in the email ready
			$data = array(
				'temppass' 	=> $temporarypassword,
			);
			
			//send the user an email with some more information
			Mail::send('emails.wachtwoordvergeten', $data , function($message) {
			    $message->to(Input::get('email'))->subject('Temporary password'); 
			});
		}
	}

}
