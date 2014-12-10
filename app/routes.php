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
/*
					Questions Route
*/
Route::get('question', array('uses' => 'HomeController@index'));
//Route for displaying paticular answer of any question
Route::get('question/{qa}', array( 'uses' => 'HomeController@showSingleQuestion'))->where('qa', '[0-9]+');
//Route for displaying sorting question
Route::get('question/sort/{sort}', array ('as' => 'sort' ,'uses' => 'HomeController@index'))->where('qa', '[a-z]+');
//Page for asking question
Route::get('ask', array('uses' => 'HomeController@askQuestion'));
//Action to perform ask question
Route::post('doAskQuestion', array('uses' => 'HomeController@doAskQuestion'));


//Answers Route
Route::post('doAnswer', array('uses' => 'AnswerController@doAnswer'));
Route::post('doComments', array('uses' => 'AnswerController@doComments'));

Route::get('unanswered', array('uses' => 'HomeController@showUnanswerQuestion'));
Route::get('tags', array('uses' => 'HomeController@showTags'));

Route::get('user', array('uses' => 'UserController@index'));
Route::get('login', array('uses' => 'UserController@loginView'));
Route::get('logout', array('uses' => 'UserController@doLogout'));
Route::get('profile', array('uses' => 'ProfileController@index'));

Route::get('register', array('uses' => 'UserController@registerView'));
Route::post('doLogin', array('uses' => 'UserController@doLogin'));
Route::post('doRegister', array('uses' => 'UserController@doRegister'));

Route::post('profile', array('uses' => 'ProfileController@index'));


