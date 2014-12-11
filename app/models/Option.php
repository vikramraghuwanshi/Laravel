<?php

use Carbon\Carbon;

class Option extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'options';

	/*
	Set option $name to $value in the database
	*/	

	public static function qa_db_set_option($name, $value){		
		DB::select('REPLACE '.DB::getTablePrefix().'options (title, content) VALUES (?, ?)',array($name,$value));
	}

	//Get all options from database.
	public static function qa_db_get_options(){		
		$options = DB::table('options')->get();		
		$tmp_options = array();
		foreach ($options as $key => $option) {
			$tmp_options[$option->title] = $option->content;
		}
		return $tmp_options;
	}

	/** 
	All Points related functions 
	**/

	/*
	Returns an array of option names required to perform calculations in userpoints table
	*/

	function qa_db_points_option_names() {
		return array(
			'points_post_q', 'points_select_a', 'points_per_q_voted_up', 'points_per_q_voted_down', 'points_q_voted_max_gain', 'points_q_voted_max_loss',
			'points_post_a', 'points_a_selected', 'points_per_a_voted_up', 'points_per_a_voted_down', 'points_a_voted_max_gain', 'points_a_voted_max_loss',
			'points_vote_up_q', 'points_vote_down_q', 'points_vote_up_a', 'points_vote_down_a','points_multiple', 'points_base',
		);
	}

	/*
	Set an option $name to $value (application level) in both cache and database, unless
	$todatabase=false, in which case set it in the cache only
	*/

	function qa_set_option($name, $value, $todatabase=true){
		if ($todatabase && isset($value)){
			Option::qa_db_set_option($name, $value);
			$qa_options_cache[$name]=$value;
		}
	}
}