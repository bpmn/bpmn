<?php

/**
 * boopinn dashboard plugin index page
 *
 */
require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');
require_once (dirname(__FILE__) . '/lib/dashboard_lib.php');

$body = '';
$content = '';

$title = 'Boopinn Dashboard';

//$content = elgg_view('page_elements/contentwrapper', array('body' => $nav . $river));
// display page
//set a view to display the requests notifications
$my_openlab_activity = view_my_group_river(get_loggedin_user()->guid, 'group', 'openlab');
$my_follow_activity = view_my_follow_river(get_loggedin_user()->guid);
$my_cis_activity = view_my_cis_river(get_loggedin_user());
$my_team_activity = view_my_group_river(get_loggedin_user()->guid, 'group', 'teams');

$user_activity = view_users_activity();
$friend_invitation=elgg_view("friend_invitation/view");
$notif_request = elgg_view("requestnotifications/sidebox");
$body = elgg_view('boopinn_dashboard/container', array('request' => $notif_request, 
                                                                                   'teams_activity' => $my_team_activity, 
                                                                                   'openlabs_activity' => $my_openlab_activity,
                                                                                   'cis_activity' => $my_cis_activity, 
                                                                                    'follow_activity' => $my_follow_activity, 
                                                                                    'users_activity' => $user_activity,
                                                                                    'friend_invit' => $friend_invitation));
//page_draw($title, elgg_view_layout($area1, $body));
page_draw($title, $body);