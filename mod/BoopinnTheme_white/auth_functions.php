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

	
	#PAM AUTHENTIFICATION
	function pam_auth_emailpass($credentials = NULL) {
		if (is_array($credentials) && ($credentials['email']) && ($credentials['password'])) {
			if ($user = get_user_by_email($credentials['email'])) {
				if(is_array($user)) {
					$user =	array_shift($user);
					
					// Let admins log in without validating their email, but normal users must have validated their email
					if ((!$user->admin) && (!$user->validated) && (!$user->admin_created)) {
						return false;
					}	
					
					if ($user->password == generate_user_password($user, $credentials['password'])) { 
						return true;
					}	
				}
            }
		}
		return false;
	}
		
	#AUTHENTIFICATION BY MAIL
	function authenticate_by_email($email, $password) {
		if (pam_authenticate(array('email' => $email, 'password' => $password))) {
			$user = get_user_by_email($email);
			if(is_array($user)) {
				return array_shift($user);
			}
		}
		return false;
	}
	
?>