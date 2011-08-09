<?php
	/**
	 * Join a openlab action.
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

	if (($user instanceof ElggUser) && ($openlab instanceof ElggGroup))
	{
		//if (    (check_entity_relationship($openlab->guid, 'invited', $user->guid)) ||
                  //      $openlab->isPublicMembership())
                if ($openlab->isPublicMembership() || check_entity_relationship($openlab->guid,'invited',$user->guid ))
		{
			if ($openlab->join($user))
			{
				system_message(elgg_echo("openlabs:joined"));

				// Remove any invite or join request flags
				remove_entity_relationship($openlab->guid, 'invited', $user->guid);
                                remove_entity_relationship($openlab->guid, 'suggested', $user->guid);
				remove_entity_relationship($user->guid, 'membership_request', $openlab->guid);

				// add to river
				add_to_river('openlab_river/relationship/member/create','join',$user->guid,$openlab->guid);

				forward($openlab->getURL());
				exit;
			}
			else
				register_error(elgg_echo("openlabs:cantjoin"));
		}
		else
		{
			// Closed openlab, request membership
			system_message(elgg_echo('openlabs:privateopenlab'));
			forward(elgg_add_action_tokens_to_url($CONFIG->url . "action/openlabs/joinrequest?user_guid=$user_guid&openlab_guid=$openlab_guid"));
			exit;
		}
	}
	else
		register_error(elgg_echo("openlabs:cantjoin"));

	forward($_SERVER['HTTP_REFERER']);
	exit;
?>
