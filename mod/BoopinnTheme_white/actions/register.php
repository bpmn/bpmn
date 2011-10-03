<?php

	/**
	 * Based on: Login by Email
	 * 
	 * @author Pedro Prez
	 * @link http://community.elgg.org/pg/profile/pedroprez
	 * @copyright (c) Keetup 2009
	 * @link http://www.keetup.com/
	 * @license GNU General Public License (GPL) version 2
	 */

global $CONFIG;

//moved to the top for error handeling
$qs = explode('?',$_SERVER['HTTP_REFERER']);
$qs = $qs[0];
$qs .= "?u=" . urlencode($username) . "&e=" . urlencode($email) . "&n=" . urlencode($name) . "&friend_guid=" . $friend_guid;


// Get variables
$password = get_input('password');
$password2 = get_input('password2');
$email = get_input('email');
$name = get_input('name');
$username = get_input('username');

$friend_guid = (int) get_input('friend_guid',0);
$invitecode = get_input('invitecode');


//Lets add in some real error handeling.. why not
//
//


if(strlen($name)<2){
	register_error(elgg_echo('register:error:nameshort'));
	forward($qs);
	die();
}


if(strlen($username)<2){
	register_error(elgg_echo('register:error:usershort'));
	forward($qs);
	die();
}

if(strlen($email)<3){
	register_error(elgg_echo('register:error:emailshort'));
	forward($qs);
	die();
}
if(strlen($password)<3 || strlen($password2)<3 ){
	register_error(elgg_echo('register:error:passwordshort'));
	forward($qs);
	die();
}
if($password != $password2){
	register_error(elgg_echo('register:error:passwordmatch'));
	forward($qs);
	die();
}
if(get_user_by_email($email) != false){
	register_error(elgg_echo('register:error:emailtaken'));
	forward($qs);
	die();
}


//generate username
//$username = $name;
//$username = strToLower(preg_replace("/[^a-zA-Z]/", "", $username));

//$uNum="";
//while(get_user_by_username($username.$uNum)!==false){
//	$uNum++;
//}
//$username.=$uNum;

$admin = get_input('admin');
if (is_array($admin)) {
	$admin = $admin[0];
}




if (!$CONFIG->disable_registration) {
// For now, just try and register the user
	try {
		$guid = register_user($username, $password, $name, $email, false, $friend_guid, $invitecode);
		if (((trim($password) != "") && (strcmp($password, $password2) == 0)) && ($guid)) {
			$new_user = get_entity($guid);
			if (($guid) && ($admin)) {
				// Only admins can make someone an admin
				admin_gatekeeper();
				$new_user->makeAdmin();
			}


                        //boopinn modif Fatxi >>>
                      
                        $ignoreacess = elgg_get_ignore_access();
                        elgg_set_ignore_access(True);

                        add_widget($guid,"a_users_teams","profile",0,1);
                        add_widget($guid,"a_users_openlabs","profile",0,2);

                        elgg_set_ignore_access($ignoreaccess);
                       
                        //boopinn modif Fatxi <<<<

                       
			// Send user validation request on register only
			global $registering_admin;
			if (!$registering_admin) {
				request_user_validation($guid);
			}

			if (!$new_user->isAdmin()) {
				// Now disable if not an admin
				// Don't do a recursive disable.  Any entities owned by the user at this point
				// are products of plugins that hook into create user and might need
				// access to the entities.
				$new_user->disable('new_user', false);
			}

                  
                       

                        system_message(sprintf(elgg_echo("registerok"),$CONFIG->sitename));

			// Forward on success, assume everything else is an error...
			forward();
		} else {
			register_error(elgg_echo("registerbad"));
		}
	} catch (RegistrationException $r) {
		register_error($r->getMessage());
	}
} else {
	register_error(elgg_echo('registerdisabled'));
}


forward($qs);
