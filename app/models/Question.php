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
		$data = DB::table('qa_posts')
	    ->leftjoin('qa_users', 'qa_users.userid', '=', 'qa_posts.userid')
	    ->leftjoin('qa_userpoints', 'qa_userpoints.userid', '=', 'qa_posts.userid')
	    ->leftjoin('qa_categories', 'qa_categories.categoryid', '=', 'qa_posts.categoryid')
	    ->orderBy('postid', 'desc')
	    ->where('type', '=', 'Q')
	    ->get(array('qa_posts.*', 'qa_categories.title as categoryname', 
	    			'qa_categories.backpath as categorybackpath',
	    			'qa_userpoints.points',
	    			'qa_users.flags',
	    			'qa_users.level',
	    			'qa_users.email',
	    			'qa_users.handle',
	    			'qa_users.avatarblobid',
	    			'qa_users.avatarwidth',
	    			'qa_users.avatarheight'
	    			));
	    DB::setFetchMode(PDO::FETCH_CLASS);
	    return $data;
	}

	public function getUnanswered(){
		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('qa_posts')
	    ->leftjoin('qa_users', 'qa_users.userid', '=', 'qa_posts.userid')
	    ->leftjoin('qa_userpoints', 'qa_userpoints.userid', '=', 'qa_posts.userid')
	    ->leftjoin('qa_categories', 'qa_categories.categoryid', '=', 'qa_posts.categoryid')
	    ->orderBy('postid', 'desc')
	    ->where('type', '=', 'Q')
	    ->where('acount', '=' , 0)
	    ->get(array('qa_posts.*', 'qa_categories.title as categoryname', 
	    			'qa_categories.backpath as categorybackpath',
	    			'qa_userpoints.points',
	    			'qa_users.flags',
	    			'qa_users.level',
	    			'qa_users.email',
	    			'qa_users.handle',
	    			'qa_users.avatarblobid',
	    			'qa_users.avatarwidth',
	    			'qa_users.avatarheight'
	    			));
	    DB::setFetchMode(PDO::FETCH_CLASS);
	    return $data;
	}

	public function getTags(){
		DB::setFetchMode(PDO::FETCH_ASSOC);
		$data = DB::table('qa_posts')
		->leftjoin('qa_words', 'qa_words.word', '=', 'qa_posts.tags')
		->distinct()
		->orderBy('postid', 'desc')
		->where('tags', '!=', 'NULL')
		->where('tags', '!=', '')
		->get(array('qa_posts.tags','qa_words.tagcount'));
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

}

?>