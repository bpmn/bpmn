<?php

/**
 * Elgg invite language file
 * 
 * @package ElggInviteFriends
 */

$english = array(

	'friends:invite' => 'Invite friends',
	'oi_invitefriends:introduction' => 'To invite friends to join you on this network, enter their email addresses below (one per line):',
	'oi_invitefriends:message' => 'Enter a message they will receive with your invitation:',
	'oi_invitefriends:subject' => 'Invitation to join %s',

	'oi_invitefriends:success' => 'Your friends were invited.',
	'oi_invitefriends:invitations_sent' => 'Invites sent: %s. There were the following problems:',
	'oi_invitefriends:email_error' => 'The following addresses are not valid: %s',
	'oi_invitefriends:already_members' => 'The following are already members: %s',
	'oi_invitefriends:noemails' => 'No email addresses were entered.',
	'oi_invitefriends:openinviter:introduction' => 'To import and invite your friends from your e-mail provider or social network, enter your login, password and provider below.',
	'oi_invitefriends:openinviter:email_missing' => 'Email missing.',
	'oi_invitefriends:openinviter:password_missing' => 'Password missing.',
	'oi_invitefriends:openinviter:provider_missing' => 'Provider missing.',
	'oi_invitefriends:openinviter:login_failed' => 'Login failed. Please check the email and password you have provided and try again later.',
	'oi_invitefriends:openinviter:unable_get_contacts' => 'Unable to get contacts.',
	'oi_invitefriends:openinviter:inviter_missing' => 'Inviter information missing.',
	'oi_invitefriends:openinviter:no_session' => 'No active session.',
	'oi_invitefriends:openinviter:message_missing' => 'Message missing.',
	'oi_invitefriends:openinviter:no_contacts' => 'You haven \'t selected any contacts to invite.',
	'oi_invitefriends:openinviter:inviter_technology' => 'This invite was sent using OpenInviter technology.',
	'oi_invitefriends:openinviter:mail_success' => 'Mails sent successfully.',
	'oi_invitefriends:openinviter:mail_errors' => 'There were errors while sending your invites.<br>Please try again later.',
	'oi_invitefriends:openinviter:invite_success' => 'Invites sent successfully.',
	'oi_invitefriends:openinviter:form_email' => 'Email',
	'oi_invitefriends:openinviter:form_password' => 'Password',
	'oi_invitefriends:openinviter:form_provider' => 'Email provider',
	'oi_invitefriends:openinviter:address_book_empty' => 'You do not have any contacts in your address book.',
	'oi_invitefriends:openinviter:select_deselect' => 'Select/Deselect all.',
	'oi_invitefriends:openinviter:checkbox_invite' => 'Select.',
	'oi_invitefriends:openinviter:invite_name' => 'Name',
	'oi_invitefriends:openinviter:invite_email' => 'E-Mail',
	'oi_invitefriends:openinviter:your_contacts' => 'Your contacts',
	'oi_invitefriends:openinviter:import_contacts' => 'Import Contacts',
	
	'oi_invitefriends:message:default' => '
Hi,

I want to invite you to join my network here on %s.',

	'oi_invitefriends:email' => '
You have been invited to join %s by %s. They included the following message:

%s

To join, click the following link:

%s

You will automatically add them as a friend when you create your account.',
	
	);
					
add_translation("en", $english);
