<?php
	/**
	 * RequestNotifications action for removing shared bookmarks
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
	$bookmark_guid = get_input('bookmark_guid');
	
	$user = get_entity($user_guid);
	$bookmark = get_entity($bookmark_guid);
	
	// If bookmark shared made
	if (check_entity_relationship($bookmark->guid, 'share', $user->guid))
	{
		remove_entity_relationship($bookmark->guid, 'share', $user->guid);
		system_message(elgg_echo("requestnotifications:bookmarkshareremoved"));
	} 
	
	forward($_SERVER['HTTP_REFERER']);
?>