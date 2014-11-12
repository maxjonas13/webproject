<?php

class SearchController extends BaseController {

	//function to get the search results for the autocompletion in the searchbar
	public function inteligence($searchstring) {
		//array to store all the results
		$results = array();

		//search the users table on name
		$users = User::whereRaw('name LIKE ?', ["%$searchstring%"])->with('Profile')->get();

		//search the Job table on title and location, and on category name
		$jobs = Job::whereRaw('title LIKE ? OR location LIKE ?', array("%$searchstring%", "%$searchstring%") )->orWhereHas('Category', function($query) use($searchstring) {
			$query->whereRaw('categoryName LIKE ?', ["%$searchstring%"]);
		})->with('Category', 'User')->get();
		
		//store the search results of $users and $jobs in the array results
		array_push($results, $users, $jobs);

		//return all the results
		return $results; 
	}

	//function to get the search results and their view
	public function search() {
		//store the search words in a variable
		$searchstring = Input::get('search-input');

		//if there are no search words, redirect the user back to the homepage
		if($searchstring == "") {
			return Redirect::to('/');
		}

		//search the users table on name
		$users = User::whereRaw('name LIKE ?', ["%$searchstring%"])->with('Profile')->get();

		//search the Job table on title and location, and on category name
		$jobs = Job::whereRaw('title LIKE ? OR location LIKE ?', array("%$searchstring%", "%$searchstring%") )->orWhereHas('Category', function($query) use($searchstring) {
			$query->whereRaw('categoryName LIKE ?', ["%$searchstring%"]);
		})->with('Category', 'User')->get();

		//return the view with the search results
		return View::make('content.searchResults')->with(array('jobs' => $jobs, 'users' => $users)); 
	}

}
