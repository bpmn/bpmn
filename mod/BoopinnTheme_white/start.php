
<?php

/* * * Boopinn Theme
 * (c) Philippe Bressy (pbressy@gmail.com)
 *
 * START PAGE
 */

// Initialise the theme




function BoopinnTheme_white_init()	{
        // Extend system CSS with our own styles
	elgg_extend_view('css','BoopinnTheme_white/css');
	// Replace the default index page
	register_plugin_hook('index','system','custom_index');


}

 function custom_index($hook, $type, $return, $params) {
		if ($return == true) {
			// another hook has already replaced the front page
			return $return;
		}

		if (!include_once(dirname(__FILE__) . "/index.php")) {
			return false;
		}

		// return true to signify that we have handled the front page
		return true;
	}
	
register_elgg_event_handler('init','system','BoopinnTheme_white_init');