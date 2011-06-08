<?php
	/**
	 * Elgg openlabs plugin
	 * 
	 * @package Elggopenlabs from ElggGroups
	 test STD
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();

	$openlab_guid = get_input('openlab_guid');
	$openlab = get_entity($openlab_guid);
	set_page_owner($openlab_guid);

	$title = elgg_echo("openlabs:edit");
	$body = elgg_view_title($title);
	
	if (($openlab) && ($openlab->canEdit()))
	{
		$body .= elgg_view("openlab_forms/openlabs/edit", array('entity' => $openlab));
			 
	} else {
		$body .= elgg_view('openlabs/contentwrapper',array('body' => elgg_echo('openlabs:noaccess')));
	}
	
	$body = elgg_view_layout('two_column_left_sidebar', '', $body);
	
	page_draw($title, $body);
?>
