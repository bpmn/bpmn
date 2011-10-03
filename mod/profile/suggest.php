<?php
	/**
	 * Suggest users to openLab
	 *
	 *
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();

	$username =  get_input('username');
	$user = get_user_by_username($username);
	set_page_owner($user->guid);


	if (($user))
	{
            $title = sprintf(elgg_echo("profile:suggest"),$user->name);
            $area2 = elgg_view_title($title);
            $area2 .= elgg_view("forms/profile/suggest", array('entity' => $user));
  //          $area2 .= elgg_view("forms/profile/invite");

        }

	$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);

	page_draw($title, $body);
?>