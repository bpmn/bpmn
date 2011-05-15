<?php

/**
 * Elgg openlabs edit a forum topic page
 * 
 * @package Elggopenlabs from ElggGroups
 */
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

//get the topic
$topic = get_entity((int) get_input('topic'));
$openlab = get_entity($topic->container_guid);
set_page_owner($openlab->guid);

group_gatekeeper() ; 

$content = elgg_view("forms/forums/edittopic", array('entity' => $topic));
$body = elgg_view_layout('two_column_left_sidebar', '', $content);

page_draw(elgg_echo('openlabs:edittopic'), $body);

