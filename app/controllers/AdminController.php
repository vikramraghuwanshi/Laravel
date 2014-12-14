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

    public function emails(){
    	$data['html'] = "";
    	return View::make('admin.emails')->with($data);
    }

    public function users(){
    	$data['html'] = "";
    	return View::make('admin.users')->with($data);
    }

    public function posting(){
    	$data['html'] = "";
    	return View::make('admin.posting')->with($data);
    }

    public function viewing(){
    	$data['html'] = "";
    	return View::make('admin.viewing')->with($data);
    }

    public function lists(){
    	$data['html'] = "";
    	return View::make('admin.lists')->with($data);
    }

    public function categories(){
    	$data['html'] = "";
    	return View::make('admin.categories')->with($data);
    }

    public function permissions(){
    	$data['html'] = "";
    	return View::make('admin.permissions')->with($data);
    }
   

    public function pages(){
    	$data['html'] = "";
    	return View::make('admin.pages')->with($data);
    }

    public function points(){
    	$data['html'] = "";
    	return View::make('admin.points')->with($data);
    }

    public function spam(){
    	$data['html'] = "";
    	return View::make('admin.spam')->with($data);
    }

    public function moderate(){
    	$data['html'] = "";
    	return View::make('admin.moderate')->with($data);
    }

    public function flagged(){
    	$data['html'] = "";
    	return View::make('admin.flagged')->with($data);
    }

    public function hidden(){
    	$data['html'] = "";
    	return View::make('admin.hidden')->with($data);
    }
}