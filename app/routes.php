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

Validator::extend('passwordCheck', 'CustomValidation@passwordCheck');