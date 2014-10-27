<?php

class ProfileController extends BaseController {

	//function to show the view with the details off the user
	public function index($id) {
		//get all the info off the user with the given id
		//all the info = users table, profiles table, credits table
		$user = User::find($id)->load('Profile', 'Credit');

		//return the view to show the users profile
		return View::make('content/profile')->with('data', $user);
	}

	//function to show the view with the form to edit a profile
	public function edit($id) {
		//check if the user is authenticated
		if(Auth::check()) {
			//check if the user is authenticated and trys to edit his own profile
			if(Auth::user()->PK_userId == $id) {
				//user is logged in and can edit is own profile

				//get alle the info off the user with the given id
				$user = User::find($id)->load('Profile', 'Credit');

				//return the view to edit the profile
				return View::make('content/profileEdit')->with('data', $user);
			}
			else {
				//user is logged in but is trying to edit another profile than his profile

				//redirect the user back to the homepage
				return Redirect::to('/');
			}
		}
		else {
			//user is logged out and does not has the permission to edit a profile

			//redirect the user back to the homepage
			return Redirect::to('/');
		}
	}

	//function to update a user profile
	public function update() {
		//check if the user is authenticated
		if(Auth::check()) {
			//the user is authenticated. Profile update can continue

			//retrieve the existing email adres from the db and store it in a variable
			$useremail = User::find(Auth::user()->PK_userId)->email;
			
			//create validator
			$validator = Validator::make(
				//array with the fields and their content
				array(
					'name'				=>	Input::get('name'),
					//check if the email adres in the db is diffrent from the email adres in the input field
					if($useremail != Input::get('email')) {
						//email adres in the form is diffrent from the email adress in the db so include the field in the validator
						'email'				=>	Input::get('email'),
					}
					'password'			=>	Input::get('password'),
					'newpassword'		=>	Input::get('newpassword'),
					'twitter'			=>	Input::get('twitter'),
					'github'			=>	Input::get('github'),
					'linkedin'			=>	Input::get('linkedin'),
					'pintrest'			=>	Input::get('pintrest'),
					'googleplus'		=>	Input::get('googleplus'),
					'instagram'			=>	Input::get('instagram'),
					'myspace'			=>	Input::get('myspace'),
					'website'			=>	Input::get('website'),
					'bio'				=>	Input::get('bio'),
					'profilepicture'	=>	Input::get('profilepicture')
				),
				//array with the validation rules for the determined fields
				array(
					'name'				=>	'required|min:3|max:60',
					//check if the email adres in the db is diffrent from the email adres in the input field
					if($useremail != Input::get('email')) {
						//email adres in the form is diffrent from the email adres in the db so add a validation rule for it
						'email'				=>	'required|email|unique:users',
					}
					'password'			=>	'exists:users,password, PK_userId,' . Auth::user()->PK_userId,
					'newpassword'		=>	'required_with:password|min:3',
					'twitter'			=>	'min:3',
					'github'			=>	'min:3',
					'linkedin'			=>	'min:3',
					'pintrest'			=>	'min:3',
					'googleplus'		=>	'min:3',
					'instagram'			=>	'min:3',
					'myspace'			=>	'min:3',
					'website'			=>	'min:3',
					'bio'				=>	'min:3|max:2000',
					'profilepicture'	=>	'image|max:5000'
				)
			);
			
			$messages = $validator->messages();

			if($validator->fails()) {
				return Redirect::back()->withErrors($messages)->withInput();
			}
			else {
				return "good job!";
			}

		}
		else {
			//the user is not authenticated and will be redirected to the homepage
			return Redirect::to('/');
		}
	}

}
