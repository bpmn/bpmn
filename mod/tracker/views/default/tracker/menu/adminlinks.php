<?php
/**
 * Elgg Tracker plugin
 * @license: GPL v 2.
 * @author slyhne
 * @copyright Zurf.dk
 * @link http://zurf.dk/elgg
 */

global $CONFIG;

if (isadminloggedin()) {
	// Get GUID of the user who owns this profile
	$owner_guid = $vars['entity']->guid;
 
	// Get owner entity
	$owner_ent = get_entity($owner_guid);
 
	// Get IP address
	$ip_address = $owner_ent->ip_address;

	// Create tracker link
	$tracker_link = "<a href=\"{$CONFIG->wwwroot}pg/tracker/{$ip_address}\">" . elgg_echo('tracker:adminlink') . "</a>";
 
	echo $tracker_link;

}
?>
