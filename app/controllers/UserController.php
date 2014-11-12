<?php

class UserController extends BaseController {

	//function to load the view for the users
	public function index() {
		return View::make('content.specialists');
	}

	//function to get all the users orderd by name
	public function getAllUsers() {
		$users = User::whereHas('Category' , function($query) {
			$query->where(strtolower('categoryName'), '!=', '');
		})->where('active', '=', TRUE)->with('Category', 'profile')->orderBy('name', 'ASC')->paginate(5);
	
		return $users;
	}

	//function to get all the users of a selected category
	public function filter($cat) {
		$users = User::whereHas('Category' , function($query) use($cat) {
			$query->where(strtolower('categoryName'), '=', strtolower($cat));
		})->with('Category', "profile")->orderBy('name', 'ASC')->paginate(5);
		
		return $users;
	}

}
