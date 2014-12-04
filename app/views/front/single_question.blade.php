@extends('layouts.default')
@section('content')
<div class="qa-main">
	<h1>
		<span class="entry-title">{{$data['title']}}</span>
	</h1>
	<div class="qa-part-q-view">
		<div id="q11" class="qa-q-view  hentry question">
			<form action="./index.php?qa=11&amp;qa_1=what-is-your-filezilla" method="post">
				<div class="qa-q-view-stats">
					<div id="voting_11" class="qa-voting qa-voting-net">
						<div class="qa-vote-buttons qa-vote-buttons-net">
							<input type="submit" class="qa-vote-first-button qa-vote-up-button" value="+" onclick="return qa_vote_click(this);" name="vote_11_1_q11" title="Click to vote up"> 
							<input type="submit" class="qa-vote-second-button qa-vote-down-button" value="&ndash;" onclick="return qa_vote_click(this);" name="vote_11_-1_q11" title="Click to vote down"> 
						</div>
						<div class="qa-vote-count qa-vote-count-net">
							<span class="qa-netvote-count">
								<span class="qa-netvote-count-data">0<span class="votes-up"><span title="0" class="value-title"></span></span><span class="votes-down"><span title="0" class="value-title"></span></span></span><span class="qa-netvote-count-pad"> votes</span>
							</span>
						</div>
						<div class="qa-vote-clear">
						</div>
					</div>
				</div>
				<input type="hidden" value="0-1417695874-b22f2c297205a49aa4112f4074cc159ccb10b6fd" name="code">
			</form>
			<div class="qa-q-view-main">
				<form action="./index.php?qa=11&amp;qa_1=what-is-your-filezilla" method="post">
					<div class="qa-q-view-content">
						<a name="11"></a><div class="entry-content">{{{$data['content']}}}</div>
					</div>
					<div class="qa-q-view-tags">
						<ul class="qa-q-view-tag-list">
							<li class="qa-q-view-tag-item"><a class="qa-tag-link" rel="tag" href="./index.php?qa=tag&amp;qa_1=first-second-third">{{{$data['tags']}}}</a></li>
						</ul>
					</div>
					<span class="qa-q-view-avatar-meta">
						<span class="qa-q-view-meta">
							<a class="qa-q-view-what" href="./index.php?qa=11&amp;qa_1=what-is-your-filezilla">asked</a>
							<span class="qa-q-view-when">
								<span class="qa-q-view-when-data"><span class="published"><span title="2014-12-04T09:50:31+0000" class="value-title"></span>2 hours</span></span><span class="qa-q-view-when-pad"> ago</span>
							</span>
							<span class="qa-q-view-who">
								<span class="qa-q-view-who-pad">by </span>
								<span class="qa-q-view-who-data"><span class="vcard author"><a class="qa-user-link url nickname" href="./index.php?qa=user&amp;qa_1=akash">akash</a></span></span>
								<span class="qa-q-view-who-points">
									<span class="qa-q-view-who-points-pad">(</span><span class="qa-q-view-who-points-data">290</span><span class="qa-q-view-who-points-pad"> points)</span>
								</span>
							</span>
						</span>
					</span>
					<div class="qa-q-view-buttons">
						<input type="submit" class="qa-form-light-button qa-form-light-button-flag" title="Flag this question as spam or inappropriate" value="flag" onclick="qa_show_waiting_after(this, false);" name="q_doflag">
						<input type="submit" class="qa-form-light-button qa-form-light-button-answer" title="Answer this question" value="answer" onclick="return qa_toggle_element('anew')" id="q_doanswer" name="q_doanswer">
					</div>
					
					<div id="c11_list" style="display:none;" class="qa-q-view-c-list">
					</div> <!-- END qa-c-list -->
					
					<input type="hidden" value="0-1417695874-9452c9d45b4db935bd286630501135071a57016c" name="code">
					<input type="hidden" value="" name="qa_click">
				</form>
				<div class="qa-c-form">
				</div> <!-- END qa-c-form -->
				
			</div> <!-- END qa-q-view-main -->
			<div class="qa-q-view-clear">
			</div>
		</div> <!-- END qa-q-view -->
		
	</div>
	<div class="qa-part-a-form">
		<div id="anew" class="qa-a-form">
			<h2>Your answer</h2>
			<form name="a_form" action="./index.php?qa=11&amp;qa_1=what-is-your-filezilla" method="post">
				<table class="qa-form-tall-table">
					<tbody><tr>
						<td class="qa-form-tall-data">
							<input type="hidden" value="1" id="a_content_ckeditor_ok" name="a_content_ckeditor_ok"><input type="hidden" value="" id="a_content_ckeditor_data" name="a_content_ckeditor_data">
							<textarea class="qa-form-tall-text" cols="40" rows="12" name="a_content" >
							</textarea>

						</td>
					</tr>
					<tr>
						<td class="qa-form-tall-label">
							Your name to display (optional):
						</td>
					</tr>
					<tr>
						<td class="qa-form-tall-data">
							<input type="text" class="qa-form-tall-text" value="" name="a_name">
						</td>
					</tr>
					<tr>
						<td class="qa-form-tall-label">
							<label>
								<input type="checkbox" class="qa-form-tall-checkbox" checked="" value="1" onclick="if (document.getElementById('a_notify').checked) document.getElementById('a_email').focus();" id="a_notify" name="a_notify">
								<span id="a_email_shown">Email me at this address if my answer is selected or commented on:</span><span style="display:none;" id="a_email_hidden">Email me if my answer is selected or commented on</span>
							</label>
						</td>
					</tr>
					</tbody><tbody id="a_email_display">
						<tr>
							<td class="qa-form-tall-data">
								<input type="text" class="qa-form-tall-text" value="" id="a_email" name="a_email">
								<div class="qa-form-tall-note">Privacy: Your email address will only be used for sending these notifications.</div>
							</td>
						</tr>
					</tbody>
					<tbody><tr>
						<td class="qa-form-tall-buttons" colspan="1">
							<input type="submit" class="qa-form-tall-button qa-form-tall-button-answer" title="" value="Add answer" onclick="if (qa_ckeditor_a_content) qa_ckeditor_a_content.updateElement(); return qa_submit_answer(11, this);">
						</td>
					</tr>
				</tbody></table>
				<input type="hidden" value="WYSIWYG Editor" name="a_editor">
				<input type="hidden" value="1" name="a_doadd">
				<input type="hidden" value="0-1417695874-b89c70a841daa91cf04b679907dfd379ea475d4f" name="code">
			</form>
		</div> <!-- END qa-a-form -->
		
	</div>
	<div class="qa-part-a-list">
		<h2 style="display:none;" id="a_list_title"></h2>
		<div id="a_list" class="qa-a-list">
			
		</div> <!-- END qa-a-list -->
		
	</div>
</div>
@stop