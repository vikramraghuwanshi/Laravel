<?php 
class SideButtons {

	public static function post_button($element,$title){
		$html="";
		if (isset($element))
			$html .= '<input type="submit" class="qa-form-light-button qa-form-light-button-'.$element.'" value="'.$element.'" '.$title.'>';
			//$html .='<input '.$post[$element].' type="submit" value="'.$value.'" class="'.$class.'-button"/> ';
			return $html;
	}

	public static function getButtons($post){
		$button_html="";
		$button_html .= '<div class="qa-q-view-buttons">';
		$anew="'anew'";
		switch (@$post['button_state'])
		{
			case 'without_login_question':
				$button_html .= SideButtons::post_button('flag','title="Flag this question as spam or inappropriate"');
				$button_html .= SideButtons::post_button('answer','title="Answer this question" onclick="return qa_toggle_element('.$anew.')"');
				break;
			
			case 'self_login_question':
				$button_html .= SideButtons::post_button('edit','title="Edit this question"');
				$button_html .= SideButtons::post_button('close','title="Close this question to any new answers"');
				$button_html .= SideButtons::post_button('hide','title="Hide this question"');
				$button_html .= SideButtons::post_button('answer','title="Answer this question" onclick="return qa_toggle_element('.$anew.')"');
				break;
			
			default:
				$button_html .= SideButtons::post_button('edit','title="Edit this question"');
				$button_html .= SideButtons::post_button('flag','title="Flag this question as spam or inappropriate"');
				$button_html .= SideButtons::post_button('close','title="Close this question to any new answers"');
				$button_html .= SideButtons::post_button('hide','title="Hide this question"');
				$button_html .= SideButtons::post_button('answer','title="Answer this question" onclick="return qa_toggle_element('.$anew.')"');
				break;
		}
		$button_html .= '</div>';
		return $button_html;
	}
}
?>
<!--
<input class="qa-form-light-button qa-form-light-button-edit" type="submit" title="Edit this question" value="edit" name="q_doedit">

<input class="qa-form-light-button qa-form-light-button-flag" type="submit" title="Flag this question as spam or inappropriate" value="flag" onclick="qa_show_waiting_after(this, false);" name="q_doflag">

<input class="qa-form-light-button qa-form-light-button-close" type="submit" title="Close this question to any new answers" value="close" name="q_doclose">

<input class="qa-form-light-button qa-form-light-button-hide" type="submit" title="Hide this question" value="hide" onclick="qa_show_waiting_after(this, false);" name="q_dohide">

<input id="q_doanswer" class="qa-form-light-button qa-form-light-button-answer" type="submit" title="Answer this question" value="answer" onclick="return qa_toggle_element('anew')" name="q_doanswer">
-->