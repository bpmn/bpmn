<?php
	/**
	 * Stop following an entity
	 *
	 * @package Elggopenlabs from ElggGroups
	 */

	// Load configuration
	global $CONFIG;

	gatekeeper();

	$user_guid = get_input('user_guid', get_loggedin_userid());
	$entity_guid = get_input('entity_guid');

	$user = get_entity($user_guid);
	$entity = get_entity($entity_guid);

	// If join request made
			if (check_entity_relationship($user->guid, 'follow', $entity->guid))
			{
				remove_entity_relationship($user->guid, 'follow', $entity->guid);
				system_message(sprintf(elgg_echo("follow:stopfollow"),$entity->name));
			}

	forward($_SERVER['HTTP_REFERER']);

?>
