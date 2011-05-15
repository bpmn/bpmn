<?php

	/**
	 * Elgg all openlab forum discussions page
	 * This page will show all topic dicussions ordered by last comment, regardless of which openlab 
	 * they are part of
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

	// access check for closed openlabs
	group_gatekeeper();
		
	// Display them
	    $area2 = elgg_view_title(elgg_echo("openlabs:latestdiscussion"));
		set_context('search');
	    $area2 .= list_entities_from_annotations("object", "openlabforumtopic", "openlab_topic_post", "", 40, 0, 0, false, true);
	    set_context('openlabs');
	    
	    $body = elgg_view_layout("two_column_left_sidebar", '', $area2);
        
    // Display page
		page_draw(elgg_echo('openlabs:latestdiscussion'),$body);
		
		
?>