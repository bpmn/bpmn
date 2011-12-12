<?php

/**
 * Remove a user from an openlab
 *
 * @package Elggopenlabs from ElggGroups
 */

// Load configuration
global $CONFIG;

gatekeeper();

$logged_in_user = get_loggedin_user();

$user_guid = get_input('user_guid');
if (!is_array($user_guid))
	$user_guid = array($user_guid);
$openlab_guid = get_input('openlab_guid');

if (sizeof($user_guid))
{
	foreach ($user_guid as $u_id)
	{
		$user = get_entity($u_id);
		$openlab = get_entity($openlab_guid);
                
		if ( $user && $openlab) {
                        
                    $owner_id = $openlab->getOwner() ; 
                    
                    /** can't remove owner */ 
                    if ($owner_id != $u_id)
                    {
                    
                        if (($openlab instanceof ElggGroup) && ($owner_id == get_loggedin_userid()))
			{
                        
                            $openlab->leave($user) ; 
                            
                            notify_user($user->getGUID(), 
                                        $openlab->owner_guid,
                                        sprintf(elgg_echo('openlabs:removeuser'), $user->name, $openlab->name),
					'' ,
					NULL) ; 
                            
                            system_message(sprintf(elgg_echo('openlabs:removeuser'), $user->name, $openlab->name));
			}
			else
                        {
                            system_message(elgg_echo("openlabs:cantremoveowner"));
                            register_error(elgg_echo("openlabs:cantremoveowner"));
                        }      
                    }
                    else
                    {
                        
                        system_message(elgg_echo("openlabs:cantremoveowner"));
                        register_error(elgg_echo("openlabs:cantremoveowner"));
                    }
                    
		}
	}
}

forward($_SERVER['HTTP_REFERER']);

?>
