<?php

	/**
	 * Elgg Topic individual post view. This is all the follow up posts on a particular topic
	 * 
	 * @package Elggopenlabs from ElggGroups
	 * 
	 * @uses $vars['entity'] The posted comment to view
	 */
	 
	      
?>
 <!-- start the topic_post -->
	<div class="topic_post">
     
            
            <table width="100%">
            <tr>
                <td>
                	<a name="<?php echo $vars['entity']->id; ?>"></a>
                    <?php
                        //get infomation about the owner of the comment
                        if ($post_owner = get_user($vars['entity']->owner_guid)) {
	                        
	                        //display the user icon
	                        echo "<div class=\"post_icon\">" . elgg_view("profile/icon",array('entity' => $post_owner, 'size' => 'small')) . "</div>";
	                        //display the user name
	                        echo "<p><b>" . $post_owner->name . "</b><br />";
                                        //display the date of the comment
                                        echo "<small>" . elgg_view_friendly_time($vars['entity']->time_created) . "</small></p>";

	                        
                        } else {
                        	echo "<div class=\"post_icon\"><img src=\"" . elgg_view('icon/user/default/small') . "\" /></div>";          //display the user name
	                echo "<p><b>" . $post_owner->name . "</b><br />";
                                //display the date of the comment
                                echo "<small>" . elgg_view_friendly_time($vars['entity']->time_created) . "</small></p>";
                        	echo "<p><b>" . elgg_echo('profile:deleteduser') . "</b><br />";
                        }
                        
                      
                    ?>
                </td>
          
            </tr>
        </table>
		

    <table width="100%">
        <tr>
            <td>
                <a name="<?php echo $vars['entity']->id; ?>"></a>
                 <?php
                $boopinnComment = $vars['entity'];
                $authorId = $boopinnComment->getAuthorId();
                $post_owner = get_user($authorId);
                $topicGuid = $boopinnComment->getTopicGuid() ; 
                $topic  = get_entity($topicGuid) ; 
                $openlabGuid  = $topic->container_guid  ; 
                
                
                $post_owner = TRUE;
//get infomation about the owner of the comment
                if ($post_owner) {

                //display the user icon
                echo "<div class=\"post_icon\">" . elgg_view("profile/icon", array('entity' => $post_owner, 'size' => 'small')) . "</div>";

                //display the user name
                echo "<p><b>" . $post_owner->name . "</b><br />";
                } else {
                echo "<div class=\"post_icon\"><img src=\"" . elgg_view('icon/user/default/small') . "\" /></div>";
                echo "<p><b>" . elgg_echo('profile:deleteduser') . "</b><br />";
                }


                ?>
            </td>
        </tr>
        <tr>
            <td>       
                <?php
                //display the actual message posted
                $post = $boopinnComment->getComment() ;  
                echo parse_urls(elgg_view("output/longtext", array("value" => $post )));

                ?>
            </td>
           
        </tr>
        <tr>
            <td>
                       <?php
                       
                        $openlab = get_entity($openlabGuid) ; 
                        if ($openlab->isMember(get_loggedin_userid()) )
                        {
			    echo '<div class = "postrating">';	
                            echo elgg_view("openlab_output/iconurl", array(
                            'href' => $vars['url'] . "action/openlabs/rate_plus?annotation_id=" . $boopinnComment->guid,
                            'src' => $vars['url'] . "mod/openlabs/graphics/thumb-up-icon.png",
                            'alt' => "Good comment !!!",
			    "is_action" => true));
			    echo '</div>';

                            if ($boopinnComment->getRating() > 0)
			    {
			    echo '<div class = "postrating">';	
				    
                                echo elgg_view("openlab_output/iconurl", array(
                                'href' => $vars['url'] . "action/openlabs/rate_less?annotation_id=" . $boopinnComment->guid,
                                'src' => $vars['url'] . "mod/openlabs/graphics/thumb-down-icon.png",
                                'alt' => "Bad comment !!!",
				"is_action" => true));
			    echo '</div>';
			    
                            }
                        }
                       
                       ?>
            </td>
              <td> 
                <?php
                        $nbRating = $vars['entity']->getRating() ; 
                        echo '<div class = "commentnumberrating">'. sprintf(elgg_echo("openlab:commentnumberrating"),$nbRating) ."</div>" ; 
                     ?>
             </td>
            
        </tr>
    </table>
    <?php
    //if the comment owner is looking at it, or admin, or openlab owner they can edit
    if (openlabs_can_edit_discussion($vars['entity'], page_owner_entity()->owner_guid)) {
    ?>
    <p class="topic-post-menu">
        <?php
        echo elgg_view("output/confirmlink", array(
        'href' => $vars['url'] . "action/openlabs/deletepost?post=" . $boopinnComment->guid . "&topic=" . get_input('topic') . "&openlab=" . get_input('openlab_guid'),
        'text' => elgg_echo('delete'),
        'confirm' => elgg_echo('deleteconfirm'),
        ));

        //display an edit link that will open up an edit area							
        echo " <a class=\"collapsibleboxlink\">" . elgg_echo('edit') . "</a>";
        echo "<div class=\"collapsible_box\">";
        //get the edit form and details
        $submit_input = elgg_view('input/submit', array('internalname' => 'submit', 'value' => elgg_echo('save')));
        $text_textarea = elgg_view('input/longtext', array('internalname' => 'postComment' . $boopinnComment->guid, 'value' =>  $boopinnComment->post));
        $post = elgg_view('input/hidden', array('internalname' => 'post', 'value' => $boopinnComment->guid));
        $field = elgg_view('input/hidden', array('internalname' => 'field_num', 'value' => $boopinnComment->guid));
        $topic = elgg_view('input/hidden', array('internalname' => 'topic', 'value' => get_input('topic')));
        $openlab = elgg_view('input/hidden', array('internalname' => 'openlab', 'value' => $openlabGuid));

        $form_body = <<<EOT
					
                                            <div class='edit_forum_comments'>
                                            <p class='longtext_editarea'>	
                                                    $text_textarea
                                            </p>
                                            $post
                                            $topic
                                            $openlab
                                            $field
                                            <p>
                                                    $submit_input
                                            </p>

                                            </div>
EOT;
        ?>

            <?php
            echo elgg_view('input/form', array('action' => "{$vars['url']}action/openlabs/editpost", 'body' => $form_body, 'internalid' => 'editforumpostForm'));
            ?>
    </div>
    </p>

            <?php
        }
        ?>

</div><!-- end the topic_post -->
