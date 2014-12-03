<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index(){
		//Navigation::test();
		//echo Navigation::nav("footer");
		return View::make('front.index');
		//die("vik");
		//echo Helpers::doMessage();
		//$helper = new Helpers();
		//echo test();
		//die("a");
	}

}