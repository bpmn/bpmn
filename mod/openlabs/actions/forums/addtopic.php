<?php

    /**
	 * Elgg openlabs plugin add topic action.
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	// Make sure we're logged in; forward to the front page if not
		if (!isloggedin()) forward();
		
	// Check the user is a openlab member
	    $openlab_entity =  get_entity(get_input('openlab_guid'));
	    if (!$openlab_entity->isMember($vars['user'])) forward();
	    
	// Get input data
	    $title = strip_tags(get_input('topictitle'));
		$message = get_input('topicmessage');
		$tags = get_input('topictags');
		$access = get_input('access_id');
		$openlab_guid = (int) get_input('openlab_guid');
		$user = $_SESSION['user']->getGUID(); // you need to be logged in to comment on a openlab forum
		$status = get_input('status'); // sticky, resolved, closed
		
	// Convert string of tags into a preformatted array
		 $tagarray = string_to_tag_array($tags);
		
	// Make sure the title / message aren't blank
		if (empty($title) || empty($message)) {
			register_error(elgg_echo("openlabtopic:blank"));
			forward("pg/openlabs/forum/{$openlab_guid}/");
			
	// Otherwise, save the topic
		} else {
			
	// Initialise a new ElggObject
			$openlabtopic = new ElggObject();
	// Tell the system it's a openlab forum topic
			$openlabtopic->subtype = "openlabforumtopic";
	// Set its owner to the current user
			$openlabtopic->owner_guid = $user;
	// Set the openlab it belongs to
			$openlabtopic->container_guid = $openlab_guid;
	// For now, set its access to public (we'll add an access dropdown shortly)
			$openlabtopic->access_id = $access;
	// Set its title and description appropriately
			$openlabtopic->title = $title;
	// Before we can set metadata, we need to save the topic
			if (!$openlabtopic->save()) {
				register_error(elgg_echo("openlabtopic:error"));
				forward("pg/openlabs/forum/{$openlab_guid}/");
			}
	// Now let's add tags. We can pass an array directly to the object property! Easy.
			if (is_array($tagarray)) {
				$openlabtopic->tags = $tagarray;
			}
	// add metadata
	        $openlabtopic->status = $status; // the current status i.e sticky, closed, resolved, open
	           
    // now add the topic message as an annotation
        	$openlabtopic->annotate('openlab_topic_post',$message,$access, $user);   
        	
    // add to river
	        add_to_river('river/forum/topic/create','create',$_SESSION['user']->guid,$openlabtopic->guid);
	        
	// Success message
			system_message(elgg_echo("openlabtopic:created"));
			
	// Forward to the openlab forum page
	        global $CONFIG;
	        $url = $CONFIG->wwwroot . "pg/openlabs/forum/{$openlab_guid}/";
			forward($url);
				
		}
		
?>

