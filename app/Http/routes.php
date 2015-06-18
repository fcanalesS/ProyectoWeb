<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

Route::get('/', 'WelcomeController@index');

Route::get('login/{id}', 'LoginController@index');

Route::post('login/{id}', 'LoginController@postLogin');

Route::get('logout', 'LoginController@logout');

Route::group(['prefix' => 'admin', 'namespace' => 'Admini'], function() {
    Route::get('index', 'AdminController@index');
    Route::resource('campus', 'CampusController');
});