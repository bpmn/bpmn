<?php

	/**
	 * Add a user to a group
	 *
	 * @package ElggGroups
	 */

	// Load configuration
	global $CONFIG;

	gatekeeper();

	$logged_in_user = get_loggedin_user();

	$user_guid = get_input('user_guid');
	if (!is_array($user_guid))
		$user_guid = array($user_guid);

	$entity_guid = get_input('entity_guid');

	if (sizeof($user_guid))
	{
		foreach ($user_guid as $u_id)
		{
			$user = get_entity($u_id);
			$entity = get_entity($entity_guid);

			if ( $user && $entity) {

                            if (!check_entity_relationship($user->guid, 'follow', $entity->guid)){
                                    if ($entity instanceof ElggGroup)
                                    {
                                        if ($entity->isMember($user))
                                        {
                                            register_error(sprintf(elgg_echo("follow:alreadymember"),$entity->name));
                                            forward($_SERVER['HTTP_REFERER']);
                                        }
                                    }
                                

                                    add_entity_relationship($user->guid, 'follow', $entity->guid);
                                    system_message(sprintf(elgg_echo('follow:startfollow'),$entity->name));
							
				}else
                                    register_error(sprintf(elgg_echo('follow:alreadyfollow'),$entity->name));

						
			}
		}
	}

	forward($_SERVER['HTTP_REFERER']);

?>
