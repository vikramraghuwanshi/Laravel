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

}

?>