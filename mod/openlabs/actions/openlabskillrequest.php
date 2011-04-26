<?php
	/**
	 * Delete a user request to join a closed openlab.
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	// Load configuration
	global $CONFIG;
	
	gatekeeper();
	
	$user_guid = get_input('user_guid', get_loggedin_userid());
	$openlab_guid = get_input('openlab_guid');
	
	$user = get_entity($user_guid);
	$openlab = get_entity($openlab_guid);
	
	// If join request made
			if (check_entity_relationship($user->guid, 'membership_request', $openlab->guid))
			{
				remove_entity_relationship($user->guid, 'membership_request', $openlab->guid);
				system_message(elgg_echo("openlabs:joinrequestkilled"));
			}
	
	forward($_SERVER['HTTP_REFERER']);
	
?>