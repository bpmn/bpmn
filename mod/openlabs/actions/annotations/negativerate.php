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
    register_error(elgg_echo('openlab:usercanrateitscomment'));
} else {

        $result = $comment->negativeRate(get_loggedin_userid()) ; 
        
        if ($result != -1)
        {
            system_message(elgg_echo("openlab:rateannotation"));
        }
        else 
        {
            // Success message
            register_error(elgg_echo('openlab:usercanratetwice'));
        }
}
// Forward to the main openlab page
$url = forward($_SERVER['HTTP_REFERER']);

forward(url);
?>
