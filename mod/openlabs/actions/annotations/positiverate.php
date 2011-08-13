<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Elgg openlab: delete post action
 *
 * @package Elggopenlab
 */
require_once(dirname(dirname(dirname(__FILE__))) . "/lib/boopinncomment.php" );
// Make sure we're logged in (send us to the front page if not)
gatekeeper();

// Get input data
$guid = (int) get_input('annotation_id');

// read entity 
$comment = BoopinnComment::getEntity($guid);

$authorId = $comment->getAuthorId();

$author = get_entity($authorId);

if ($authorId == get_loggedin_userid()) {
    system_message(elgg_echo('openlab:usercanrateitscomment'));
} else {

    $result = $comment->positiveRate(get_loggedin_userid());

    if ($result == -1) {
        // can't rate twice 
        system_message(elgg_echo('openlab:usercanratetwice'));
    } else {
        // Success message
        system_message(elgg_echo("openlab:rateannotation"));
    }
}

// Forward to the main openlab page
$url = forward($_SERVER['HTTP_REFERER']);

forward(url);
?>
