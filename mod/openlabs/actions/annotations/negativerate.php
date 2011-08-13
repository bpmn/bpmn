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
// Get input data
$guid = (int) get_input('annotation_id'); // Get input data
$guid = (int) get_input('annotation_id');

// read entity 
$comment = BoopinnComment::getEntity($guid);

// annotate user 
$authorId = $comment->getAuthorId();

$author = get_entity($authorId);

if ($authorId == get_loggedin_userid()) {
    system_message(elgg_echo('openlab:usercanrateitscomment'));
} else {

        $comment->negativeRate(get_loggedin_userid()) ; 
        // Success message
        system_message(elgg_echo("openlab:rateannotation"));
}
// Forward to the main openlab page
$url = forward($_SERVER['HTTP_REFERER']);

forward(url);
?>
