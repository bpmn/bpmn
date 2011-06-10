<?php

include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

$openlab_guid = (int) get_input('openlab_guid');
$openlab = get_entity($openlab_guid);
set_page_owner($openlab_guid);


$title = sprintf(elgg_echo('openlabs:membersof'), $openlab->name);
$area2 = elgg_view_title(elgg_echo('openlabs:memberlist'));

$area2 .= list_entities_from_relationship('member', $openlab_guid, true, 'user', '', 0, 10, false);

$body = elgg_view_layout('two_column_left_sidebar', '', $area2);

page_draw($title, $body);
