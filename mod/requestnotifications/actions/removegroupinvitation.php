<?php
	/**
	 * RequestNotifications action for removing declined invitations
	 * 
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */

	// Load configuration
	global $CONFIG;
	
	gatekeeper();
	
	$user_guid = get_input('user_guid', get_loggedin_userid());
	$group_guid = get_input('group_guid');
	
	$user = get_entity($user_guid);
	$group = get_entity($group_guid);
	
	// If invitation made
	if (check_entity_relationship($group->guid, 'invited', $user->guid))
	{
		remove_entity_relationship($group->guid, 'invited', $user->guid);
		system_message(elgg_echo("requestnotifications:invitationdeclined"));
	} 
	
	forward($_SERVER['HTTP_REFERER']);
?>