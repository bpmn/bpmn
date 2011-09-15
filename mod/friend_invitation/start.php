<?php
/**
    start.php, part of Friend_invitation
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

global $FRIEND_INVITATION_PATTERNS;

$FRIEND_INVITATION_PATTERNS = array  (
    'SITE' => 'url',
    
);

function friend_invitation_render_template($user, $templ)
{
    global $FRIEND_INVITATION_PATTERNS;
    global $CONFIG;
    $templ = str_replace('%MEMBER%', $user->name, $templ);
    foreach ( $FRIEND_INVITATION_PATTERNS as $key => $replacement )
    {
        $pattern = '%'. $key . '%';
        $value = $CONFIG->$replacement;
        if ( strpos($templ, $pattern) != -1 )
        {
            $templ = str_replace($pattern, $value, $templ);
        }
    }
    return $templ;  
}


function friend_invitation_render_template_subject($user){
    $templ = friend_invitation_get_template_subject();
    return friend_invitation_render_template($user, $templ);
}

function friend_invitation_render_template_message($user){
    $templ = friend_invitation_get_template_message();
    return friend_invitation_render_template($user, $templ);    
}

function friend_invitation_get_template_subject()
{
    $templ = get_plugin_setting('friend_invitation_default_subject', "friend_invitation");
    if ( ! $templ )
        $templ = elgg_echo('friend_invitation:default_subject');
    return $templ;
}

function friend_invitation_get_template_message()
{
    $templ = get_plugin_setting('friend_invitation_default_message', "friend_invitation");
    if ( ! $templ )
        $templ = elgg_echo('friend_invitation:default_message');
    return $templ;
}

function friend_invitation_allow_change_subject(){
    $allow = get_plugin_setting('friend_invitation_allow_change_subject', "friend_invitation");
    return $allow;
}

function friend_invitation_allow_change_message(){
    $allow = get_plugin_setting('friend_invitation_allow_change_message', "friend_invitation");
    return $allow;
}

// unique function for plugin initialization

function friend_invitation_init(){

    global $CONFIG;
    // registering languages translation constants
    register_translations($CONFIG->pluginspath . "friend_invitation/languages/");
    // register handler for invitation setup page
    register_page_handler('friend_invitation_setup', 'friend_invitation_setup_handler');
    // registering action for saving customized information
    register_action('friend_invitation/save', false, $CONFIG->pluginspath . 'friend_invitation/actions/save.php');
    // register plugin widget
    add_widget_type('friend_invitation', elgg_echo('friend_invitation:widget:title'), elgg_echo('friend_invitation:widget:description'));
    // registering css styles
    extend_view('css', 'friend_invitation/css');

}


function friend_invitation_pagesetup(){
    global $CONFIG;
	// if requested admin area by logged admin
	if ( get_context() == 'admin' && isadminloggedin() )
    {
		add_submenu_item( elgg_echo('friend_invitation:setup'), $CONFIG->wwwroot . 'pg/friend_invitation_setup/');
	}
}

// handler for setup page
function friend_invitation_setup_handler($page){
	global $CONFIG;
	include($CONFIG->pluginspath . 'friend_invitation/index.php');
}

// register plugin event handler for plugin initialization
register_elgg_event_handler('init', 'system', 'friend_invitation_init');

// register plugin page setup handler
register_elgg_event_handler('pagesetup', 'system', 'friend_invitation_pagesetup');

?>
