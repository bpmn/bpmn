<?php

/**
 * Invite a user to join a group
 *
 * @package ElggGroups
 */

// Load configuration
global $CONFIG;

gatekeeper();
$forward_url=get_input('forward_url');
$logged_in_user = get_loggedin_user();

$group_guid = get_input('group_guid');
if (!is_array($group_guid))
	$group_guid = array($group_guid);
$user_guid = get_input('user_guid');

if (sizeof($group_guid))
{
	foreach ($group_guid as $u_id)
	{
		$group = get_entity($u_id);
		$user = get_entity($user_guid);


		if ( $user && $group) {

			if (($group instanceof ElggGroup) && $group->isMember())
			{
				if (!($relation=check_entity_relationship($user->guid, 'member', $group->guid)) && !($relation=check_entity_relationship($group->guid, 'invited', $user->guid)) && !($relation=check_entity_relationship($group->guid, 'suggested', $user->guid)) )
				{


						// Create relationship
						add_entity_relationship($group->guid, 'suggested', $user->guid);

						// Send email
						$url = "{$CONFIG->url}pg/openlabs/suggestions/{$user->username}";
						if (notify_user($user->getGUID(), $logged_in_user->getGUID(),
								sprintf(elgg_echo("openlabs:suggest:subject"), $user->name, $group->name),
								sprintf(elgg_echo("openlabs:suggest:body"), $user->name, $logged_in_user->name, $group->name, $url),
								NULL))
							system_message(elgg_echo("openlabs:usersuggested"));
						else
							register_error(elgg_echo("openlabs:usernotsuggested"));

					//}
					//else
					//	register_error(elgg_echo("teams:usernotinvited"));
				}
				else {
                                    switch($relation->relationship){
                                        case 'member':
                                            system_message(sprintf(elgg_echo("openlabs:useralreadymember"),$user->name,$group->name));
                                            break;
                                        case 'invited':
                                            system_message(sprintf(elgg_echo("openlabs:useralreadyinvited"),$user->name,$group->name));
                                            break;
                                        case 'suggested':
                                            system_message(sprintf(elgg_echo("openlabs:useralreadysuggested"),$group->name,$user->name));
                                            break;

                                    }
                                }

                        }
			else
				register_error(elgg_echo("openlabs:notowner"));
		}
	}
    
}
forward($forward_url);

?>
