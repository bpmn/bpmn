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

$group_guid=array();

if (is_array(get_input('group_guid_openlab')))
    $group_guid = get_input('group_guid_openlab');

if (is_array(get_input('group_guid_team')))
    $group_guid=array_merge($group_guid,get_input('group_guid_team'));



if (!is_array($group_guid))
	$group_guid = array($group_guid);
$user_guid = get_input('user_guid');

if (sizeof($group_guid))
{
	foreach ($group_guid as $u_id)
	{
		$group = get_entity($u_id);
		$user = get_entity($user_guid);
                
                $subtype_entity=get_subtype_from_id($group->subtype);
                switch ($subtype_entity) {
			case 'teams':
                            break;
                        case 'openlab':
                            $subtype_entity='openlabs';
                            break;
                }

		if ( $user && $group) {

			if (($group instanceof ElggGroup) && ($group->canEdit()))
			{
				if (!($invited=check_entity_relationship($group->guid, 'invited', $user->guid))&& !($member=check_entity_relationship($user->guid, 'member', $group->guid)))
				{
					//if ($user->isFriend())
					//{

						// Create relationship
						add_entity_relationship($group->guid, 'invited', $user->guid);

						// Send email
						$url = "{$CONFIG->url}pg/{$subtype_entity}/invitations/{$user->username}";
						if (notify_user($user->getGUID(), $group->owner_guid,
								sprintf(elgg_echo("$subtype_entity:invite:subject"), $user->name, $group->name),
								sprintf(elgg_echo("$subtype_entity:invite:body"), $user->name, $logged_in_user->name, $group->name, $url),
								NULL))
							system_message(elgg_echo("$subtype_entity:userinvited"));
						else
							register_error(elgg_echo("$subtype_entity:usernotinvited"));

					//}
					//else
					//	register_error(elgg_echo("teams:usernotinvited"));
				}
				elseif ($member)
                                    register_error(printf(elgg_echo("$subtype_entity:useralreadymember"),$user->name,$group->name));
                                    elseif ($invited)
                                        register_error(printf(elgg_echo("$subtype_entity:useralreadyinvited"),$user->name,$group->name));

					
			}
			else
				register_error(elgg_echo("$subtype_entity:notowner"));
		}
	}
}


forward($forward_url);

?>