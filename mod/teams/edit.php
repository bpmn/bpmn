<?php
	/**
	 * Elgg teams plugin
	 * 
	 * @package ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();

	$group_guid = get_input('group_guid');
	$group = get_entity($group_guid);
	set_page_owner($group_guid);

	$title = elgg_echo("teams:edit");
	$body = elgg_view_title($title);
	
	if (($group) && ($group->canEdit()))
	{
		$body .= elgg_view("forms/teams/edit", array('entity' => $group));
			 
	} else {
		$body .= elgg_view('teams/contentwrapper',array('body' => elgg_echo('teams:noaccess')));
	}
	
	$body = elgg_view_layout('two_column_left_sidebar', '', $body);
	
	page_draw($title, $body);
?>