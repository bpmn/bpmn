<?php

	/**
	 * @author Pedro Prez
	 * @link http://community.elgg.org/pg/profile/pedroprez
	 * @copyright (c) Keetup 2009
	 * @link http://www.keetup.com/
	 * @license GNU General Public License (GPL) version 2
	 */
	 
    // Get username and password
    
        $username = get_input('username');
        $password = get_input("password");
        $persistent = get_input("persistent", false);
        
    // If all is present and correct, try to log in  
    	$result = false;          
	if (!empty($username) && !empty($password)) {

			if(is_email_address($username)) {
				$user = authenticate_by_email($username,$password);	
			}
			else {
				$user = authenticate($username,$password);
        		}
			if($user)
				$result = login($user, $persistent);
        }
        
    // Set the system_message as appropriate
        
        if ($result) {
            system_message(elgg_echo('loginok'));
            if ($_SESSION['last_forward_from'])
            {
            	$forward_url = $_SESSION['last_forward_from'];
            	$_SESSION['last_forward_from'] = "";
            	forward($forward_url);
            }
            else
            {
            	if (
            		(isadminloggedin()) &&
            		(!datalist_get('first_admin_login'))
            	) 
            	{
            		system_message(elgg_echo('firstadminlogininstructions'));
            		
            		datalist_set('first_admin_login', time());
            		
            		forward('pg/admin/plugins');
            	} else	
            		forward("pg/dashboard/");
            }
        } else {
        	$error_msg = elgg_echo('loginerror');
        	// figure out why the login failed
        	if (!empty($username) && !empty($password)) {
        		// See if it exists and is disabled
				$access_status = access_get_show_hidden_status();
				access_show_hidden_entities(true);

				//logg in by email.
				$user = get_user_by_email($username);
				if (is_array($user)) 
					$user = array_shift($user); //Get first	


        		if ($user && !$user->validated) {
					// give plugins a chance to respond
        			if (!trigger_plugin_hook('unvalidated_login_attempt','user',array('entity'=>$user))) {
		  				// if plugins have not registered an action, the default action is to
        				// trigger the validation event again and assume that the validation
        				// event will display an appropriate message
						trigger_elgg_event('validate', 'user', $user);
        			}
        		} else {
        			 register_error(elgg_echo('loginerror'));
        		}
        		access_show_hidden_entities($access_status);
        	} else {
            	register_error(elgg_echo('loginerror'));
        	}
        }
      
?>
