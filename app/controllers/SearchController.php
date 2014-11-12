<?php

class SearchController extends BaseController {

	public function inteligence($searchstring) {
		$results = array();

		$users = User::whereRaw('name LIKE ?', ["%$searchstring%"])->with('Profile')->get();

		$jobs = Job::whereRaw('title LIKE ? OR location LIKE ?', array("%$searchstring%", "%$searchstring%") )->orWhereHas('Category', function($query) use($searchstring) {
			$query->whereRaw('categoryName LIKE ?', ["%$searchstring%"]);
		})->with('Category', 'User')->get();
		

		array_push($results, $users, $jobs);

		return $results; 
	}

	public function search() {
		$searchstring = Input::get('search-input');

		if($searchstring == "") {
			return Redirect::to('/');
		}

		$users = User::whereRaw('name LIKE ?', ["%$searchstring%"])->with('Profile')->get();

		$jobs = Job::whereRaw('title LIKE ? OR location LIKE ?', array("%$searchstring%", "%$searchstring%") )->orWhereHas('Category', function($query) use($searchstring) {
			$query->whereRaw('categoryName LIKE ?', ["%$searchstring%"]);
		})->with('Category', 'User')->get();

		return View::make('content.searchResults')->with(array('jobs' => $jobs, 'users' => $users)); 
	}

}
