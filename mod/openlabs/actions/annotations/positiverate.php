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

    $hasVotedRelationship = check_entity_relationship($guid, "hasvoted" , $authorId) ; 

    if ($hasVotedRelationship)
    {
         // can't rate twice 
         system_message(elgg_echo('openlab:usercanratetwice'));
    }
    else
    {
        // read annotation rating 
        $annotationRating = $comment->getAnnotations('commentrating', 1, 0, desc);

         // read value 
        $rating = $annotationRating[0]->value;

        if ($rating) {
            // if found clear all annotations
            $comment->clearAnnotations('commentrating');
            // create new 
            $comment->annotate('commentrating', $rating + 1);
        } else {
            // if not found create new one 
            $comment->annotate('commentrating', 1);
        }


        $annotationRating = $author->getAnnotations('userrating', 1, 0, desc);

        $rating = $annotationRating[0]->value;

        if ($rating) {
            // if found clear all annotations
            $comment->clearAnnotations('userrating');
            $author->annotate('userrating', $rating + 1);
        } else {
            $author->annotate('userrating', 1);
        }
        // create relationship 
        add_entity_relationship($guid, "hasvoted", $authorId) ; 
    // Success message
        system_message(elgg_echo("openlab:rateannotation"));
    }

}

// Forward to the main openlab page
    $url = forward($_SERVER['HTTP_REFERER']);

    forward(url);
?>
