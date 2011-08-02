
<?php

/*** Boopinn Theme
* (c) Philippe Bressy (pbressy@gmail.com)
*
* START PAGE
*/

// Initialise the theme

    
 



    function BoopinnTheme_white_init()	{
        // Extend system CSS with our own styles
			elgg_extend_view('css','css');
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



function loginbyemailonly_init()
{
	global $CONFIG; 
	
	// Register actions
	register_action("register", true, $CONFIG->pluginspath . "BoopinnTheme_white/actions/register.php");		
	register_action("login", true, $CONFIG->pluginspath . "BoopinnTheme_white/actions/login.php");
	register_action("loginbyemailonly/requestnewpassword",true,$CONFIG->pluginspath . "BoopinnTheme_white/actions/requestnewpassword.php");
	register_action("usersettings/save",false,$CONFIG->pluginspath . "BoopinnTheme_white/actions/usersettings/save.php");
	
	register_plugin_hook('usersettings:save:loginbyemailonly','user','users_settings_save_loginbyemailonly');
	
	register_pam_handler('pam_auth_emailpass');

}
	
//Load functions
require_once(dirname(__FILE__) . "/auth_functions.php");

function users_settings_save_loginbyemailonly()
{
	global $CONFIG;

	@include($CONFIG->path . "actions/user/name.php");
	@include($CONFIG->path . "actions/user/password.php");
	@include(dirname(__FILE__) .  "/actions/email/save.php");
	@include($CONFIG->path . "actions/user/language.php");
}
	
/**
 * Generate and send a password request email to a given user's registered email address.
 * This is a modified default function, which send the username to the email.
 * @param int $user_guid
 */
function send_new_password_request_with_username($user_guid)
{
	global $CONFIG;
	
	$user_guid = (int)$user_guid;
	
	$user = get_entity($user_guid);
	if ($user)
	{
		// generate code
		$code = generate_random_cleartext_password();
		//create_metadata($user_guid, 'conf_code', $code,'', 0, ACCESS_PRIVATE);
		set_private_setting($user_guid, 'passwd_conf_code', $code);
			
		// generate link
		$link = $CONFIG->site->url . "pg/resetpassword?u=$user_guid&c=$code";
			
		// generate email
		$email = sprintf(elgg_echo('email:resetreq:body:wusername'), $user->name, $_SERVER['REMOTE_ADDR'], $user->username, $link);
			
		return notify_user($user->guid, $CONFIG->site->guid, elgg_echo('email:resetreq:subject'), $email, NULL, 'email');

	}
		
	return false;
}
	
// Initialise
register_elgg_event_handler('init','system','loginbyemailonly_init');


	function registrationterms_init()
	{
		global $CONFIG;

		//put the terms agreement at the very end
		extend_view('register/extend', 'registrationterms/register', 1000);
		
		//block user registration if they don't check the box
		register_plugin_hook('action', 'register', 'registrationterms_register_hook');
	}
	
	function registrationterms_register_hook()
	{
		if (get_input('agreetoterms',false) != 'true') {
			register_error(elgg_echo('agreetoterms:required'));
			forward($_SERVER['HTTP_REFERER']);
		}
	}
	
	register_elgg_event_handler('init', 'system', 'registrationterms_init');












