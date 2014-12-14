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


/* Question Routing .......*/
Route::get('question', array('uses' => 'HomeController@index'));
Route::get('question/{qa}', array( 'uses' => 'HomeController@showSingleQuestion'));
Route::get('unanswered', array('uses' => 'HomeController@showUnanswerQuestion'));
Route::get('tags', array('uses' => 'HomeController@showTags'));
Route::get('question/sort/{sort}', array ('as' => 'sort' ,'uses' => 'HomeController@index'))->where('qa', '[a-z]+');
//Page for asking question
Route::get('ask', array('uses' => 'HomeController@askQuestion'));
//Route for asking related question
Route::get('ask/follow/{follow}', array('uses' => 'HomeController@askQuestion'));
//Action to perform ask question
Route::post('doAskQuestion', array('uses' => 'HomeController@doAskQuestion'));
Route::post('search', array('uses' => 'HomeController@doSearch'));
Route::get('tag/{tag}', array('uses' => 'HomeController@doTag'));


//Answers Route
Route::post('doAnswer', array('uses' => 'AnswerController@doAnswer'));
Route::post('doComments', array('uses' => 'AnswerController@doComments'));


/* Profile Routing .......*/
Route::get('profile', array('uses' => 'ProfileController@index'));
Route::get('profile/{handle}', array('uses' => 'ProfileController@viewProfile'));
Route::get('wall/{handle}', array('uses' => 'ProfileController@viewWall'));
Route::get('activity/{handle}', array('uses' => 'ProfileController@viewActivity'));
Route::get('questions/{handle}', array('uses' => 'ProfileController@viewQuestions'));
Route::get('answers/{handle}', array('uses' => 'ProfileController@viewAnswers'));
Route::post('doAccount', array('uses' => 'ProfileController@doAccount'));
Route::post('doChangePassword', array('uses' => 'ProfileController@doChangePassword'));
Route::get('account', array('uses' => 'ProfileController@account'));
Route::post('account', array('uses' => 'ProfileController@account'));
Route::get('favorites', array('uses' => 'ProfileController@favorites'));
Route::get('wall', array('uses' => 'ProfileController@wall'));
Route::get('activity', array('uses' => 'ProfileController@activity'));
Route::get('questions', array('uses' => 'ProfileController@questions'));
Route::get('answers', array('uses' => 'ProfileController@answers'));
Route::get('updates', array('uses' => 'ProfileController@viewUpdates'));


/* User Routing .......*/
Route::get('user', array('uses' => 'UserController@index'));
Route::get('login', array('uses' => 'UserController@loginView'));
Route::get('logout', array('uses' => 'UserController@doLogout'));
Route::get('register', array('uses' => 'UserController@registerView'));
Route::post('doLogin', array('uses' => 'UserController@doLogin'));
Route::post('doRegister', array('uses' => 'UserController@doRegister'));


/* Admin Routing .......*/
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

/* Votes Routing .......*/
Route::post('votes', array('uses' => 'VotesController@index'));
Route::post('button', array('uses' => 'ButtonController@index'));


