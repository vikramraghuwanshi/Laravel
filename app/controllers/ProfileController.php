<?php

class ProfileController extends BaseController {

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
	 /**
     * Instantiate a new UserController instance.
     */
    public function __construct() {
        $this->beforeFilter('auth', array('except' => array('index','loginView','doLogin','registerView','doRegister','askQuestion','doAskQuestion')));          
    }

	public function index(){	
		$html = '';	
		$favoritemap = with(new User)->get_favorite();
		//echo "<pre>"; print_r($favoritemap);die;
		$favorite=isset($favoritemap['user'][Auth::user()->userid])?$favoritemap['user'][Auth::user()->userid]:false;	
		$title = isset($favorite) ? 'Remove '.Auth::user()->handle.' from my favorites' : 'Add user '.Auth::user()->handle.' to my favorites';
		//print_r();die;
		$html .= with(new User)->qa_favorite_form("U",Auth::user()->userid,$favorite,$title);
		//$navigation = with(new User)->qa_user_sub_navigation(Auth::user()->handle, 'profile',true); //True for logged in user.
		$calculated_time = time()-strtotime(Auth::user()->created);
		$time_str = with(new User)->second_to_string($calculated_time);	
		$level = with(new User)->qa_user_level_string(Auth::user()->level);

		return View::make('profile.index')->with(array('html'=> $html,'time_str' => $time_str,'level' => $level));	
	}

	public function account(){
		$html = '';	
		return View::make('profile.account')->with(array('html'=> $html));
	}
}