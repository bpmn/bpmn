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

        // read annotation rating 
        $annotationRating = $comment->getAnnotations('commentrating', 1, 0, desc);

        // read value 
        $rating = $annotationRating[0]->value;

        if ($rating) {

            if ($rating > 0) {
                // if found clear all annotations
                $comment->clearAnnotations('commentrating');
                // create new 
                $comment->annotate('commentrating', $rating - 1);
                
                if (($rating -1) == 0)
                {
                    // remove association between comment and user 
                    remove_entity_relationship($guid, "hasvoted",$authorId ) ; 
                }

          }
        } else {
            // if not found create new one 
            $comment->annotate('commentrating', 0);
        }


        $annotationRating = $author->getAnnotations('userrating', 1, 0, desc);

        $rating = $annotationRating[0]->value;

        if ($rating) {
            if ($rating > 0) {
                // if found clear all annotations
                $comment->clearAnnotations('userrating');
                $author->annotate('userrating', $rating - 1);
            } else {
                $author->annotate('userrating', 0);
            }
        }
// Success message
        system_message(elgg_echo("openlab:rateannotation"));
}
// Forward to the main openlab page
$url = forward($_SERVER['HTTP_REFERER']);

forward(url);
?>
