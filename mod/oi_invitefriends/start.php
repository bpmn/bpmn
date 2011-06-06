<?php

/**
 * Elgg invite friends
 *
 * @package ElggInviteFriends
 */

register_elgg_event_handler('init', 'system', 'oi_invitefriends_init');

/**
 * Invite friends initialization
 */
function oi_invitefriends_init() {
	global $CONFIG;

	register_page_handler('oi_invitefriends', 'oi_invitefriends_page_handler');

	register_elgg_event_handler('pagesetup', 'system', 'oi_invitefriends_menu_setup');

	$action_base = $CONFIG->pluginspath . 'oi_invitefriends/actions';
	register_action('oi_invitefriends/invite', false, "$action_base/invite.php");
}

/**
 * Load the invite friends page
 */
function oi_invitefriends_page_handler() {
	global $CONFIG;
	require "{$CONFIG->pluginspath}oi_invitefriends/index.php";
}

/**
 * Add menu item for invite friends
 */
function oi_invitefriends_menu_setup() {
	global $CONFIG;
	$context = get_context();
	if ($context == "friends" || $context == "friendsof" || $context == "collections") {
		$url = "{$CONFIG->wwwroot}pg/oi_invitefriends/";
		add_submenu_item(elgg_echo('friends:invite'), $url, 'invite');
	}
}
