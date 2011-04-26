<?php
/**
 * Elgg Developer Tools Main Logic
 * 
 * This page holds the Elgg Developer Tools Main Logic class
 * 
 * @package Elgg Developer Tools
 * @author Aaron Saray (102degrees.com)
 * @author Cash Costello
 */

class ElggDevTools 
{
	/**
	 * Launcher executes functionality on plugin init  
	 * 
	 * Launcher is responsible for querying the settings and running anything
	 * that is demanded to run initially.
	 */
	public static function launcher()
	{
		$displayerrors = get_plugin_setting('displayerrors', 'elgg_developer_tools');
		if ($displayerrors) {
			ini_set('display_errors', 1);
		}

        $errorlog = get_plugin_setting('errorlog', 'elgg_developer_tools');
        if ($errorlog) {
			ini_set('error_log', datalist_get('dataroot') . "debug.log");
		}
        
        $exceptionhandler = get_plugin_setting('exceptionhandler', 'elgg_developer_tools');
        if ($exceptionhandler) {
			restore_exception_handler ();
		}

        $errorhandler = get_plugin_setting('errorhandler', 'elgg_developer_tools');
        if ($errorhandler) {
			restore_error_handler ();
		}
         		        
		/** include firePHP if need be **/
		$firephp = get_plugin_setting('enablefirephp', 'elgg_developer_tools');
		if ($firephp) {
			require_once dirname(__FILE__) . '/firephp/FirePHP.class.php';
			require_once dirname(__FILE__) . '/firephp/fb.php';
		} else {
			require_once dirname(__FILE__) . '/FirePHPDisabled.php';
		}
		
		$timing = get_plugin_setting('timing', 'elgg_developer_tools');
		if ($timing) {
			register_elgg_event_handler('shutdown', 'system', 'elgg_dev_tools_shutdown_hook');
		}
		$showviews = get_plugin_setting('showviews', 'elgg_developer_tools');
		if ($showviews) {
			register_plugin_hook('display', 'view', 'elgg_dev_tools_outline_views');
		}

		$showstrings = get_plugin_setting('showstrings', 'elgg_developer_tools');
		if ($showstrings) {
			// first and last in case a plugin registers a translation in an init method
			register_elgg_event_handler('init', 'system', 'elgg_dev_clear_strings', 1000);
			register_elgg_event_handler('init', 'system', 'elgg_dev_clear_strings', 1);
		}

		$logevents = get_plugin_setting('logevents', 'elgg_developer_tools');
		if ($logevents) {
			register_plugin_hook('all', 'all', 'elgg_dev_log_events');
			register_elgg_event_handler('all', 'all', 'elgg_dev_log_events');
		}

	}
}
