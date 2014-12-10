<?php 
/*
	|--------------------------------------------------------------------------
	| Model for Questions
	|--------------------------------------------------------------------------
	|
	| All Questions related Queries are to be there in this model. 
*/
use Carbon\Carbon;
class Question extends Eloquent{
	
	public function getQuestions(){
		//$categoryids="CONCAT_WS(',', ^posts.catidpath1, ^posts.catidpath2, ^posts.catidpath3, ^posts.categoryid)";
		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('posts')
	    ->leftjoin('users', 'users.userid', '=', 'posts.userid')
	    ->leftjoin('userpoints', 'userpoints.userid', '=', 'posts.userid')
	    ->leftjoin('categories', 'categories.categoryid', '=', 'posts.categoryid')
	    ->orderBy('postid', 'desc')
	    ->where('type', '=', 'Q')
	    ->get(array('posts.*', 'categories.title as categoryname', 
	    			'categories.backpath as categorybackpath',
	    			'userpoints.points',
	    			'users.flags',
	    			'users.level',
	    			'users.email',
	    			'users.handle',
	    			'users.avatarblobid',
	    			'users.avatarwidth',
	    			'users.avatarheight'
	    			));
	    DB::setFetchMode(PDO::FETCH_CLASS);
	    return $data;
	}

	public function getSortedQuestions($sort){
		if($sort=="hot"){
			$sorting="hotness";
			$order="desc";
			$head="Hot questions";
		}
		elseif($sort=="votes"){
			$sorting="netvotes";
			$order="desc";
			$head="Highest voted questions ";
		}
		elseif($sort=="answers"){
			$sorting="acount";
			$order="desc";
			$head=" Most answered questions ";
		}
		else{
			$sorting="postid";
			$order="desc";	
		}
		
		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('posts')
	    ->leftjoin('users', 'users.userid', '=', 'posts.userid')
	    ->leftjoin('userpoints', 'userpoints.userid', '=', 'posts.userid')
	    ->leftjoin('categories', 'categories.categoryid', '=', 'posts.categoryid')
	    ->orderBy($sorting, $order)
	    ->where('type', '=', 'Q')
	    ->get(array('posts.*', 'categories.title as categoryname', 
	    			'categories.backpath as categorybackpath',
	    			'userpoints.points',
	    			'users.flags',
	    			'users.level',
	    			'users.email',
	    			'users.handle',
	    			'users.avatarblobid',
	    			'users.avatarwidth',
	    			'users.avatarheight'
	    			));
	    DB::setFetchMode(PDO::FETCH_CLASS);
	    $data[0]['head']=$head;
	    return $data;
	}

	public function getUnanswered(){
		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('posts')
	    ->leftjoin('users', 'users.userid', '=', 'posts.userid')
	    ->leftjoin('userpoints', 'userpoints.userid', '=', 'posts.userid')
	    ->leftjoin('categories', 'categories.categoryid', '=', 'posts.categoryid')
	    ->orderBy('postid', 'desc')
	    ->where('type', '=', 'Q')
	    ->where('acount', '=' , 0)
	    ->get(array('posts.*', 'categories.title as categoryname', 
	    			'categories.backpath as categorybackpath',
	    			'userpoints.points',
	    			'users.flags',
	    			'users.level',
	    			'users.email',
	    			'users.handle',
	    			'users.avatarblobid',
	    			'users.avatarwidth',
	    			'users.avatarheight'
	    			));
	    DB::setFetchMode(PDO::FETCH_CLASS);
	    return $data;
	}

	public function getTags(){
		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('posts')
		->leftjoin('words', 'words.word', '=', 'posts.tags')
		->distinct()
		->orderBy('postid', 'desc')
		->where('tags', '!=', 'NULL')
		->where('tags', '!=', '')
		->get(array('posts.tags','words.tagcount'));
		DB::setFetchMode(PDO::FETCH_CLASS);
		return $data;
	}

	//Function to calculate time since question created
	public static function formattedCreatedDate($creat) {
		$created = new Carbon($creat);
		//$now = Carbon::now();
		$daysSinceEpoch = Carbon::create(2014, 12, 04, 15, 20, 31)->diffForHumans();
		//echo $daysSinceEpoch;die;
		return $created->diffForHumans();
	}

	public function getSingleQuestion($postid){
		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('posts')
	    ->leftjoin('users', 'users.userid', '=', 'posts.userid')
	    ->leftjoin('userpoints', 'userpoints.userid', '=', 'posts.userid')
	    ->leftjoin('categories', 'categories.categoryid', '=', 'posts.categoryid')
	    ->where('postid', '=' , $postid)
	    ->first(array('posts.*', 'categories.title as categoryname', 
	    			'categories.backpath as categorybackpath',
	    			'userpoints.points',
	    			'users.flags',
	    			'users.level',
	    			'users.email',
	    			'users.handle',
	    			'users.avatarblobid',
	    			'users.avatarwidth',
	    			'users.avatarheight'
	    			));
	    DB::setFetchMode(PDO::FETCH_CLASS);
	    return $data;
	}

	public static function qa_qs_sub_navigation($sort, $categoryslugs) {
		$request='questions';
		/*if (isset($categoryslugs)){
			foreach ($categoryslugs as $slug) {
				$request.='/'.$slug;
			}
		}*/

		$navigation=array(
			'recent' => array(
				'label' => "Recent",
				'url' => URL::to("/question"),
			),
			
			'hot' => array(
				'label' => "Hot!",
				'url' => URL::to("/question/sort/hot"),
			),
			
			'votes' => array(
				'label' => "Most votes",
				'url' => URL::to("/question/sort/votes"),
			),

			'answers' => array(
				'label' => "Most answers",
				'url' => URL::to("/question/sort/answers"),
			),

			'views' => array(
				'label' => "Most views",
				'url' => "#",
			),
		);
		
		/*if (isset($navigation[$sort])){
			$navigation[$sort]['selected']=true;
		}
		else{
			$navigation['recent']['selected']=true;
		}
		
		if (!qa_opt('do_count_q_views')){
			unset($navigation['views']);
		}*/
		return $navigation;
	}

	public static function qa_unanswered_sub_navigation($by, $categoryslugs){
		$request='unanswered';

	/*	if (isset($categoryslugs)){
			foreach ($categoryslugs as $slug){
				$request.='/'.$slug;
			}
		}*/
		
		$navigation=array(
			'by-answers' => array(
				'label' => "No answer",
				'url' => "#",
			),
			
			'by-selected' => array(
				'label' => "No selected answer",
				'url' => "#",
			),
			
			'by-upvotes' => array(
				'label' => "No upvoted answer",
				'url' => "#",
			),
		);
		
		/*if (isset($navigation['by-'.$by])){
			$navigation['by-'.$by]['selected']=true;
		}
		else{
			$navigation['by-answers']['selected']=true;
		}
			
		if (!qa_opt('voting_on_as')){
			unset($navigation['by-upvotes']);
		}*/
		return $navigation;
	}

}