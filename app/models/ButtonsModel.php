<?php
/*
	|--------------------------------------------------------------------------
	| Model for Votes
	|--------------------------------------------------------------------------
	|
	| All Votes related Queries are to be there in this model. 
*/
class ButtonsModel extends Eloquent{
	public function getButtons($single_post){
		$userid="";
		if(Auth::check()){
			$userid=Auth::user()->userid;
			DB::setFetchMode(PDO::FETCH_ASSOC);
			$uservotes=DB::table('uservotes')
				->where('postid', $single_post['postid'])
	            ->where('userid', $userid)
	            ->get();
	        DB::setFetchMode(PDO::FETCH_CLASS);
		}
		$post="";
		if(!Auth::check())
			$post['button_state']="without_login_question";
		elseif((Auth::check()) && ($single_post['userid']==$userid))
			$post['button_state']="self_login_question";
		
		return $post;

	}
}