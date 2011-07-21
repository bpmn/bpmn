<?php

    /**
	 * Elgg openlabs plugin edit post action.
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

//get the required variables
$postid = get_input("post");
$field_num = get_input("field_num");
$post_comment = get_input("postComment{$field_num}");
$comment = get_entity($postid);
$commentOwner = $comment->owner_guid;
$access_id = $comment->access_id;
$topic_guid = get_input("topic");

if ($comment) {

    //can edit? Either the comment owner or admin can
    if (openlabs_can_edit_discussion($comment, page_owner_entity()->owner_guid)) {
        $comment->post = $post_comment ; 
        $comment->save();
        system_message(elgg_echo("openlabs:forumpost:edited"));
    } else {
        system_message(elgg_echo("openlabs:forumpost:error"));
    }
} else {

    system_message(elgg_echo("openlabs:forumpost:error"));
}

$topic = get_entity($topic_guid);
forward($topic->getURL());
?>