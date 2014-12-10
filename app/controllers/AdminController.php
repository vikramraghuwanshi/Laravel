<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Admin Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/	
	 /**
     * Instantiate a new UserController instance.
     */
    public function __construct() {
        $this->beforeFilter('auth', array('except' => array('viewProfile','wall','activity','questions','answers')));          
    }

    public function index(){
    	$data['html'] = "";
    	return View::make('admin.index')->with($data);
    }
}