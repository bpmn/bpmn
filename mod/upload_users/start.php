<?php

/**
 * Upload users. Create user accounts by uploading a CSV file,
 *
 * @package upload_users
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jaakko Naakka / Mediamaisteri Group
 * @copyright Mediamaisteri Group 2009
 * @link http://www.mediamaisteri.com/
 */


/**
 * Profile init function; sets up the upload_users functions
 *
 */
function upload_users_init() {
	global $CONFIG;
	
	// Load the language file
	register_translations($CONFIG->pluginspath . "upload_users/languages/");
	
	// Extend system CSS with our own styles
	extend_view('css','upload_users/css');

	// Register a page handler, so we can have nice URLs
	register_page_handler('upload_users', 'upload_users_page_handler');
	
}


/**
 * upload_users page handler. Creates a fancy url for file index.php
 *
 * @param array $page Array of page elements, forwarded by the page handling mechanism
 */
function upload_users_page_handler($page) {		
	global $CONFIG;
		
	require_once($CONFIG->pluginspath . "upload_users/index.php");
}

/**
 * Add the upload_users option to the admin menu
 *
 */
function upload_users_pagesetup()
{
	if (get_context() == 'admin' && isadminloggedin()) {
		global $CONFIG;
		add_submenu_item(elgg_echo('upload_users:upload_users'), $CONFIG->wwwroot . 'pg/upload_users/');
	}
}


// Make sure the profile initialisation function is called on initialisation
register_elgg_event_handler('init', 'system', 'upload_users_init', 1);

/// Register pagesetup
register_elgg_event_handler('pagesetup', 'system', 'upload_users_pagesetup');



?>