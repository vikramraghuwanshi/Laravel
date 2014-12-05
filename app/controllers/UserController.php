<?php

class UserController extends BaseController {

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
//echo "<pre>"; print_r(Auth::user()->email);die;
		/*if(Auth::check()){
						echo  Auth::user()->email;die;
					}
					die("v");*/
		$html = '';
		$users = DB::table('users')->join('userpoints', 'users.userid', '=', 'userpoints.userid')
		->select('users.userid', 'users.handle', 'userpoints.points','users.flags','users.email','users.avatarblobid','users.avatarwidth','avatarheight')
		->orderBy('userpoints.points', 'desc')->get();

		// Check for favourite...
		//DB::table('userfavorites')->leftJoin('words',function($leftJoin){ $join->on('userfavorites.entitytype','=','T')->where('words.wordid', '=', 'userfavorites.entityid')})->leftJoin('categories', function($leftJoin){ $join->on('userfavorites.entitytype','=','T')->where('entitytype', '=','C')})->where('userid' , '=' , Auth::user()->userid)->where('entitytype','!=','Q')->select('entitytype', 'IF (entitytype=U, entityid, NULL)', 'categories.backpath','words.word')->get();	
		//$favourite = DB::table('userfavorites')->leftJoin('words',function($leftJoin){ $leftJoin->on('words.wordid', '=', 'userfavorites.entityid','and','userfavorites.entitytype=T');})->leftJoin('categories', function($leftJoin){ $leftJoin->on('userfavorites.entitytype', '=','C');})->select('entitytype', 'userfavorites.entityid', 'categories.backpath','words.word')->where('userid' , '=' , 10)->where('entitytype','!=','Q')->get();	
		//echo "<pre>"; print_r($favourite);die;
		foreach ($users as $key => $user) {
			$html .= '<tr>';
			$html .= '<td class="qa-top-users-label">';
			$html .= '<a class="qa-user-link" href="profile">'.$user->handle.'</a>';
			$html .= '</td><td class="qa-top-users-score">'.$user->points.'</td>';
			$html .= '</tr>';
		}		
		return View::make('user.index')->with('html', $html);	
	}

	function loginView(){
		$html = '';		
		$qa_content = app('qa_content');
		$label = (isset($qa_content['allow_login_email_only']) && !empty($qa_content['allow_login_email_only']))?"Email:":"Email or Username:";
		return View::make('user.login')->with('label', $label);
	}

	function doLogin() {
		//die("doLogin");
		$rules = array(
			'emailhandle'    => 'required', // make sure its required
			'password'    => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
                        Session::flash('message', 'Email/Password can not be blank!');
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		}
		else {
			try {
				//echo Input::get('password');die;
				$user = array(
						  'username' => Input::get('emailhandle'),
						  'password' => Input::get('password')
						);
				if (Auth::attempt($user)) {
					//Session::put('user', $user);
					Auth::login(Auth::user(), true);
					return Redirect::to('user');
                	//echo 'SUCCESS!';die("gg");
                }
                //die("vv");
			}
			catch (ParseException $error) {
	            // The login failed. Check error to see why.
	            //echo "Error: " . $error->getCode() . " " . $error->getMessage();
	            Session::flash('message', 'Invalid Login Information!');
	            return Redirect::to('login');
            }
		}
	}

	function registerView(){
		$html = '';		
		return View::make('user.register')->with('html', $html);
	}

	function doRegister() { //echo "<pre>"; print_r($_SERVER);die;
		$rules = array(
			'handle'    => 'required|unique:users', // make sure its required
			'password'    => 'required|alphaNum|min:3' ,// password can only be alphanumeric and has to be greater than 3 characters
			'email'    => 'required|unique:users',
		);
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
                        Session::flash('message', 'Email/Password can not be blank!');
			return Redirect::to('register')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		}
		else {
			try {			
				
				$qa_content = app('qa_content');				
				$options = $qa_content['bonus_points'];
				$point_calculations = array(
								'qposts' => array(
									'multiple' => $options['points_multiple']*$options['points_post_q'],
									'formula' => "COUNT(*) AS qposts FROM ^posts AS userid_src WHERE userid~ AND type='Q'",
								),
								
								'aposts' => array(
									'multiple' => $options['points_multiple']*$options['points_post_a'],
									'formula' => "COUNT(*) AS aposts FROM ^posts AS userid_src WHERE userid~ AND type='A'",
								),
								
								'cposts' => array(
									'multiple' => 0,
									'formula' => "COUNT(*) AS cposts FROM ^posts AS userid_src WHERE userid~ AND type='C'",
								),
								
								'aselects' => array(
									'multiple' => $options['points_multiple']*$options['points_select_a'],
									'formula' => "COUNT(*) AS aselects FROM ^posts AS userid_src WHERE userid~ AND type='Q' AND selchildid IS NOT NULL",
								),
								
								'aselecteds' => array(
									'multiple' => $options['points_multiple']*$options['points_a_selected'],
									'formula' => "COUNT(*) AS aselecteds FROM ^posts AS userid_src JOIN ^posts AS questions ON questions.selchildid=userid_src.postid WHERE userid_src.userid~ AND userid_src.type='A' AND NOT (questions.userid<=>userid_src.userid)",
								),
								
								'qupvotes' => array(
									'multiple' => $options['points_multiple']*$options['points_vote_up_q'],
									'formula' => "COUNT(*) AS qupvotes FROM ^uservotes AS userid_src JOIN ^posts ON userid_src.postid=^posts.postid WHERE userid_src.userid~ AND LEFT(^posts.type, 1)='Q' AND userid_src.vote>0",
								),
								
								'qdownvotes' => array(
									'multiple' => $options['points_multiple']*$options['points_vote_down_q'],
									'formula' => "COUNT(*) AS qdownvotes FROM ^uservotes AS userid_src JOIN ^posts ON userid_src.postid=^posts.postid WHERE userid_src.userid~ AND LEFT(^posts.type, 1)='Q' AND userid_src.vote<0",
								),
								
								'aupvotes' => array(
									'multiple' => $options['points_multiple']*$options['points_vote_up_a'],
									'formula' => "COUNT(*) AS aupvotes FROM ^uservotes AS userid_src JOIN ^posts ON userid_src.postid=^posts.postid WHERE userid_src.userid~ AND LEFT(^posts.type, 1)='A' AND userid_src.vote>0",
								),
								
								'adownvotes' => array(
									'multiple' => $options['points_multiple']*$options['points_vote_down_a'],
									'formula' => "COUNT(*) AS adownvotes FROM ^uservotes AS userid_src JOIN ^posts ON userid_src.postid=^posts.postid WHERE userid_src.userid~ AND LEFT(^posts.type, 1)='A' AND userid_src.vote<0",
								),
								
								'qvoteds' => array(
									'multiple' => $options['points_multiple'],
									'formula' => "COALESCE(SUM(".
										"LEAST(".((int)$options['points_per_q_voted_up'])."*upvotes,".((int)$options['points_q_voted_max_gain']).")".
										"-".
										"LEAST(".((int)$options['points_per_q_voted_down'])."*downvotes,".((int)$options['points_q_voted_max_loss']).")".
										"), 0) AS qvoteds FROM ^posts AS userid_src WHERE LEFT(type, 1)='Q' AND userid~",
								),
								
								'avoteds' => array(
									'multiple' => $options['points_multiple'],
									'formula' => "COALESCE(SUM(".
										"LEAST(".((int)$options['points_per_a_voted_up'])."*upvotes,".((int)$options['points_a_voted_max_gain']).")".
										"-".
										"LEAST(".((int)$options['points_per_a_voted_down'])."*downvotes,".((int)$options['points_a_voted_max_loss']).")".
										"), 0) AS avoteds FROM ^posts AS userid_src WHERE LEFT(type, 1)='A' AND userid~",
								),
								
								'upvoteds' => array(
									'multiple' => 0,
									'formula' => "COALESCE(SUM(upvotes), 0) AS upvoteds FROM ^posts AS userid_src WHERE userid~",
								),

								'downvoteds' => array(
									'multiple' => 0,
									'formula' => "COALESCE(SUM(downvotes), 0) AS downvoteds FROM ^posts AS userid_src WHERE userid~",
								),
							);		
				

				$userId = DB::table('users')->insertGetId(
				    array('email' => Input::get('email'),
				    	 'passcheck' => Hash::make(Input::get('password')),
		    	 		 'username' => Input::get('handle'),
		    	 		 'password' => Hash::make(Input::get('password')),
		    	 		 'handle' => Input::get('handle'),
		    	 		 'created' =>date('Y-m-d H:i:s'),		    	 		
		    	 		 'level' => 0,
		    	 		 'loggedin' => date('Y-m-d H:i:s'),
		    	 		 'loginip' => $_SERVER['REMOTE_ADDR'],		    	 		
			    	 	 'createip' => $_SERVER['REMOTE_ADDR'])
				);
				DB::table('userpoints')->insertGetId(
				    array('userid' => $userId,
				    	 'points' => $options['points_base'],
		    	 		)
				);			
                return Redirect::to('register');
			}
			catch (ParseException $error) {
	            // The login failed. Check error to see why.
	            //echo "Error: " . $error->getCode() . " " . $error->getMessage();
	            Session::flash('message', 'Invalid User Information!');
	            return Redirect::to('register');
            }
		}
	}

	function doLogout() {
		Auth::logout();
		return Redirect::to('login');
	}

	function askQuestion() {
		$html = '';		
		return View::make('user.ask')->with('html', $html);
	}

	function doAskQuestion(){
		$rules = array(
			'title'    => 'required', // make sure its required			
		);
		$messages = array(
		'required' => 'Please provide more information - at least 12 characters');
		//$message = array('title'=> 'Please provide more information - at least 12 characters');
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules,$messages);
		if ($validator->fails()) {
        	Session::flash('message', 'Email/Password can not be blank!');
			return Redirect::to('ask')
				->withErrors($validator); 
		}
		else {
			try {
				//echo Input::get('password');die;
				//$user = Auth::attempt(array('handle'=>Input::get('emailhandle'), 'password'=>Input::get('password')));
				Session::put('user', $user);
				die("Logged In");
                //return Redirect::to('myaccount');
			}
			catch (ParseException $error) {
	            // The login failed. Check error to see why.
	            //echo "Error: " . $error->getCode() . " " . $error->getMessage();
	            Session::flash('message', 'Invalid User Information!');
	            return Redirect::to('ask');
            }
		}
	}

}