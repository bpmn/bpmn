<?php
/**
 * Elgg Tracker plugin
 * @license: GPL v 2.
 * @author slyhne
 * @copyright Zurf.dk
 * @link http://zurf.dk/elgg
 */

function tracker_init() {
	global $CONFIG;

	// Show IP address on profile
	if (isadminloggedin()) {
		if (get_plugin_setting('tracker_display', 'tracker') == 'profile') {
			elgg_extend_view('profile/status', 'tracker/profile_ip');
		} else {
			elgg_extend_view('profile/menu/adminlinks','tracker/menu/adminlinks');
		}
	}

	// Register a page handler, so we can have nice URLs
	register_page_handler('tracker','tracker_page_handler');

	// Extend system CSS with our own styles, which are defined in the tracker/css view
	elgg_extend_view('css','tracker/css');

}	

// Log IP at login
register_elgg_event_handler('login', 'user', 'tracker_log_ip');
// Log IP at register
register_elgg_event_handler('create', 'user', 'tracker_log_ip');

// Function to save IP address on login
function tracker_log_ip($event, $object_type, $object) {
	if (($object) && ($object instanceof ElggUser)) {
		// Try to get IP address
		if (isset($_SERVER["REMOTE_ADDR"])) {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		} elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
		}

		if (!empty($ip_address)) {
			create_metadata($object->guid, 'ip_address', $ip_address, '', 0, ACCESS_PUBLIC);
		}
	}
}

function tracker_page_handler($page) {
		
	global $CONFIG;

	set_input('ip', $page[0]);
	include(dirname(__FILE__) . "/index.php");		
}


register_elgg_event_handler('init','system','tracker_init');
register_elgg_event_handler('pagesetup', 'system', 'tracker_pagesetup');
?>
