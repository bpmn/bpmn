<?php

    /**
	 * Elgg openlabs plugin display topic posts
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

    //display follow up comments
    $count = $vars['entity']->countAnnotations('openlab_topic_post');
    $offset = (int) get_input('offset',0);
    
    foreach($vars['entity']->getAnnotations('openlab_topic_post', 50, $offset, "asc") as $post) {

    	$post->title = '';
    	$post->description = $post->value;
    	echo elgg_view('object/default', array('entity' => $post));
	    // echo elgg_view("openlab_forum/topicposts",array('entity' => $post));
		
	}

?>