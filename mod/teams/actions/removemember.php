<?php

/**
 * Remove a user from an team
 *
 */

// Load configuration
global $CONFIG;

gatekeeper();

$logged_in_user = get_loggedin_user();

$user_guid = get_input('user_guid');
if (!is_array($user_guid))
	$user_guid = array($user_guid);
$team_guid = get_input('group_guid');

if (sizeof($user_guid))
{
	foreach ($user_guid as $u_id)
	{
		$user = get_entity($u_id);
		$team = get_entity($team_guid);
                
		if ( $user && $team) {
                        
                    $owner_id = $team->getOwner() ; 
                    
                    /** can't remove owner */ 
                    if ($owner_id != $u_id)
                    {
                    
                        if (($team instanceof ElggGroup) && ($owner_id == get_loggedin_userid()))
			{
				
                            $team->leave($user) ; 
                            
                            notify_user($user->getGUID(), 
                                        $team->owner_guid,
                                        sprintf(elgg_echo('teams:removeuser'), $user->name, $team->name),
					'' ,
					NULL) ; 
                            
                            system_message(sprintf(elgg_echo('teams:removeuser'), $user->name, $team->name));
			}
			else
                        {
                            system_message(elgg_echo("teams:cantremoveowner"));
                            register_error(elgg_echo("teams:cantremoveowner"));
                        }      
                    }
                    else
                    {
                        
                        system_message(elgg_echo("teams:cantremoveowner"));
                        register_error(elgg_echo("teams:cantremoveowner"));
                    }
                    
		}
	}
}

forward($_SERVER['HTTP_REFERER']);

?>
