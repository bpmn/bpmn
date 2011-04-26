<?php
	/**
	 * Leave a openlab action.
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	// Load configuration
	global $CONFIG;
	
	gatekeeper();
	
	$user_guid = get_input('user_guid');
	$openlab_guid = get_input('openlab_guid');
	
	$user = NULL;
	if (!$user_guid) $user = $_SESSION['user'];
	else
		$user = get_entity($user_guid);
		
	$openlab = get_entity($openlab_guid);
	
	if (($user instanceof ElggUser) && ($openlab instanceof ElggGroup))
	{
		if ($openlab->getOwner() != $_SESSION['guid']) {
			if ($openlab->leave($user))
				system_message(elgg_echo("openlabs:left"));
			else
				register_error(elgg_echo("openlabs:cantleave"));
		} else {
			register_error(elgg_echo("openlabs:cantleave"));
		}
	}
	else
		register_error(elgg_echo("openlabs:cantleave"));
		
	forward($_SERVER['HTTP_REFERER']);
	exit;
?>