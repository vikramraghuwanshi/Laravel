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

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('test', array('uses' => 'HomeController@index'));

Route::get('test/{qa}', array( 'uses' => 'HomeController@showSingleQuestion'));

Route::get('unanswered', array('uses' => 'HomeController@showUnanswerQuestion'));
Route::get('tags', array('uses' => 'HomeController@showTags'));

Route::get('user', array('uses' => 'UserController@index'));
Route::get('login', array('uses' => 'UserController@loginView'));
Route::get('logout', array('uses' => 'UserController@doLogout'));
Route::get('updates', array('uses' => 'ProfileController@index'));

Route::get('register', array('uses' => 'UserController@registerView'));
Route::get('ask', array('uses' => 'UserController@askQuestion'));
Route::post('doLogin', array('uses' => 'UserController@doLogin'));
Route::post('doRegister', array('uses' => 'UserController@doRegister'));
Route::post('doAskQuestion', array('uses' => 'UserController@doAskQuestion'));



