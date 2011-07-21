<?php

	/**
	 * Add a user to a openlab
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

				//if (get_loggedin_userid() == $openlab->owner_guid)
				if ($openlab->canEdit())
				{

					// If the openlab is open or the user has requested membership
					if (
						(check_entity_relationship($user->guid, 'membership_request', $openlab->guid)) ||
						($openlab->isPublicMembership())
						)
					{

						if (!$openlab->isMember($user))
						{
							// Remove relationships
							remove_entity_relationship($openlab->guid, 'invited', $user->guid);
							remove_entity_relationship($user->guid, 'membership_request', $openlab->guid);

							//add_entity_relationship($user->guid, 'member', $openlab->guid);
							$openlab->join($user);

                                                        //add to river
                                                        add_to_river('openlab_river/relationship/member/create','join',$user->guid,$openlab->guid);

                                                        // send welcome email
							notify_user($user->getGUID(), $openlab->owner_guid,
								sprintf(elgg_echo('openlabs:welcome:subject'), $openlab->name),
								sprintf(elgg_echo('openlabs:welcome:body'), $user->name, $openlab->name, $openlab->getURL()),
								NULL);

							system_message(elgg_echo('openlabs:addedtoopenlab'));
						}
						else
							register_error(elgg_echo("openlabs:cantjoin"));
					}
					else
					{
						if ($user->isFriend())
						{

							// Create relationship
							add_entity_relationship($openlab->guid, 'invited', $user->guid);

							// Send email
							$url = "{$CONFIG->url}pg/openlabs/invited?user_guid={$user->guid}&openlab_guid={$openlab->guid}";
							if (notify_user($user->getGUID(), $openlab->owner_guid,
									sprintf(elgg_echo('openlabs:invite:subject'), $user->name, $openlab->name),
									sprintf(elgg_echo('openlabs:invite:body'), $user->name, $logged_in_user->name, $openlab->name, $url),
									NULL))
								system_message(elgg_echo("openlabs:userinvited"));
							else
								register_error(elgg_echo("openlabs:usernotinvited"));

						}
						else
							register_error(elgg_echo("openlabs:usernotinvited"));
					}
				}
				else
					register_error(elgg_echo("openlabs:notowner"));
			}
		}
	}

	forward($_SERVER['HTTP_REFERER']);

?>
