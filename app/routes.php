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

Route::get('question', array('uses' => 'HomeController@index'));

Route::get('question/{qa}', array( 'uses' => 'HomeController@showSingleQuestion'));

Route::get('unanswered', array('uses' => 'HomeController@showUnanswerQuestion'));
Route::get('tags', array('uses' => 'HomeController@showTags'));




Route::get('user', array('uses' => 'UserController@index'));
Route::get('login', array('uses' => 'UserController@loginView'));
Route::get('logout', array('uses' => 'UserController@doLogout'));

Route::get('profile', array('uses' => 'ProfileController@index'));

Route::get('profile/{handle}', array('uses' => 'ProfileController@viewProfile'));
Route::get('wall/{handle}', array('uses' => 'ProfileController@viewWall'));
Route::get('activity/{handle}', array('uses' => 'ProfileController@viewActivity'));
Route::get('questions/{handle}', array('uses' => 'ProfileController@viewQuestions'));
Route::get('answers/{handle}', array('uses' => 'ProfileController@viewAnswers'));

Route::post('doAccount', array('uses' => 'ProfileController@doAccount'));
Route::post('doChangePassword', array('uses' => 'ProfileController@doChangePassword'));


Route::get('account', array('uses' => 'ProfileController@account'));
Route::get('favorites', array('uses' => 'ProfileController@favorites'));
Route::get('wall', array('uses' => 'ProfileController@wall'));
Route::get('activity', array('uses' => 'ProfileController@activity'));
Route::get('questions', array('uses' => 'ProfileController@questions'));
Route::get('answers', array('uses' => 'ProfileController@answers'));

Route::get('register', array('uses' => 'UserController@registerView'));
Route::get('ask', array('uses' => 'UserController@askQuestion'));
Route::post('doLogin', array('uses' => 'UserController@doLogin'));
Route::post('doRegister', array('uses' => 'UserController@doRegister'));
Route::post('doAskQuestion', array('uses' => 'UserController@doAskQuestion'));

/* Admin routing .......*/
Route::get('admin/general', array('uses' => 'AdminController@index'));
Route::get('admin/emails', array('uses' => 'AdminController@emails'));
Route::get('admin/users', array('uses' => 'AdminController@users'));
Route::get('admin/posting', array('uses' => 'AdminController@posting'));
Route::get('admin/viewing', array('uses' => 'AdminController@viewing'));
Route::get('admin/lists', array('uses' => 'AdminController@lists'));
Route::get('admin/categories', array('uses' => 'AdminController@categories'));
Route::get('admin/permissions', array('uses' => 'AdminController@permissions'));
Route::get('admin/pages', array('uses' => 'AdminController@pages'));
Route::get('admin/points', array('uses' => 'AdminController@points'));
Route::get('admin/spam', array('uses' => 'AdminController@spam'));
Route::get('admin/moderate', array('uses' => 'AdminController@moderate'));
Route::get('admin/flagged', array('uses' => 'AdminController@flagged'));
Route::get('admin/hidden', array('uses' => 'AdminController@hidden'));



