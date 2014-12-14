@extends('layouts.default')
@section('content')
<div class="qa-main">
	<h1> Administration center - Permissions  </h1>
	<div class="qa-part-form">
		<form method="post" action="../admin/permissions" name="admin_form" onsubmit="document.forms.admin_form.has_js.value=1; return true;">
			<table class="qa-form-wide-table">
				<tbody>
				<tr id="permit_view_q_page">
					<td class="qa-form-wide-label">
						Viewing question pages:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_view_q_page" id="option_permit_view_q_page" class="qa-form-wide-select">
							<option value="150" selected="">Anybody</option>
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
						</select>
					</td>
				</tr>
				<tr id="allow_view_q_bots" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<input name="option_allow_view_q_bots" id="option_allow_view_q_bots" type="checkbox" value="1" checked="" class="qa-form-wide-checkbox">
						<span class="qa-form-wide-note">Allow search engines to view question pages</span>
					</td>
				</tr>
				<tr id="permit_post_q">
					<td class="qa-form-wide-label">
						Asking questions:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_post_q" id="option_permit_post_q" class="qa-form-wide-select">
							<option value="150" selected="">Anybody</option>
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_post_q_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_post_q_points" id="option_permit_post_q_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_post_a">
					<td class="qa-form-wide-label">
						Answering questions:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_post_a" id="option_permit_post_a" class="qa-form-wide-select">
							<option value="150" selected="">Anybody</option>
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_post_a_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_post_a_points" id="option_permit_post_a_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_post_c">
					<td class="qa-form-wide-label">
						Adding comments:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_post_c" id="option_permit_post_c" class="qa-form-wide-select">
							<option value="150" selected="">Anybody</option>
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70">Editors, Moderators, Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_post_c_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_post_c_points" id="option_permit_post_c_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_vote_q">
					<td class="qa-form-wide-label">
						Voting on questions:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_vote_q" id="option_permit_vote_q" class="qa-form-wide-select">
							<option value="120" selected="">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
						</select>
					</td>
				</tr>
				<tr id="permit_vote_q_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_vote_q_points" id="option_permit_vote_q_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_vote_a">
					<td class="qa-form-wide-label">
						Voting on answers:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_vote_a" id="option_permit_vote_a" class="qa-form-wide-select">
							<option value="120" selected="">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
						</select>
					</td>
				</tr>
				<tr id="permit_vote_a_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_vote_a_points" id="option_permit_vote_a_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_vote_down">
					<td class="qa-form-wide-label">
						Voting posts down:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_vote_down" id="option_permit_vote_down" class="qa-form-wide-select">
							<option value="120" selected="">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_vote_down_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_vote_down_points" id="option_permit_vote_down_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_retag_cat">
					<td class="qa-form-wide-label">
						Recategorizing any question:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_retag_cat" id="option_permit_retag_cat" class="qa-form-wide-select">
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70" selected="">Editors, Moderators, Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_retag_cat_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_retag_cat_points" id="option_permit_retag_cat_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_edit_q">
					<td class="qa-form-wide-label">
						Editing any question:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_edit_q" id="option_permit_edit_q" class="qa-form-wide-select">
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70" selected="">Editors, Moderators, Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_edit_q_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_edit_q_points" id="option_permit_edit_q_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_edit_a">
					<td class="qa-form-wide-label">
						Editing any answer:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_edit_a" id="option_permit_edit_a" class="qa-form-wide-select">
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100" selected="">Experts, Editors, Moderators, Admins</option>
							<option value="70">Editors, Moderators, Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_edit_a_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_edit_a_points" id="option_permit_edit_a_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_edit_c">
					<td class="qa-form-wide-label">
						Editing any comment:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_edit_c" id="option_permit_edit_c" class="qa-form-wide-select">
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70" selected="">Editors, Moderators, Admins</option>
							<option value="40">Moderators and Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_edit_c_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_edit_c_points" id="option_permit_edit_c_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_edit_silent">
					<td class="qa-form-wide-label">
						Editing posts silently:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_edit_silent" id="option_permit_edit_silent" class="qa-form-wide-select">
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70">Editors, Moderators, Admins</option>
							<option value="40" selected="">Moderators and Admins</option>
							<option value="20">Administrators</option>
						</select>
					</td>
				</tr>
				<tr id="permit_edit_silent_points" style="display: none;">
					<td class="qa-form-wide-label">
						[options/permit_edit_silent_points]
					</td>
					<td class="qa-form-wide-data">
						<input name="option_permit_edit_silent_points" id="option_permit_edit_silent_points" type="text" value="" class="qa-form-wide-text">
					</td>
				</tr>
				<tr id="permit_close_q">
					<td class="qa-form-wide-label">
						Closing any question:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_close_q" id="option_permit_close_q" class="qa-form-wide-select">
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70" selected="">Editors, Moderators, Admins</option>
							<option value="40">Moderators and Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_close_q_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_close_q_points" id="option_permit_close_q_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_select_a">
					<td class="qa-form-wide-label">
						Selecting answer for any question:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_select_a" id="option_permit_select_a" class="qa-form-wide-select">
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100" selected="">Experts, Editors, Moderators, Admins</option>
							<option value="70">Editors, Moderators, Admins</option>
							<option value="40">Moderators and Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_select_a_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_select_a_points" id="option_permit_select_a_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_anon_view_ips">
					<td class="qa-form-wide-label">
						Viewing IPs of anonymous posts:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_anon_view_ips" id="option_permit_anon_view_ips" class="qa-form-wide-select">
							<option value="150">Anybody</option>
							<option value="120">Registered users</option>
							<option value="110">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70" selected="">Editors, Moderators, Admins</option>
							<option value="40">Moderators and Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_anon_view_ips_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_anon_view_ips_points" id="option_permit_anon_view_ips_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_view_voters_flaggers">
					<td class="qa-form-wide-label">
						Viewing who voted or flagged posts:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_view_voters_flaggers" id="option_permit_view_voters_flaggers" class="qa-form-wide-select">
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70">Editors, Moderators, Admins</option>
							<option value="40">Moderators and Admins</option>
							<option value="20" selected="">Administrators</option>
							<option value="0">Super Administrators</option>
						</select>
					</td>
				</tr>
				<tr id="permit_view_voters_flaggers_points" style="display: none;">
					<td class="qa-form-wide-label">
						[options/permit_view_voters_flaggers_points]
					</td>
					<td class="qa-form-wide-data">
						<input name="option_permit_view_voters_flaggers_points" id="option_permit_view_voters_flaggers_points" type="text" value="" class="qa-form-wide-text">
					</td>
				</tr>
				<tr id="permit_flag">
					<td class="qa-form-wide-label">
						Flagging posts:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_flag" id="option_permit_flag" class="qa-form-wide-select">
							<option value="120">Registered users</option>
							<option value="110" selected="">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70">Editors, Moderators, Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_flag_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_flag_points" id="option_permit_flag_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_moderate">
					<td class="qa-form-wide-label">
						Approving or rejecting posts:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_moderate" id="option_permit_moderate" class="qa-form-wide-select">
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100" selected="">Experts, Editors, Moderators, Admins</option>
							<option value="70">Editors, Moderators, Admins</option>
							<option value="40">Moderators and Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_moderate_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_moderate_points" id="option_permit_moderate_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_hide_show">
					<td class="qa-form-wide-label">
						Hiding or showing any post:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_hide_show" id="option_permit_hide_show" class="qa-form-wide-select">
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
							<option value="100">Experts, Editors, Moderators, Admins</option>
							<option value="70" selected="">Editors, Moderators, Admins</option>
							<option value="40">Moderators and Admins</option>
						</select>
					</td>
				</tr>
				<tr id="permit_hide_show_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_hide_show_points" id="option_permit_hide_show_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_delete_hidden">
					<td class="qa-form-wide-label">
						Deleting hidden posts:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_delete_hidden" id="option_permit_delete_hidden" class="qa-form-wide-select">
							<option value="70">Editors, Moderators, Admins</option>
							<option value="40" selected="">Moderators and Admins</option>
							<option value="20">Administrators</option>
						</select>
					</td>
				</tr>
				<tr id="permit_delete_hidden_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_delete_hidden_points" id="option_permit_delete_hidden_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr id="permit_post_wall">
					<td class="qa-form-wide-label">
						Posting on user walls:
					</td>
					<td class="qa-form-wide-data">
						<select name="option_permit_post_wall" id="option_permit_post_wall" class="qa-form-wide-select">
							<option value="120">Registered users</option>
							<option value="110" selected="">Registered users with email confirmed</option>
							<option value="106">Registered users with enough points</option>
							<option value="104">Registered &amp; email confirmed &amp; enough points</option>
						</select>
					</td>
				</tr>
				<tr id="permit_post_wall_points" style="display: none;">
					<td class="qa-form-wide-label">
						
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-prefix">Users must have&nbsp;</span>
						<input name="option_permit_post_wall_points" id="option_permit_post_wall_points" type="text" value="" class="qa-form-wide-number">
						<span class="qa-form-wide-note">points</span>
					</td>
				</tr>
				<tr>
					<td class="qa-form-wide-label">
						Blocking or unblocking user or IPs:
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-static">Moderators and Admins</span>
					</td>
				</tr>
				<tr>
					<td class="qa-form-wide-label">
						Approving registered users:
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-static">Moderators and Admins</span>
					</td>
				</tr>
				<tr>
					<td class="qa-form-wide-label">
						Creating experts:
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-static">Moderators and Admins</span>
					</td>
				</tr>
				<tr>
					<td class="qa-form-wide-label">
						Viewing user email addresses:
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-static">Administrators</span>
					</td>
				</tr>
				<tr>
					<td class="qa-form-wide-label">
						Deleting users:
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-static">Administrators</span>
					</td>
				</tr>
				<tr>
					<td class="qa-form-wide-label">
						Creating editors and moderators:
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-static">Administrators</span>
					</td>
				</tr>
				<tr>
					<td class="qa-form-wide-label">
						Creating administrators:
					</td>
					<td class="qa-form-wide-data">
						<span class="qa-form-wide-static">Super Administrators</span>
					</td>
				</tr>
				<tr>
					<td colspan="3" class="qa-form-wide-buttons">
						<input id="dosaveoptions" value="Save Options" title="" type="submit" class="qa-form-wide-button qa-form-wide-button-save">
						<input name="doresetoptions" value="Reset to Defaults" title="" type="submit" class="qa-form-wide-button qa-form-wide-button-reset">
					</td>
				</tr>
			</tbody>
		</table>
			<input type="hidden" name="dosaveoptions" value="1">
			<input type="hidden" name="has_js" value="0">
			<input type="hidden" name="code" value="1-1418290861-07a2647146c1ea20594dbb0fb65ca5ae002afe48">
		</form>
	</div>
</div>
@stop
