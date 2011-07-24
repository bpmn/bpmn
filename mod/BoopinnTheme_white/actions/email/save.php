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

	require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/engine/start.php");
	global $CONFIG;

	gatekeeper();
	
	$email = get_input('email');
	$user_id = get_input('guid');
	$user = "";
	
	if (!$user_id) {
		$user = $_SESSION['user'];
	}
	else {
		$user = get_entity($user_id);
	}
		
	if ($user) {
		if ($user->email != $email) {
			#validate mail
			if (is_email_address($email)) {
				if ((!$allow_multiple_emails) && (get_user_by_email($email))) {
					register_error(elgg_echo('registration:dupeemail'));
					forward($_SERVER['HTTP_REFERER']);
					exit;
				} else {
					$user->email = $email;
					if ($user->save()) {
						system_message(elgg_echo('email:save:success'));
					} else {
						register_error(elgg_echo('email:save:fail'));
					}
				}
			} else {
				register_error(elgg_echo('registration:emailnotvalid'));
				forward($_SERVER['HTTP_REFERER']);
				exit;
			}
		}
	}
	else {
		register_error(elgg_echo('email:save:fail'));
	}
?>