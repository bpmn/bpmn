<?php

/**
 * Elgg openlabs: add post to a topic 
 *
 * @package Elggopenlabs from ElggGroups
 */

// Make sure we're logged in and have a CSRF token
gatekeeper();

// Get input
$topic_guid = (int) get_input('topic_guid');
$openlab_guid = (int) get_input('openlab_guid');
$post = get_input('topic_post');


// make sure we have text in the post
if (!$post) {
	register_error(elgg_echo("openlabpost:nopost"));
	forward($_SERVER['HTTP_REFERER']);
}


// Check that user is a openlab member
$openlab = get_entity($openlab_guid);
$user = get_loggedin_user();
if (!$openlab->isMember($user)) {
	register_error(elgg_echo("openlabs:notmember"));
	forward($_SERVER['HTTP_REFERER']);
}


// Let's see if we can get an form topic with the specified GUID, and that it's a openlab forum topic
$topic = get_entity($topic_guid);
if (!$topic || $topic->getSubtype() != "openlabforumtopic") {
	register_error(elgg_echo("openlabtopic:notfound"));
	forward($_SERVER['HTTP_REFERER']);
}


// add the post to the forum topic
$post_id = $topic->annotate('openlab_topic_post', $post, $topic->access_id, $user->guid);
if ($post_id == false) {
	system_message(elgg_echo("openlabspost:failure"));
	forward($_SERVER['HTTP_REFERER']);
}

// add to river
//add_to_river('river/forum/create', 'create', $user->guid, $topic_guid, "", 0, $post_id);
// add a post to an openlab
add_to_river('openlab_river/forum/create', 'addpost', $user->guid, $openlab_guid, "", 0, $post_id);

system_message(elgg_echo("openlabspost:success"));

forward($_SERVER['HTTP_REFERER']);
