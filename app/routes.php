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

Route::get('/login', 'LoginController@index');
Route::post('/login/check', 'LoginController@check');
Route::get('/login/confirmation', 'LoginController@confirmation');
Route::get('/logout', 'LoginController@logout');