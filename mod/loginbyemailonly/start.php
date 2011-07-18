<?php
	
	/**
	 * Login by Email Only
	 * 
	 * @author Lenny Urbanowski
	 * @link http://community.elgg.org/pg/profile/itsLenny
	 * @copyright (c) Lenny Urbanowski 2010
	 * @license GNU General Public License (GPL) version 2
	 *
	 *
	 * Based on: Login by Email
	 * 
	 * @author Pedro Prez
	 * @link http://community.elgg.org/pg/profile/pedroprez
	 * @copyright (c) Keetup 2009
	 * @link http://www.keetup.com/
	 * @license GNU General Public License (GPL) version 2
	 */

	function loginbyemailonly_init()
	{
		global $CONFIG; 
		
		// Register actions
		register_action("register", true, $CONFIG->pluginspath . "loginbyemailonly/actions/register.php");		
		register_action("login", true, $CONFIG->pluginspath . "loginbyemailonly/actions/login.php");
		register_action("loginbyemailonly/requestnewpassword",true,$CONFIG->pluginspath . "loginbyemailonly/actions/requestnewpassword.php");
		register_action("usersettings/save",false,$CONFIG->pluginspath . "loginbyemailonly/actions/usersettings/save.php");
		
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
?>