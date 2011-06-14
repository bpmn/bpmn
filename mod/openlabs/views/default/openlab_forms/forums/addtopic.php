<?php

	/**
	 * Elgg openlabs topic edit/add page
	 * 
	 * @package Elggopenlabs from ElggGroups
	 * 
	 * @uses $vars['object'] Optionally, the topic to edit
	 */

	// Set title, form destination
			$title = elgg_echo("openlabs:addtopic");
			$action = "openlabs/addtopic";
			$tags = "";
			$title = "";
			$message = "";
			$message_id = "";
			$status = "";
			$access_id = ACCESS_DEFAULT;
	    
    // get the openlab guid
        $openlab_guid = (int) get_input('openlab_guid');
        
	// set the title
	    echo elgg_view_title(elgg_echo("openlabs:addtopic"));
	    
?>
<div class="contentWrapper">
	<!-- display the input form -->
	<form action="<?php echo $vars['url']; ?>action/<?php echo $action; ?>" method="post">
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
									"value" => $message,
													));
			?>
			</label>
		</p>
		
		
		<!-- required hidden info and submit button -->
		<p>
			<input type="hidden" name="openlab_guid" value="<?php echo $openlab_guid; ?>" />
			<input type="submit" class="submit_button" value="<?php echo elgg_echo('post'); ?>" />
		</p>
	
	</form>
</div>
