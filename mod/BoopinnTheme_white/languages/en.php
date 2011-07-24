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

	$english = array(
			'register:error:nameshort' => "The display name you entered is to short",
			'register:error:emailshort' => "The e-mail address you entered is invalid",
			'register:error:passwordshort' => "The password you entered was too short",
			'register:error:passwordmatch' => "The passwords you entered didn't match",
			'register:error:emailtaken' => "There is already an account registered for that e-mail address (try logging in)",
			'user:email:notfound' => 'Email %s not found.',
			'username/email' => 'Username/Email',
			'email:resetreq:body:wusername' => "Hi %s,
			
Somebody (from the IP address %s) has requested a new password for their account.

If you requested this click on the link below, otherwise ignore this email.

We remind you, that your username is: %s

%s",
	'agreetoterms' => "I have read and agree to the",
	'terms' => 'Terms',

	'agreetoterms:required' => "You must agree to the terms to register",
	);
					
	add_translation("en",$english);
?>
