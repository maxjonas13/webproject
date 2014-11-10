<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

//routes for registration
Route::get('/register', 'RegisterController@index');
Route::post('/register/save', 'RegisterController@save');
Route::get('/register/confirmation', 'RegisterController@confirmation');

//routes for login & logout
Route::get('/login', 'LoginController@index');
Route::post('/login/check', 'LoginController@check');
Route::get('/login/confirmation', 'LoginController@confirmation');
Route::get('/logout', 'LoginController@logout');

//routes for profile
Route::get('/profile/{id}', 'ProfileController@index');
Route::get('/profile/edit/{id}', 'ProfileController@edit');
Route::post('/profile/update', 'ProfileController@update');

//routes for jobs
Route::get('/jobs', 'JobController@index');
Route::get('/jobs/details/{id}', 'JobController@details');
Route::get('/jobs/edit/{id}', 'JobController@edit');
Route::post('/jobs/update', 'JobController@update');
Route::post('/jobs/delete', 'JobController@delete');
Route::get('/jobs/create', 'JobController@create');
Route::post('/jobs/store', 'JobController@store');
Route::get('/jobs/close/{id}', 'JobController@closeOrOpen');
Route::get('/jobs/open/{id}', 'JobController@closeOrOpen');
Route::get('/jobs/all', 'JobController@jobOverviewWithPagination');
Route::get('/jobs/filter/{id}', 'JobController@filterCategorieWithPagination');
Route::get('/jobs/solicitate/{id}', 'JobController@solicitate');
Route::get('/jobs/solicitate/cancel/{id}', 'JobController@cancelSolicitation');

//routes for comments
Route::post('/comments/store', 'CommentController@store');
Route::get('/comments/delete/{id}', 'CommentController@delete');

//routes for Candidates
Route::get('/candidates/apply/{id}', 'CandidateController@apply');

//routes for specialists
Route::get('/specialists', 'UserController@index');
Route::get('/specialists/all', 'UserController@getAllUsers');
Route::get('/specialists/filter/{id}', 'UserController@filter');

//routes for ratings
// Route::get('/ratings/all', 'RatingController@index');
Route::post('/rate', 'RatingController@rate');
Route::get('/ratings/{id}', 'RatingController@getRates');

//routes for search
Route::get('search/inteligence/{searchstring}', 'SearchController@inteligence');

//route for the about page
Route::get('/about', function() {
	return View::make('content/About');
});

Validator::extend('passwordCheck', 'CustomValidation@passwordCheck');