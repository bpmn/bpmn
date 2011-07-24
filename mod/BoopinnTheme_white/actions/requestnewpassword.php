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

	global $CONFIG;
	
	$username = get_input('username');
	
	$access_status = access_get_show_hidden_status();
	access_show_hidden_entities(true);
	$user = get_user_by_email($username);

	if(is_array($user))
		$user = array_shift($user);

	if ($user) {
		if ($user->validated) {
			if (send_new_password_request_with_username($user->guid)) {
				system_message(elgg_echo('user:password:resetreq:success'));
			} else {
				register_error(elgg_echo('user:password:resetreq:fail'));
			}
		} else if (!trigger_plugin_hook('unvalidated_requestnewpassword','user',array('entity'=>$user))) {
			// if plugins have not registered an action, the default action is to
			// trigger the validation event again and assume that the validation
			// event will display an appropriate message
			trigger_elgg_event('validate', 'user', $user);
		}
	} else {
		register_error(sprintf(elgg_echo('user:username:notfound'), $username));
	}
	
	access_show_hidden_entities($access_status);
	forward();
	exit;	
	
?>