<?php
	/**
	 * Invite users to openlabs
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();
	
	$openlab_guid = (int) get_input('openlab_guid');
	$openlab = get_entity($openlab_guid);
	set_page_owner($openlab_guid);

	$title = elgg_echo("openlabs:invite");

	$area2 = elgg_view_title($title);
	
	if (($openlab) && ($openlab->canEdit()))
	{	
		$area2 .= elgg_view("forms/openlabs/invite", array('entity' => $openlab));
			 
	} else {
		$area2 .= elgg_echo("openlabs:noaccess");
	}
	
	$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);
	
	page_draw($title, $body);
?>