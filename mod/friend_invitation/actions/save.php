<?php
/**
    save.php, part of Friend_invitation
    Copyright (C) 2009, Lorinthe, BV and Web100 Net technology Center,Ltd
    Author: Bogdan Nikovskiy, bogdan@web100.com.ua
	    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
			    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
					    
    You should have received a copy of the GNU General Public License
    along with this program. If not, see <http://www.gnu.org/licenses/>.
						    	
*/

	admin_gatekeeper();
	
	$subject = get_input('subject');
	$message = get_input('message');
    $allow_change_subject = get_input('allow_change_subject');
    $allow_change_message = get_input('allow_change_message');
	
    if ( is_array($allow_change_subject) )
    {
        $allow_change_subject = $allow_change_subject[0];
    }
    if ( is_array($allow_change_message) )
    {
        $allow_change_message = $allow_change_message[0];
    }
    
    
    $error = false;
	if ( ! set_plugin_setting('friend_invitation_default_subject', $subject, 'friend_invitation') )
    {
        $error = true;
        register_error(elgg_echo('friend_invitation:error:unable_save_subject'));
    }
        
	if ( ! set_plugin_setting('friend_invitation_default_message', $message, 'friend_invitation') )
    {
        $error = true;
        register_error(elgg_echo('friend_invitation:error:unable_save_subject'));
    }

    if ( ! set_plugin_setting('friend_invitation_allow_change_subject', $allow_change_subject, 'friend_invitation') )
    {
        $error = true;
        register_error(elgg_echo('friend_invitation:error:unable_save_allow_change_subject'));
    }

    if ( ! set_plugin_setting('friend_invitation_allow_change_message', $allow_change_message, 'friend_invitation') )
    {
        $error = true;
        register_error(elgg_echo('friend_invitation:error:unable_save_allow_change_subject'));
    }
    
    
    if ( ! $error )
    {
        system_message(elgg_echo('friend_invitation:templates_saved'));
    }
    
	forward($_SERVER['HTTP_REFERER']);
?>