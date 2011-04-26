<?php
	/**
	 * Elgg openlabs items view.
	 * This is the messageboard, members, pages and latest forums posts. Each plugin will extend the views
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */
	 
	 //right column
	 if ($forae = elgg_get_entities(array('types' => 'object', 'container_guid' => $vars['entity']->guid))) {
	 //if ($forae = get_entities_from_annotations("object", "openlabforumtopic", "openlab_topic_post", "", 0, $vars['entity']->guid, 20, 0, "desc", false)) {
	 	foreach($forae as $forum)
	 		echo elgg_view_entity($forum);
	 }
	 
?>