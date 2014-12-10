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
}