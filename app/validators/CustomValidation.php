<?php
// app/validators/customValidation.php
class CustomValidation {
 	public function passwordCheck($field, $value, $parameters){
		if(!Auth::validate(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
				return FALSE;
		}
		return true;
	}
}