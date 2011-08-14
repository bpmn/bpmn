<?php

require_once(dirname(dirname(dirname(dirname(__FILE__)))). "/lib/boopinncomment.php" );
// Latest forum discussion for the openlab home page
//check to make sure this openlab forum has been activated
if ($vars['entity']->forum_enable != 'no') {
    ?>

    <div class="contentWrapper">
        <h2><?php echo elgg_echo('openlabs:latestdiscussion'); ?></h2>
    <?php
    
    // find topic 
    $forum = elgg_get_entities(array('types' => 'object',
                                                      'subtypes' => 'openlabforumtopic',
                                                      'container_guid' => $vars['entity']->guid,
                                                       'limit' => 1));
    if ($forum) {
        foreach ($forum as $f) {

            $count_annotations = BoopinnComment::getCommentsByTopic($f->getGUID() , True) ; 
            
            echo "<div class=\"forum_latest\">";
            echo "<div class=\"topic_owner_icon\">" . elgg_view('profile/icon', array('entity' => $f->getOwnerEntity(), 'size' => 'tiny', 'override' => true)) . "</div>";
            echo "<div class=\"topic_title\"><p><a href=\"{$f->getURL()}\">" . $f->title . "</a></p> <p class=\"topic_replies\"><small>" . elgg_echo('openlabs:posts') . ": " . $count_annotations . "</small></p></div>";

            echo "</div>";
        }
    } else {
        echo "<div class=\"forum_latest\">";
        echo elgg_echo("openlabtopic:notcreated");
        echo "</div>";
    }
    ?>
        <div class="clearfloat" /></div>
    </div>
        <?php
    }//end of forum active check
    ?>