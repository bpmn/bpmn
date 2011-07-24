<?php

/**
 * Boopinn dashboard plugin
 *
 */

function boopinn_dashboard_init() {

		register_page_handler('dashboard', 'boopinn_dashboard_page_handler');

	// Page handler
	register_page_handler('activity', 'boopinn_dashboard_page_handler');

	elgg_extend_view('css', 'BoopinnTheme_white/css');

}

/**
 * Page handler for dash
 *
 * @param array $page
 */
function boopinn_dashboard_page_handler($page) {

	include(dirname(__FILE__) . "/index.php");
	return TRUE;
}

function boopinn_dashboard() {

	include(dirname(__FILE__) . '/index.php');
}

register_elgg_event_handler('init', 'system', 'boopinn_dashboard_init');

