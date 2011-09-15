<?php

/**
    ajax_endpoint.php, part of Friend_invitation
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
    // Load Elgg engine will not include plugins
     require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");

    //get the required info

    //get the full page owner entity
    $user = get_entity($_POST['pageOwner']);

    //get the actual input fields
    $to = trim(get_input('friend_invitation_to'));
    if ( friend_invitation_allow_change_message() )
        $message = get_input('friend_invitation_message');
    else
        $message = friend_invitation_render_template_message($user);
        
    // loading subject from plugin preferences
    $subject = friend_invitation_render_template_subject($user);

	// prepare list of receivers
	$to = str_replace(';', ' ', $to);
	$to = str_replace(',', ' ', $to);
	$to = preg_replace('/\s+/', ' ', $to);
	$response = '';
	$receivers = array();
	if ( $to )
	{
		// for each receiver in list
		foreach ( explode(' ', $to) as $email )
		{
			if (preg_match('/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/', $email) ) // if receiver is valid email address
			{
				if ( !get_user_by_email($email) ) // if email not registered in network
				{
					// save user in array
					array_push($receivers, $email);
				}
				else // response email already registered
				{
					$response .= sprintf(elgg_echo('friend_invitation:process:exists'), $email);
				}
			}
			else  // response invalid email address format
			{
				$response .= sprintf(elgg_echo('friend_invitation:process:not_email'), $email);
			}
		}
	}
	// if list of receivers not empty
	if ( count($receivers) )
	{
		// prepare message for sending
		$message = preg_replace('/<br\s*\/?>/', "\r\n", $message);
		// prepare header for message
		$headers = "From: \"{$user->name}\" <{$user->email}>\r\n"
						. "Content-Type: text/plain; charset=UTF-8; format=flowed\r\n"
						. "MIME-Version: 1.0\r\n"
						. "Content-Transfer-Encoding: 8bit\r\n";
		// sending emails for receivers
		foreach ( $receivers as $email )
		{
			if ( mail($email, $subject, wordwrap($message), $headers) )
			{
				$response .= sprintf(elgg_echo('friend_invitation:process:sended'), $email);
			}
			else
			{
				$response .= sprintf(elgg_echo('friend_invitation:process:failed'), $email);
			}
		}
	}
	
	if ( !$response )
	{
		$response = elgg_echo('friend_invitation:process:receivers_empty');
	}

	// return response to widget
	echo $response;

?>