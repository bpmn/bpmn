<?php

	/**
	 * Elgg teams 'member of' page
	 * 
	 * @package ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	
	gatekeeper();
	group_gatekeeper();
	
	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	
	if (page_owner() == $_SESSION['user']->guid) {
		$title = elgg_echo("teams:yours");
	} else $title = sprintf(elgg_echo("teams:owned"),page_owner_entity()->name);

	// Get objects
	$area2 = elgg_view_title($title);
	
	set_context('search');
	// offset is grabbed in the list_entities_from_relationship() function
	$objects = list_entities_from_relationship('member',page_owner(),false,'group','teams',0, $limit,false, false);
	set_context('teams');

        $area2 .= elgg_view('openlabs/contentwrapper', array('body' => $objects));
	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);
	
	
	// Finally draw the page
	page_draw($title, $body);
?>