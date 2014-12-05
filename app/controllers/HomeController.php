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
		$questions=new Question;
		$data=$questions->getQuestions();
		return View::make('front.index')->with('data', $data);
	}

	public function showUnanswerQuestion(){
		$questions=new Question;
		$data=$questions->getUnanswered();
		return View::make('front.index')->with('data', $data);
	}

	public function showTags(){
		$questions=new Question;
		$data=$questions->getTags();
		return View::make('front.tags')->with('data', $data);
	}

	public function showSingleQuestion($qa){
		$questions=new Question;
		$data=$questions->getSingleQuestion($qa);
		return View::make('front.single_question')->with('data', $data);
	}

	public function doAnswer(){
		$rules = array(
			'a_content'    => 'required|min:12', // make sure its required
		);
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			Session::flash('message', 'Email/Password can not be blank!');
			return Redirect::to('/question/'.Input::get('qa'))
				->withErrors($validator); // send back all errors to the login form
		}
	}

}