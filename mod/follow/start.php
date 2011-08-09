<?php

/**
 * Elgg follow plugin
 *
 * @package Elggfollow
 */

// Bookmarks initialisation function
function follow_init() {

	// Grab the config global
	global $CONFIG;

	//add a tools menu option
	if (isloggedin()) {
		add_menu(elgg_echo('follow'), $CONFIG->wwwroot . "pg/follow/" . $_SESSION['user']->username);

	}

	// Register a page handler, so we can have nice URLs
	register_page_handler('follow','follow_page_handler');

	// Add our CSS
	elgg_extend_view('css','follow/css');

	
}



/**
 * Bookmarks page handler; allows the use of fancy URLs
 *
 * @param array $page From the page_handler function
 * @return true|false Depending on success
 */
function follow_page_handler($page) {

    set_input('username', $page[0]);
    include(dirname(__FILE__) . "/index.php");
    return true;
}







// Make sure the initialisation function is called on initialisation
register_elgg_event_handler('init','system','follow_init');


// Register actions
global $CONFIG;
register_action('follow/add_follow',false,$CONFIG->pluginspath . "follow/actions/add_follow.php");
register_action('follow/stop_follow',false,$CONFIG->pluginspath . "follow/actions/stop_follow.php");

?>