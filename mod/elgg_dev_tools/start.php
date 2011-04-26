<?php
/**
 * Elgg Development Tools
 *
 * @package Elgg Developer Tools
 * @author Cash Costello
 * @author Aaron Saray (102degrees.com)
 */

/**
 * Dev Tools initialization
 */
function elgg_dev_tools_init() {
	global $CONFIG;

	// if enabled, we include this for every user
	require_once dirname(__FILE__) . '/includes/ElggDevTools.php';
	ElggDevTools::launcher();

	elgg_extend_view('css', 'elgg_dev_tools/css');

	register_elgg_event_handler('pagesetup', 'system', 'elgg_dev_tools_pagesetup');

	register_page_handler('elgg_dev_tools', 'elgg_dev_tools_page_handler');

	register_action("elgg_dev_tools/updatesettings", FALSE, $CONFIG->pluginspath ."elgg_dev_tools/actions/updatesettings.php", TRUE);
	register_action("elgg_dev_tools/buildplugin", FALSE, $CONFIG->pluginspath ."elgg_dev_tools/actions/buildplugin.php", TRUE);

	// this should only run when HTML is produced and Elgg makes this difficult to determine
	//if ((int)get_plugin_setting('htmllog', 'elgg_developer_tools') != 0) {
	//	elgg_dev_setup_html_debugging();
	//}
}

/**
 * page handler for nicer urls
 */
function elgg_dev_tools_page_handler($page) {
	global $CONFIG;

	// only include javascript on dev tools pages
	elgg_extend_view('metatags', 'header/elgg_dev_tools');

	$tab = $page[0];
	if (!$tab) {
		$tab = "settings";
	}

	set_input("tab", $tab);
	require $CONFIG->pluginspath . "elgg_dev_tools/index.php";

	return TRUE;
}

/**
 * Add admin menu item
 */
function elgg_dev_tools_pagesetup() {
	if (get_context() == 'admin') {
		global $CONFIG;
		add_submenu_item(elgg_echo('elgg_dev_tools:adminlink'), $CONFIG->wwwroot . 'pg/elgg_dev_tools/');
	}
}

/**
 * Write out page creation time (PHP + MySQL time)
 */
function elgg_dev_tools_shutdown_hook() {
	global $CONFIG, $START_MICROTIME;

	// run if timing is turned on and debug trace level not set to notice
	// Elgg core handles this if debug set to NOTICE
	if (!isset($CONFIG->debug) || $CONFIG->debug != 'NOTICE') {
		$creation_time = (float)(microtime(TRUE) - $START_MICROTIME);
		error_log("Page {$_SERVER['REQUEST_URI']} generated in $creation_time seconds");
	}
}

/**
 * Post-process a view to add a wrapper div
 */
function elgg_dev_tools_outline_views($hook, $entity_type, $returnvalue, $params) {
	global $CONFIG;

	if (elgg_get_viewtype() != "default") {
		return;
	}

	$excluded_bases = array('css', 'js', 'input', 'output', 'embed', 'pageshells', 'metatags', 'icon',);

	$excluded_views = array('page_elements/header', 'page_elements/header_contents', 'page_elements/footer',
			'riverdashboard/js', );

	$view = $params['view'];

	$view_hierarchy = explode('/',$view);
	if (in_array($view_hierarchy[0], $excluded_bases)) {
		return;
	}

	if (in_array($view, $excluded_views)) {
		return;
	}

	$return_data = "<div id=\"view-$view\">$returnvalue</div>";


	return $return_data;
}

/**
 * Clear all the strings so the raw descriptor strings are displayed
 */
function elgg_dev_clear_strings() {
	global $CONFIG;

	$language = get_language();
	$CONFIG->translations[$language] = array();
	$CONFIG->translations['en'] = array();
}

/**
 * Log the events and plugin hooks
 */
function elgg_dev_log_events($name, $type) {

	// filter out some very common events
	if ($name == 'view' || $name == 'display' || $name == 'log') {
		return;
	}
	if ($name == 'session:get' || $name == 'validate') {
		return;
	}

	$stack = debug_backtrace();
	if ($stack[1]['function'] == 'events') {
		$event_type = 'Event';
	} else {
		$event_type = 'Plugin hook';
	}
	$function = $stack[3]['function'] . '()';
	if ($function == 'require_once' || $function == 'include_once') {
		$function = $stack[3]['file'];
	}
	error_log(sprintf(elgg_echo('elgg_dev_tools:event_log_msg'),
					$event_type,
					$name,
					$type,
					$function));

	unset($stack);
}

/**
 * Sets up Elgg to display debugging information to footer
 */
function elgg_dev_setup_html_debugging() {
	global $ELGG_DEV_LOG;

	$ELGG_DEV_LOG = array();

	register_plugin_hook('debug', 'log', 'elgg_dev_logger');

	elgg_extend_view('page_elements/footer', 'elgg_dev_tools/footer', 1);
}

/**
 * Cache debugging and logging for later display
 */
function elgg_dev_logger($name, $type, $returnvalue, $params) {
	global $ELGG_DEV_LOG;

	$ELGG_DEV_LOG[] = $params['msg'];

	return FALSE;
}

// start the ElggDevTools as soon as possible (it is not recommended for other plugins to do this!)
elgg_dev_tools_init();
//register_elgg_event_handler('init', 'system', 'elgg_dev_tools_init', 1);
