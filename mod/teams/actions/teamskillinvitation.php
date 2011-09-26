<?php
	/**
	 * Delete an invitation to join a closed group.
	 *
	 * @package ElggGroups
	 */

	// Load configuration
	global $CONFIG;

	gatekeeper();

        //pour pouvoir refuser les invit aux teams privée
        $ignoreacess = elgg_get_ignore_access();
        elgg_set_ignore_access(True);

	$user_guid = get_input('user_guid', get_loggedin_userid());
	$group_guid = get_input('group_guid');

	$user = get_entity($user_guid);
	$group = get_entity($group_guid);

	// If join request made
			if (check_entity_relationship($group->guid, 'invited', $user->guid))
			{
				remove_entity_relationship($group->guid, 'invited', $user->guid);
				system_message(elgg_echo("teams:invitekilled"));
			}


        //pour pouvoir refuser les invit aux teams privée
        elgg_set_ignore_access($ignoreacess);

	forward($_SERVER['HTTP_REFERER']);

?>