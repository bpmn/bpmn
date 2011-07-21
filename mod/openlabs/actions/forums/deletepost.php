<?php

/**
 * Elgg openlabs: delete topic comment action
 * 
 * @package Elggopenlabs from ElggGroups
 */
// Ensure we're logged in
if (!isloggedin())
    forward();


// Make sure we can get the comment in question
$post_id = (int) get_input('post');
$openlab_guid = (int) get_input('openlab');
$topic_guid = (int) get_input('topic');

$post = get_entity($post_id);

if ($post) {

    //check that the user can edit as well as admin
    if ($post->canEdit() || ($post->owner_guid == $_SESSION['user']->guid)) {

        //delete forum comment
        $post->delete();

        // remove river entry if it exists
        remove_from_river_by_id($post_id);

        //display confirmation message
        system_message(elgg_echo("openlabpost:deleted"));
    }
} else {
    $url = "";
    system_message(elgg_echo("openlabpost:notdeleted"));
}

$topic = get_entity($topic_guid);
forward($topic->getURL());
?>