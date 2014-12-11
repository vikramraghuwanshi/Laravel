@extends('layouts.default')
@section('content')

<div class="qa-main">
	<h1> Administration center - Points </h1>
	<div class="qa-part-form">
		@if(isset($user))
			<!--<form onsubmit="document.forms.points_form.has_js.value=1; return true;" name="points_form" action="./index.php?qa=admin&amp;qa_1=points" method="post">-->
				{{ Form::model($user, ['url' => 'doAccount', 'method' => 'post']) }}
				<table class="qa-form-wide-table">
					<tbody><tr>
						<td class="qa-form-wide-label">
							Posting a question:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;"><span style="visibility:hidden;">+</span></span></span>
							<input type="text" class="qa-form-wide-number" value="2" name="option_points_post_q">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Selecting an answer for your question:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;"><span style="visibility:hidden;">+</span></span></span>
							<input type="text" class="qa-form-wide-number" value="3" name="option_points_select_a">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Per up vote on your question:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">+</span></span>
							<input type="text" class="qa-form-wide-number" value="1" name="option_points_per_q_voted_up">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Per down vote on your question:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">&ndash;</span></span>
							<input type="text" class="qa-form-wide-number" value="1" name="option_points_per_q_voted_down">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Limit from up votes on each question:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">+</span></span>
							<input type="text" class="qa-form-wide-number" value="10" name="option_points_q_voted_max_gain">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Limit from down votes on each question:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">&ndash;</span></span>
							<input type="text" class="qa-form-wide-number" value="3" name="option_points_q_voted_max_loss">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-spacer" colspan="3">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Posting an answer:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;"><span style="visibility:hidden;">+</span></span></span>
							<input type="text" class="qa-form-wide-number" value="4" name="option_points_post_a">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Having your answer selected as the best:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;"><span style="visibility:hidden;">+</span></span></span>
							<input type="text" class="qa-form-wide-number" value="30" name="option_points_a_selected">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Per up vote on your answer:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">+</span></span>
							<input type="text" class="qa-form-wide-number" value="2" name="option_points_per_a_voted_up">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Per down vote on your answer:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">&ndash;</span></span>
							<input type="text" class="qa-form-wide-number" value="2" name="option_points_per_a_voted_down">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Limit from up votes on each answer:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">+</span></span>
							<input type="text" class="qa-form-wide-number" value="20" name="option_points_a_voted_max_gain">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Limit from down votes on each answer:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">&ndash;</span></span>
							<input type="text" class="qa-form-wide-number" value="5" name="option_points_a_voted_max_loss">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-spacer" colspan="3">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Voting up a question:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;"><span style="visibility:hidden;">+</span></span></span>
							<input type="text" class="qa-form-wide-number" value="1" name="option_points_vote_up_q">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Voting down a question:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;"><span style="visibility:hidden;">+</span></span></span>
							<input type="text" class="qa-form-wide-number" value="1" name="option_points_vote_down_q">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Voting up an answer:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;"><span style="visibility:hidden;">+</span></span></span>
							<input type="text" class="qa-form-wide-number" value="1" name="option_points_vote_up_a">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Voting down an answer:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;"><span style="visibility:hidden;">+</span></span></span>
							<input type="text" class="qa-form-wide-number" value="1" name="option_points_vote_down_a">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-spacer" colspan="3">
							&nbsp;
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Multiply all points:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">×</span></span>
							<input type="text" class="qa-form-wide-number" value="10" name="option_points_multiple">
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-label">
							Add for all users:
						</td>
						<td class="qa-form-wide-data">
							<span class="qa-form-wide-prefix"><span style="width:1em; display:inline-block; display:-moz-inline-stack;">+</span></span>
							<input type="text" class="qa-form-wide-number" value="100" name="option_points_base">
							<span class="qa-form-wide-note">points</span>
						</td>
					</tr>
					<tr>
						<td class="qa-form-wide-buttons" colspan="3">
							<input type="submit" class="qa-form-wide-button qa-form-wide-button-saverecalc" title="" value="Save and Recalculate" id="dosaverecalc">
							<input type="submit" class="qa-form-wide-button qa-form-wide-button-showdefaults" title="" value="Show Defaults" name="doshowdefaults">
						</td>
					</tr>
				</tbody></table>
				<input type="hidden" value="1" name="dosaverecalc">
				<input type="hidden" value="0" name="has_js">
				<input type="hidden" value="1-1418285008-dac4cb377d34e44995fa903f0a4e0dc6867d750e" name="code">
			{{ Form::close() }}
		@endif
		</div>

</div>
@stop
