<?php

/**
 * Elgg openlabs topic posts page
 * 
 * @package Elggopenlabs from ElggGroups
 */
// Load Elgg engine
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

// We now have RSS on topics
global $autofeed;
$autofeed = true;

// get the entity from id
$topic = get_entity(get_input('topic'));
if (!$topic)
    forward();

$openlab = get_entity($topic->container_guid);
set_page_owner($openlab->guid);

// Display them
$area2 = elgg_view("openlab_forum/viewposts", array('entity' => $topic));
$body = elgg_view_layout("two_column_left_sidebar", '', $area2);

// Display page
page_draw($topic->title, $body);
?>