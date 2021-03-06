<?php

    /**
	 * Elgg openlabs topic edit/add page
	 * 
	 * @package Elggopenlabs from ElggGroups
	 * 
	 * @uses $vars['entity'] Optionally, the topic to edit
	 */
	 
	 //users can edit the access and status for now
	    $access_id = $vars['entity']->access_id;
	    $status = $vars['entity']->status;
	    $tags = $vars['entity']->tags;
	    $title = $vars['entity']->title;
	    $message = $vars['entity']->getAnnotations('openlab_topic_post', 1, 0, "asc");
	    
	    foreach($message as $mes){
			$messsage_content = $mes->value;
		    $message_id = $mes->id;
	    }		    
		    
	 // get the openlab GUID
	    $openlab_guid = $vars['entity']->container_guid;
	    
	// topic guid
	    $topic_guid = $vars['entity']->guid;
	    
	// set the title
	    echo elgg_view_title(elgg_echo("openlabs:edittopic"));
	 
?>
<div class="contentWrapper">
<!-- display the input form -->
	<form action="<?php echo $vars['url']; ?>action/openlabs/edittopic" method="post">
	<?php echo elgg_view('input/securitytoken'); ?>
	
		<p>
			<label><?php echo elgg_echo("title"); ?><br />
			<?php
                //display the topic title input
				echo elgg_view("input/text", array(
									"internalname" => "topictitle",
									"value" => $title,
													));
			?>
			</label>
		</p>
		
		<!-- display the tag input -->
		<p>
			<label><?php echo elgg_echo("tags"); ?><br />
			<?php

				echo elgg_view("input/tags", array(
									"internalname" => "topictags",
									"value" => $tags,
													));
			
			?>
			</label>
		</p>
		
		<!-- topic message input -->
		<p class="longtext_editarea">
			<label><?php echo elgg_echo("openlabs:topicmessage"); ?><br />
			<?php

				echo elgg_view("input/longtext",array(
									"internalname" => "topicmessage",
									"value" => $messsage_content,
													));
			?>
			</label>
		</p>
		
		<!-- set the topic status -->
		<p>
		    <label><?php echo elgg_echo("openlabs:topicstatus"); ?><br />
		    <select name="status">
		        <option value="open" <?php if($status == "") echo "SELECTED";?>><?php echo elgg_echo('openlabs:topicopen'); ?></option>
		        <option value="closed" <?php if($status == "closed") echo "SELECTED";?>><?php echo elgg_echo('openlabs:topicclosed'); ?></option>
		    </select>
		    </label>
		</p>
		
		<!-- access -->
		<p>
			<label>
				<?php echo elgg_echo('access'); ?><br />
				<?php echo elgg_view('input/access', array('internalname' => 'access_id','value' => $access_id)); ?>
			</label>
		</p>
		
		<!-- required hidden info and submit button -->
		<p>
			<input type="hidden" name="openlab_guid" value="<?php echo $openlab_guid; ?>" />
			<input type="hidden" name="topic" value="<?php echo $topic_guid; ?>" />
			<input type="hidden" name="message_id" value="<?php echo $message_id; ?>" />
			<input type="submit" class="submit_button" value="<?php echo elgg_echo('save'); ?>" />
		</p>
	
	</form>
</div>