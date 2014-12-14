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
    	$general_option = with(new Option);
    	$db_options = Option::get_options();
    	$general_options = Option::qa_general_option_names();    	
    	foreach ($general_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$general_option->$tmp_option = $db_options[$option];
    	}   	
    	$data['general'] = $general_option;
    	return View::make('admin.index')->with($data);
    }

    public function doGeneral(){
    	try {	
    		$general_options = Option::qa_general_option_names();
    		if(Input::get('doresetoptions')) {
				Option::qa_reset_options($general_options); 
				Session::flash('success', 'Options reset');
    		}	
    		else {					
				foreach ($general_options as $key => $general_option) {
					Option::qa_db_set_option($general_option,Input::get('option_'.$general_option));
				}		
	        	Session::flash('success', 'Options Saved!');
	        }
        	return Redirect::to('admin/general');                            
		}
		catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/general');
        }
    }

    public function emails(){
    	$email_option = with(new Option);
    	$db_options = Option::get_options();
    	$email_options = Option::qa_email_option_names();    	
    	foreach ($email_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$email_option->$tmp_option = $db_options[$option];
    	}   	
    	$data['email'] = $email_option;
    	return View::make('admin.emails')->with($data);
    }

    public function doEmails(){
    	try {			
			$email_options = Option::qa_email_option_names();
			if(Input::get('doresetoptions')) {
				Option::qa_reset_options($email_options);
				Session::flash('success', 'Options reset');
    		}	
    		else {
				foreach ($email_options as $key => $email_option) {
					Option::qa_db_set_option($email_option,Input::get('option_'.$email_option));
				}
				Session::flash('success', 'Options Saved!');		
			}	        	
        	return Redirect::to('admin/emails');                            
		}
		catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/emails');
        }
    }

    public function users(){
    	$user_option = with(new Option);
    	$db_options = Option::get_options();
    	$user_options = Option::qa_user_option_names();
    	foreach ($user_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$user_option->$tmp_option = $db_options[$option];
    	}   	
    	$data['user'] = $user_option;
    	return View::make('admin.users')->with($data);
    }

    public function doUsers(){
    	try {
    		$user_options = Option::qa_user_option_names();
    		if(Input::get('doresetoptions')) {
    			Option::qa_reset_options($user_options);
				Session::flash('success', 'Options reset');
    		}
    		else {
    			foreach ($user_options as $key => $user_option) {
    				$option_value = Option::qa_convert_value_into_type($user_option,Input::get('option_'.$user_option));
					Option::qa_db_set_option($user_option,$option_value);
				}		
	        	Session::flash('success', 'Options Saved!');
    		}
    		return Redirect::to('admin/users');
    	}
    	catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/users');
        }
    }

    public function posting(){    	
		$posting_option = with(new Option);
    	$db_options = Option::get_options();
    	$posting_options = Option::qa_posting_option_names();
    	foreach ($posting_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$posting_option->$tmp_option = $db_options[$option];
    	}    	
    	$data['posting'] = $posting_option;
    	return View::make('admin.posting')->with($data);
    }

    public function doPosting(){
    	try {
    		$posting_options = Option::qa_posting_option_names();
    		if(Input::get('doresetoptions')) { 
    			Option::qa_reset_options($posting_options);
				Session::flash('success', 'Options reset');
    		}
    		else { 
    			foreach ($posting_options as $key => $posting_option) {
    				$option_value = Option::qa_convert_value_into_type($posting_option,Input::get('option_'.$posting_option));
					Option::qa_db_set_option($posting_option,$option_value);
				}		
	        	Session::flash('success', 'Options Saved!');
    		}
    		return Redirect::to('admin/posting');
    	}
    	catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/posting');
        }
    }

    public function viewing(){    	
    	$viewing_option = with(new Option);
    	$db_options = Option::get_options();
    	$viewing_options = Option::qa_viewing_option_names();
    	foreach ($viewing_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$viewing_option->$tmp_option = $db_options[$option];
    	}
    	$data['viewing'] = $viewing_option;
    	return View::make('admin.viewing')->with($data);
    }

    public function doViewing(){
    	try {
    		$viewing_options = Option::qa_viewing_option_names();
    		if(Input::get('doresetoptions')) {
    			Option::qa_reset_options($viewing_options);
				Session::flash('success', 'Options reset');				
    		}
    		else {
    			//Option::qa_convert_value_into_type();die;
    			foreach ($viewing_options as $key => $viewing_option) {
    				$option_value = Option::qa_convert_value_into_type($viewing_option,Input::get('option_'.$viewing_option));
					Option::qa_db_set_option($viewing_option,$option_value);
				}		
	        	Session::flash('success', 'Options Saved!');	        	
    		}
    		return Redirect::to('admin/viewing');
    	}
    	catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/viewing');
        }
    }

    public function lists(){
    	$list_option =  with(new Option);    	
    	$db_options = Option::get_options();
    	$list_options = Option::qa_lists_option_names();   	 	
    	foreach ($list_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$list_option->$tmp_option = $db_options[$option];
    	}      	 	
    	$data['list'] = $list_option;    	
    	return View::make('admin.lists')->with($data);
    }

    public function doList(){
    	try {
    		$list_options = Option::qa_lists_option_names();
	    	if(Input::get('doresetoptions')) {
	        	//echo "<pre>"; print_r($list_options);die;
	        	Option::qa_reset_options($list_options);
				Session::flash('success', 'Options reset');				
	        }
	        else {
	        	foreach ($list_options as $key => $list_option) {
					Option::qa_db_set_option($list_option,Input::get('option_'.$list_option));
				}		
	        	Session::flash('success', 'Options Saved!');	        	                          
			}
			return Redirect::to('admin/lists');
		}
		catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/lists');
        }        
    }

    public function categories(){
    	$data['html'] = "";
    	return View::make('admin.categories')->with($data);
    }

    public function permissions(){
    	$permission_option =  with(new Option); 
    	$permission_options = Option::qa_permissions_option_names();
    	//echo "<pre>"; print_r($permission_options);die;
    	$db_options = Option::get_options();
    	foreach ($permission_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$permission_option->$tmp_option = $db_options[$option];
    	} 
    	//echo "<pre>"; print_r($permission_option);die;     	 	
    	$data['permissions'] = $permission_option;
    	return View::make('admin.permissions')->with($data);
    }

    public function doPermission(){

    }
   

    public function pages(){
    	$page =  with(new Option);
    	$db_options = Option::get_options();
    	$page_options = Option::qa_page_option_names();
    	foreach ($page_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$page->$tmp_option = $db_options[$option];
    	}    	
    	$data['page'] = $page;
    	return View::make('admin.pages')->with($data);
    }

    public function doPage(){
    	try {
    		$page_options = Option::qa_page_option_names();
    		foreach ($page_options as $key => $page_option) {
				Option::qa_db_set_option($page_option,((int)Input::get('option_'.$page_option)));
			}		
        	Session::flash('success', 'Options Saved!');
        	return Redirect::to('admin/pages');
    	}
    	catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/pages');
        } 
    }

    public function points(){    	
    	$point =  with(new Option); 	
    	$db_options = Option::get_options();
    	$point_options = Option::qa_db_points_option_names();    	
    	foreach ($point_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$point->$tmp_option = $db_options[$option];
    	}    	
    	$data['point'] = $point;
    	return View::make('admin.points')->with($data);
    }
    //Do action of points.    
    public function dopoints() {
    	//check which submit was clicked on.
    	try {
    		$point_options = Option::qa_db_points_option_names();
	        if(Input::get('doshowdefaults')) {
	        	//echo "<pre>"; print_r($point_options);die;
	        	Option::qa_reset_options($point_options);
				Session::flash('success', 'Options reset');				
	        }
	        else {				
				foreach ($point_options as $key => $point_option) {
					Option::qa_db_set_option($point_option,Input::get('option_'.$point_option));
				}		
	        	Session::flash('success', 'Options Saved!');	        	                         
			}
			return Redirect::to('admin/points');
		}
		catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/points');
        }        
    }

    public function spam(){
    	$point =  with(new Option); 	
    	$db_options = Option::get_options();
    	$spam_options = Option::qa_spam_option_names();    	
    	foreach ($spam_options as $index => $option) {
    		$tmp_option = 'option_'.$option;
			$point->$tmp_option = $db_options[$option];
    	}    	
    	$data['spam'] = $point;    	    	
    	return View::make('admin.spam')->with($data);
    }

    public function doSpam(){
    	try {
    		$spam_options = Option::qa_spam_option_names(); 
    		if(Input::get('doshowdefaults')) {
    			Option::qa_reset_options($spam_options);
				Session::flash('success', 'Options reset');
    		}
    		else {
    			foreach ($spam_options as $key => $spam_option) {
    				$option_value = Option::qa_convert_value_into_type($spam_option,Input::get('option_'.$spam_option));
					Option::qa_db_set_option($spam_option,$option_value);
				}		
	        	Session::flash('success', 'Options Saved!');
    		}
    		return Redirect::to('admin/spam');
    	}
    	catch (ParseException $error) {
            // The login failed. Check error to see why.	            
            Session::flash('error', 'Error in saving options!');
            return Redirect::to('admin/spam');
        }
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