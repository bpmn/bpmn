<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once(dirname(__FILE__) . "/engine/start.php");

$all_users = get_entities('user') ;
foreach ($all_users as $user){
    $result = reorder_widgets_from_panel("","" ,"",'profile', $user->guid);
    add_widget($user->guid,"a_users_teams","profile",0,1);
    add_widget($user->guid,"a_users_openlabs","profile",0,2);
}

if ($result) {
	system_message(elgg_echo('widgets:panel:save:success'));
} else {
	register_error(elgg_echo('widgets:panel:save:failure'));
}

forward($_SERVER['HTTP_REFERER']);
?>
