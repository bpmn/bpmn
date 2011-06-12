<?php
/**
 * User requests to join a closed openlab.
 *
 * @package Elggopenlabs from ElggGroups
 */

// Load configuration
global $CONFIG;

gatekeeper();

$user_guid = get_input('user_guid', get_loggedin_userid());
$openlab_guid = get_input('openlab_guid');


// @todo fix for #287
// disable access to get entity.
$invitations = openlabs_get_invited_openlabs($user_guid, TRUE);

if (in_array($openlab_guid, $invitations)) {
	$ia = elgg_set_ignore_access(TRUE);
}


$user = get_entity($user_guid);
$openlab = get_entity($openlab_guid);

// If not a member of this openlab
if (($openlab) && ($user) && (!$openlab->isMember($user)))
{
	// If open openlab or invite exists
	if (
		($openlab->isPublicMembership()) ||
		(check_entity_relationship($openlab->guid, 'invited', $user->guid))
	)
	{
		//$ia = elgg_set_ignore_access(TRUE);
		if ($openlab->join($user))
		{
			// Remove relationships
                        remove_entity_relationship($openlab->guid, 'suggested', $user->guid);
			remove_entity_relationship($openlab->guid, 'invited', $user->guid);
			remove_entity_relationship($user->guid, 'membership_request', $openlab->guid);

			// openlab joined
			system_message(elgg_echo('openlabs:joined'));
			elgg_set_ignore_access($ia);

			forward($openlab->getURL());
			exit;
		}
		else {
			elgg_set_ignore_access($ia);
			system_message(elgg_echo('openlabs:cantjoin'));
		}
	}
	else
	{
		// If join request not already made
		if (!check_entity_relationship($user->guid, 'membership_request', $openlab->guid))
		{
			// Remove relationships
                        remove_entity_relationship($openlab->guid, 'suggested', $user->guid);
                        // Add membership requested
			add_entity_relationship($user->guid, 'membership_request', $openlab->guid);

			// Send email
			$url = "{$CONFIG->url}mod/openlabs/membershipreq.php?openlab_guid={$openlab->guid}";
			if (notify_user($openlab->owner_guid, $user->getGUID(),
					sprintf(elgg_echo('openlabs:request:subject'), $user->name, $openlab->name),
					sprintf(elgg_echo('openlabs:request:body'), $openlab->getOwnerEntity()->name, $user->name, $openlab->name, $user->getURL(), $url),
					NULL))
				system_message(elgg_echo("openlabs:joinrequestmade"));
			else
				register_error(elgg_echo("openlabs:joinrequestnotmade"));
		}
		else
			system_message(elgg_echo("openlabs:joinrequestmade"));
	}
}

forward($_SERVER['HTTP_REFERER']);