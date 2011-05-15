<?php

/**
 * Invite a user to join a openlab
 *
 * @package Elggopenlabs from ElggGroups
 */

// Load configuration
global $CONFIG;

gatekeeper();

$logged_in_user = get_loggedin_user();

$user_guid = get_input('user_guid');
if (!is_array($user_guid))
	$user_guid = array($user_guid);
$openlab_guid = get_input('openlab_guid');

if (sizeof($user_guid))
{
	foreach ($user_guid as $u_id)
	{
		$user = get_entity($u_id);
		$openlab = get_entity($openlab_guid);

		if ( $user && $openlab) {

			if (($openlab instanceof ElggGroup) && ($openlab->canEdit()))
			{
				if (!check_entity_relationship($openlab->guid, 'invited', $user->guid))
				{
						// Create relationship
						add_entity_relationship($openlab->guid, 'invited', $user->guid);

						// Send email
						$url = "{$CONFIG->url}pg/openlabs/invitations/{$user->username}";
						if (notify_user($user->getGUID(), $openlab->owner_guid,
								sprintf(elgg_echo('openlabs:invite:subject'), $user->name, $openlab->name),
								sprintf(elgg_echo('openlabs:invite:body'), $user->name, $logged_in_user->name, $openlab->name, $url),
								NULL))
							system_message(elgg_echo("openlabs:userinvited"));
						else
							register_error(elgg_echo("openlabs:usernotinvited"));
				}
				else
					register_error(elgg_echo("openlabs:useralreadyinvited"));
			}
			else
				register_error(elgg_echo("openlabs:notowner"));
		}
	}
}

forward($_SERVER['HTTP_REFERER']);

?>
