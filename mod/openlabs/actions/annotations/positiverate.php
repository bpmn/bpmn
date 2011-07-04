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
// Make sure we're logged in (send us to the front page if not)
gatekeeper();

// Get input data
$guid = (int) get_input('annotation_id');

// Make sure we actually have permission to edit
$openlabAnnotation = get_annotation($guid);

$openlab = $openlabAnnotation->getEntity();


    // Get container (user or group)
    $annotationAuthor = $openlabAnnotation->getOwnerEntity();

    $annotationRating = $annotationAuthor->getAnnotations('rating', 1, 0, desc);

    $rating = $annotationRating[0]->value;

    if ($rating) {
        $annotationAuthor->annotate('rating', $rating + 1);
    } else {
        $annotationAuthor->annotate('rating', 1);
    }
    // Success message
    system_message(elgg_echo("openlab:rateannotation"));

    // Forward to the main openlab page
    $url = forward($_SERVER['HTTP_REFERER']);

    forward(url);
?>
