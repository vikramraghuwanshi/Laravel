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
	protected $questions;
	protected $answer;
	protected $comments;

	 public function __construct(){
	 	//Declaring objects of Question and Answer Model
	 	$this->questions=new Question;
		$this->answer=new Answer;
		$this->comments=new Comments;
	 }

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function index(){
		//Taking parameter to sort accordingly
		$params = App::make('router')->getCurrentRoute()->getParameters();

		//If there is anything for sorting
		if(isset($params['sort'])){
			$data=$this->questions->getSortedQuestions($params['sort']);
		}
		else{
			$data=$this->questions->getQuestions();
			$data[0]['head']="Recent questions and answers";
			//echo "<pre>";print_r($data);die;
		}
		return View::make('front.index')->with('data', $data);
	}

	public function showUnanswerQuestion(){
		//$questions=new Question;
		$data=$this->questions->getUnanswered();
		$data[0]['head']="Recent questions without answers";
		return View::make('front.index')->with('data', $data);
	}

	public function showTags(){
		//$questions=new Question;
		$data=$this->questions->getTags();
		return View::make('front.tags')->with('data', $data);
	}

	public function showSingleQuestion($qa){
		$data['answers']=$this->answer->getAnswer($qa);
		$data['question']=$this->questions->getSingleQuestion($qa);
		
		//Getting comments for each section
		foreach ($data['answers'] as $record) {
			$comments=$this->comments->getCommentsByParentId($record['postid']);
			$data['comments'][$record['postid']]=$comments;
		}
		//$data['comments']=;
		$view=View::make('front.single_question')->with('data', $data);
		return $view;
	}

	function askQuestion() {
		//Taking parameter if there is asking related question
		$params = App::make('router')->getCurrentRoute()->getParameters();
		$data = [];
		if(isset($params['follow'])){
			$data['follow']=$params['follow'];//parent post id
			$post=$this->questions->getPostById($data['follow']);
			$data['content']=$post['content'];
			$data['postid']=$post['postid'];
		}
		return View::make('user.ask')->with('data', $data);
	}

	function doAskQuestion(){
		$rules = array(
			'title'    => 'required|min:12', // make sure its required and min length of 12
		);
		
		// Run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('/ask')
				->withErrors($validator); // send back all errors to the login form
		}
		else{
			try{
				if (Auth::check())
				{
				   $userid = Auth::user()->userid;
				}
				else 
					$userid=NULL;
				
				if(Input::get('notify'))
					$email=Input::get('email');
				else
					$email=NULL;

				if(Input::get('parentid'))
					$parentid=Input::get('parentid');
				else
					$parentid=NULL;
				
				$postid = DB::table('posts')->insertGetId(
				    array('type' => 'Q',
				    	 'createip' => $_SERVER['REMOTE_ADDR'],
				    	 'lastviewip' =>$_SERVER['REMOTE_ADDR'],
		    	 		 'created' =>date('Y-m-d H:i:s'),
		    	 		 'title' => Input::get('title'),		    	 		
		    	 		 'content' => Input::get('content'),
		    	 		 'name' => Input::get('name'),
		    	 		 'tags' => Input::get('tags'),
		    	 		 'userid' => $userid,
		    	 		 'parentid' => $parentid,	    	 		
			    	 	 'notify' => $email)
				);

				DB::table('posts')
            		->where('postid', Input::get('qa'))
            		->increment('acount');
						
                return Redirect::to('/question/'.$postid);
			}
			catch(ParseException $error){

			}
		}
	}

}