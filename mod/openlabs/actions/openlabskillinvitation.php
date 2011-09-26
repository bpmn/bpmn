<?php
	/**
	 * Delete an invitation to join a closed openlab.
	 *
	 * @package Elggopenlabs from ElggGroups
	 */

	// Load configuration
	global $CONFIG;

	gatekeeper();

        //pour pouvoir refuser les invit aux openlab privée
       $ignoreacess = elgg_get_ignore_access();
        elgg_set_ignore_access(True);

	$user_guid = get_input('user_guid', get_loggedin_userid());
	$openlab_guid = get_input('openlab_guid');

	$user = get_entity($user_guid);
	$openlab = get_entity($openlab_guid);

	// If join request made
			if (check_entity_relationship($openlab->guid, 'invited', $user->guid))
			{
				remove_entity_relationship($openlab->guid, 'invited', $user->guid);
				system_message(elgg_echo("openlabs:invitekilled"));
			}


       elgg_set_ignore_access($ignoreacess);
        forward($_SERVER['HTTP_REFERER']);

?>