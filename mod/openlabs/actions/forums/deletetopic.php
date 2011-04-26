<?php

	/**
	 * Elgg openlabs: delete topic action
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */
		
	    $openlab_entity =  get_entity(get_input('openlab'));

	// Get input data
		$topic_guid = (int) get_input('topic');
		$openlab_guid = (int) get_input('openlab');
		
		$topic = get_entity($topic_guid);
		if ($topic->getSubtype() == "openlabforumtopic") {

	// Make sure we actually have permission to edit
			if (!$topic->canEdit()) {
				register_error(elgg_echo("openlabstopic:notdeleted"));
				forward(REFERER);
			}

		// Delete it!
				$rowsaffected = $topic->delete();
				if ($rowsaffected > 0) {
		// Success message
					system_message(elgg_echo("openlabstopic:deleted"));
				} else {
					register_error(elgg_echo("openlabstopic:notdeleted"));
				}
		// Forward to the openlab forum page
	        $url = $CONFIG->wwwroot . "pg/openlabs/forum/{$openlab_guid}/";
			forward($url);
		
		}
		
?>