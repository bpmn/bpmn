<?php
/**
    en.php, part of Friend_invitation
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

$language_array_en = array(
    'friend_invitation' => 'Friend invitation',
    'friend_invitation:setup' => 'Friend invitation message',
    'friend_invitation:description' => 'Friend invite',
    'friend_invitation:widget' => 'Search members widget',
    'friend_invitation:widget:send' => 'Send Invitation',
    'friend_invitation:widget:description' => 'This widget allows invite friend into SN',
    'friend_invitation:widget:title' => 'Friend invitation',
    'friend_invitation:widget:no_results' => 'No members found',
    'friend_invitation:setup:default_subject' => 'Default subject',
    'friend_invitation:setup:default_message' => 'Default message',
    'friend_invitation:setup:save' => 'Save settings',
    'friend_invitation:process:sended' => 'Invitation for "%s" sended',
    'friend_invitation:process:failed' => 'Failed sending invitation to "%s"',
    'friend_invitation:process:exists' => '"%s" is already member',
    'friend_invitation:process:not_email' => '"%s" is not valid email',
    'friend_invitation:process:receivers_empty' => 'Receivers list empty',
    
    'friend_invitation:setup:allow_change_subject'  => 'Allow user modify message subject',
    'friend_invitation:setup:allow_change_message'  => 'Allow user modify message body',
    
    'friend_invitation:friends_list'    => 'You friend(s) email(s)',
    'friend_invitation:message'    => 'Message',
    'friend_invitation:macroses' => 'List of available macroses',
    
    
    'friend_invitation:default_message' => '%MEMBER% is inviting you to participate to a new innovation professional network at %SITE%',
    'friend_invitation:default_subject' => '%MEMBER% is inviting you',
    'friend_invitation:error:unable_save_subject'   => 'Unable to save subject template',
    'friend_invitation:error:unable_save_message'   => 'Unable to save message template',
    'friend_invitation:templates_saved' => 'Friend invitation message templates saved',
    

);

// register constants for english version of elgg site
add_translation('en', $language_array_en);

?>
