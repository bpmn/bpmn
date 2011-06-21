<?php
	/**
	 * Invite users to openlabs
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();
	
	$team_guid = (int) get_input('group_guid');
	$team = get_entity($team_guid);
	set_page_owner($team_guid);


	$title = elgg_echo("teams:removemember");

	$area2 = elgg_view_title($title);
	
	if (($team) && ($team->canEdit()))
	{	
		$area2 .= elgg_view("forms/teams/removemember", array('entity' => $team));
			 
	} else {
		$area2 .= elgg_echo("teams:noaccess");
	}
	
	$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);
	
	page_draw($title, $body);
?>