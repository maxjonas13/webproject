<?php

class LoginController extends BaseController {

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

	//function to reset the password
	public function resetWachtwoord() {
		//check if the give email exists in the database
		$validator = Validator::make(
			array(
				'email'	=> Input::get('email')
			),
			array(
				'email'	=> 'required|email|exists:users,email'
			)
		);

		//store the validator messages in the variable messages
		$messages = $validator->messages();

		//check if the validator fails
		if($validator->fails()) {
			return Redirect::back()->withErrors($messages)->withInput();
		}
		else {
			//call the creteTempPassword function from the model and store the temp pass in a variable
			$user = new User;
			$temporarypassword = $user->createTempPassword();

			//set the data to use in the email ready
			$data = array(
				'temppass' 	=> $temporarypassword,
			);
			
			//send the user an email with his temporary password
			Mail::send('emails.wachtwoordvergeten', $data , function($message) {
			    $message->to(Input::get('email'))->subject('Temporary password'); 
			});

			return Redirect::to('/');
		}
	}

	//function for the facebook login
	public function facebookLogin() {
		//make a new instance off the Facebook class and configure it with the config file
		$facebook = new Facebook(Config::get('facebook'));
		//put some parameters ready
	    $params = array(
	        'redirect_uri' => url('/login/fb/callback'),
	        'scope' => 'email',
	    );
	    return Redirect::to($facebook->getLoginUrl($params));
	}

	//callback function for the facebook login
	public function facebookLoginCallback() {
		$code = Input::get('code');
	    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

		    $facebook = new Facebook(Config::get('facebook'));
		    $uid = $facebook->getUser();

		    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

		    $me = $facebook->api('/me');

		    $profile = Profile::whereUid($uid)->first();
		    if (empty($profile)) {
		    	//its the first time a user logs in with this account

		    	//create a new user
		        $user = new User;
		        $user->name = $me['first_name'].' '.$me['last_name'];
		        $user->email = $me['email'];
		        $user->FK_roleId = 2;
		        $user->active = TRUE;

		        $user->save();

		        //create a new profile
		        $profile = new Profile();
		        $profile->uid = $uid;
		        $profile->username = $me['first_name'] . ' ' . $me['last_name'];
		        $profile->profilePicture = 'https://graph.facebook.com/'.$uid.'/picture?type=large';
		        $profile = $user->profile()->save($profile);

		        //create a new credit row with the credits for the new user
		        $credit = new Credit;
		        $credit->credits = 3;
		        $credit->FK_userId = $user->PK_userId;
		        $credit->save();
		    }

		    $profile->access_token = $facebook->getAccessToken();
		    $profile->save();

		    $user = $profile->user;

		    //log the user in
		    Auth::login($user);

		    return Redirect::to('/');
		}

}
