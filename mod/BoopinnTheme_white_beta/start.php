
<?php

/*** Boopinn Theme
* (c) Philippe Bressy (pbressy@gmail.com)
*
* START PAGE
*/

// Initialise the theme



function BoopinnTheme_white_beta_init()	{
    // Extend system CSS with our own styles
    //extend_view('css','pluginname/css');
    // Replace the default index page
    register_plugin_hook('index','system','new_index');
}

function new_index() {
    if (!include_once(dirname(dirname(__FILE__)) . "/BoopinnTheme_white_beta/index.php"))
        return false;
 
    return true;
}
register_elgg_event_handler('init','system','BoopinnTheme_white_beta_init');

?>









