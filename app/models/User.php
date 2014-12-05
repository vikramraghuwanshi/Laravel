<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $primaryKey = 'userid';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('passcheck');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	public function getRememberToken() {
    	return $this->remember_token;
	}

	public function setRememberToken($value) {
	    $this->remember_token = $value;
	}

	public function getRememberTokenName() {
	    return 'remember_token';
	}

	public function qa_get_one_user_html($handle, $microformats=false, $favorited=false){ 
		return strlen($handle) ? ('<a href="#" class="qa-user-link'
				.($favorited ? ' qa-user-favorited' : '').($microformats ? ' url nickname' : '').'">'.($handle).'</a>') : '';
	}

	public function get_favorite(){		
		$qa_favorite_non_qs_map = array();
		if(Auth::check()){
			$favoritenonqs = DB::select('select `qa_userfavorites`.`entitytype`,`entityid`, `qa_categories`.`backpath`, `qa_words`.`word` from `qa_userfavorites` left join `qa_words` on `qa_userfavorites`.`entitytype` = ? and `qa_words`.`wordid` = `qa_userfavorites`.`entityid` left join `qa_categories` on `qa_userfavorites`.`entitytype` = ? and `qa_userfavorites`.`entitytype` = ? where `userid` = ? and `entitytype` != ?',array("T","T","C",Auth::user()->userid,"Q"));
			foreach ($favoritenonqs as $favorite){ 
				switch ($favorite->entitytype) {
					case "U":
						$qa_favorite_non_qs_map['user'][$favorite->entityid]=true;
						break;
					
					case "T":
						$qa_favorite_non_qs_map['tag'][qa_strtolower($favorite->word)]=true;
						break;
					
					case "C":
						$qa_favorite_non_qs_map['category'][$favorite->backpath]=true;
						break;
				}
			}
		}
		return $qa_favorite_non_qs_map;
	}

	public function get_all_users(){
		return DB::table('users')->join('userpoints', 'users.userid', '=', 'userpoints.userid')
		->select('users.userid', 'users.handle', 'userpoints.points','users.flags','users.email','users.avatarblobid','users.avatarwidth','avatarheight')
		->orderBy('userpoints.points', 'desc')->get();
	}

	public function qa_favorite_form($entitytype, $entityid, $favorite, $title){
		$html = '<form method="post" action="#"><h1><span id="favoriting" class="qa-favoriting">';
		$html .= '<input type="submit" class="qa-unfavorite-button" value="" onclick="return qa_favorite_click(this);" name="favorite_'.$entitytype.'_'.$entityid.'_'.(int)!$favorite.'" title="'.$title.'"> </span>';
		$html .= 'User '.Auth::user()->handle.'</h1></form>';
		return $html;
	}

	public static function qa_user_sub_navigation($handle, $selected, $ismyuser=false){
		$navigation = array(
			'profile' => array(
				'label' => 'User '.Auth::user()->handle,
				'url' => 'profile',
			),			
			'account' => array(
				'label' => 'My account',
				'url' => '#',
			),
			
			'favorites' => array(
				'label' => "My favorites",
				'url' => "#",
			),
			
			'wall' => array(
				'label' => 'Wall',
				'url' => '#',
			),
			
			'activity' => array(
				'label' => 'Recent activity',
				'url' =>'#',
			),
			
			'questions' => array(
				'label' => 'All questions',
				'url' => '#',
			),
			
			'answers' => array(
				'label' => 'All answers',
				'url' => '#',
			),
		);		
		if (isset($navigation[$selected])){
			$navigation[$selected]['selected']=true;
		}
		$qa_content = app('qa_content');	
		if (!$qa_content['settings']['allow_user_walls']){
			unset($navigation['wall']);
		}
			
		if (!$ismyuser){
			unset($navigation['account']);
		}
			
		if (!$ismyuser){
			unset($navigation['favorites']);
		}		
		return $navigation;		
	}

	public function second_to_string($seconds){
		$seconds=max($seconds, 1);		
		$scales=array(
			31557600 => array( '1 year'   , ' years'   ),
			 2629800 => array( '1 month'  , ' months'  ),
			  604800 => array( '1 week'   , ' weeks'   ),
			   86400 => array( '1 day'    , ' days'    ),
			    3600 => array( '1 hour'   , ' hours'   ),
			      60 => array( '1 minute' , ' minutes' ),
			       1 => array( '1 second' , ' seconds' ),
		);		
		foreach ($scales as $scale => $phrases){
			if ($seconds>=$scale) {
				$count=floor($seconds/$scale);
			
				if ($count==1){
					$string=($phrases[0]);
				}
				else {
					$string=($count.$phrases[1]);
				}					
				break;
			}
		}		
		return $string;
	}

	function qa_user_level_string($level){
		if ($level>=120){
			$string='Super Administrator';
		}
		elseif ($level>=100){
			$string='Administrator';
		}
		elseif ($level>=80){
			$string='Moderator';
		}
		elseif ($level>=50){
			$string='Editor';
		}
		elseif ($level>=20){
			$string='Expert';
		}
		elseif ($level>=10){
			$string='Approved user';
		}
		else{
			$string='Registered user';
		}		
		return ($string);
	}
	
}