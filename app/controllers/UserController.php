<?php

class UserController extends BaseController {

	public function index() {
		return View::make('content.specialists');
	}

	public function getAllUsers() {
		$users = User::whereHas('Category' , function($query) {
			$query->where(strtolower('categoryName'), '!=', '');
		})->where('active', '=', TRUE)->with('Category', 'profile')->paginate(5);
	
		return $users;
	}

	public function filter($cat) {
		$users = User::whereHas('Category' , function($query) use($cat) {
			$query->where(strtolower('categoryName'), '=', strtolower($cat));
		})->with('Category', "profile")->paginate(5);
		
		return $users;
	}

}
