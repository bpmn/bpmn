<?php
	/**
	 * Elgg openlabs forum
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	$openlab_guid = (int)get_input('openlab_guid');
	set_page_owner($openlab_guid);
	if (!(page_owner_entity() instanceof ElggGroup)) {
		forward();
	}
	
	group_gatekeeper() ; 
	
	//get any forum topics
	$topics = list_entities_from_annotations("object", "openlabforumtopic", "openlab_topic_post", "", 20, 0, $openlab_guid, false, false, false);
	set_context('search');	
	$area2 = elgg_view("forum/topics", array('topics' => $topics, 'openlab_guid' => $openlab_guid));
	set_context('openlabs');
	
	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);
	
	$title = elgg_echo('item:object:openlabforumtopic');
	
	// Finally draw the page
	page_draw($title, $body);



?>