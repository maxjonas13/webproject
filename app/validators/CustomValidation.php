<?php
// app/validators/CustomValidation.php
class CustomValidation {

	//function to check if the given password is the same as the password in the database
 	public function passwordCheck($field, $value, $parameters){
		if(!Auth::validate(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
				return FALSE;
		}
		return TRUE;
	}
}