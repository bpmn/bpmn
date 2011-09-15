<?php
/**
    setup.php, part of Friend_invitation
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

	$subject = friend_invitation_get_template_subject();
	$message = friend_invitation_get_template_message();
    $allow_change_subject = friend_invitation_allow_change_subject();
    $allow_change_message = friend_invitation_allow_change_message();

    $form_body = elgg_echo('friend_invitation:setup:default_subject');
	$form_body .= elgg_view('input/text', array('internalname' => 'subject', 'value' => $subject));
	$form_body .= elgg_echo('friend_invitation:setup:default_message');
	$form_body .= elgg_view('input/longtext', array('internalname' => 'message', 'value' => $message));
/*    
    $form_body .= elgg_view('input/checkboxes', array(  'internalname' => 'allow_change_subject', 
                                                        'value' => $allow_change_subject, 
                                                        'options' => array( elgg_echo('friend_invitation:setup:allow_change_subject') => 1) ));
*/
    $form_body .= elgg_view('input/checkboxes', array(  'internalname' => 'allow_change_message', 
                                                        'value' => $allow_change_message, 
                                                        'options' => array( elgg_echo('friend_invitation:setup:allow_change_message') => 1) ));

	$form_body .= elgg_view('input/submit', array('value' => elgg_echo('friend_invitation:setup:save')));
	
	echo elgg_view('input/form', array('body' => $form_body, 'action' => $CONFIG->url . "action/friend_invitation/save"));

?>