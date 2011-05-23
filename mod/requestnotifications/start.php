<?php

	/**
	 * RequestNotifications
	 * 
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */

		function requestnotifications_init() {
			// Add the CSS code
			extend_view('css','requestnotifications/css');
			// Try to add this to the riverdashboard (for adding side box to the default riverdashboard check the readme.txt file)
			if (is_plugin_enabled('riverdashboard'))
				extend_view('riverdashboard/sidebar_extend', 'requestnotifications/sidebox');
			// Add the widget
			add_widget_type('requestnotifications',elgg_echo('requestnotifications:widget:title'),elgg_echo('requestnotifications:widget:description'), 'dashboard');
			// Add widget link if the widgetlinks plugin is enabled
			if (is_plugin_enabled('widgetlinks'))
				add_widget_title_link('requestnotifications', '[BASEURL]pg/requestnotifications/');
			// Register a page handler, so we can have nice URLs for the notifications main page
			register_page_handler('requestnotifications','requestnotifications_page_handler');
		}
	
		/**
		* RequestNotifications page handler.
		*
		* @param array $page
		*/
		function requestnotifications_page_handler($page)
		{
			global $CONFIG;
			
			include($CONFIG->pluginspath . "requestnotifications/index.php");
		}

		global $CONFIG;
		
		//　Register the init event handler
		register_elgg_event_handler('init','system','requestnotifications_init');
	
		// Register actions
		register_action("requestnotifications/removegroupinvitation",false,$CONFIG->pluginspath . "requestnotifications/actions/removegroupinvitation.php");
		register_action("requestnotifications/removesharedbookmark",false,$CONFIG->pluginspath . "requestnotifications/actions/removesharedbookmark.php");
?>