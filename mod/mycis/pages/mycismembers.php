<?php

include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
require_once(dirname(dirname(__FILE__))."/actions/cis.php") ; 

set_page_owner(get_loggedin_user()->guid);

$title = sprintf(elgg_echo('mycis:membersof'), $openlab->name);

$area2 = elgg_view_title(elgg_echo('mycis:memberlist'));

$mycis = get_users_in_cis(get_loggedin_user()) ; 

$count = count($mycis) ; 

$area2 .= elgg_view_entity_list($mycis, $count, 0, ELGG_ENTITIES_NO_VALUE, false, false, false) ; 

$body = elgg_view_layout('two_column_left_sidebar', '', $area2);

page_draw($title, $body);

?>
