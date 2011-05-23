<?php

/**
 * Elgg river dashboard plugin
 *
 * @package ElggRiverDash
 */

function riverdashboard_wire_init() {

	global $CONFIG;

		elgg_extend_view('riverdashboard/welcome','riverdashboard_wire/welcome');
		elgg_extend_view('riverdashboard/sitemessage','riverdashboard_wire/refresh');

}
register_elgg_event_handler('init', 'system', 'riverdashboard_wire_init');
register_action("riverdashboard/wireadd", FALSE, $CONFIG->pluginspath . "riverdashboard_wire/actions/wireadd.php", TRUE);