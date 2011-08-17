<?php

/**
 * List most recent files on group profile page
 */

if ($vars['entity']->file_enable != 'no') {
?>

<div class="group_widget">
   <?php
        if ($context=get_context()== "teams"){
            $name_box="team";
        }
        // STD le titre de la "File box" dans le profile de l'entity group varie suivant le contexte.
        else  if ($context=get_context()== "openlabs"){
            $name_box="openlabs";
        } else {
            $name_box="group";
        }

   ?>
<h2><?php echo elgg_echo("file:$name_box"); ?></h2>
<?php
	$context = get_context();
	set_context('search');
        
                if ($context == 'openlabs')
                {
                    $ignoreacess = elgg_get_ignore_access();

                    elgg_set_ignore_access(True);
                }
        
	$content = elgg_list_entities(array('types' => 'object',
                                                                                                'subtypes' => 'file',
                                                                                                'container_guid' => $vars['entity']->guid,
                                                                                                'limit' => 5,
                                                                                                'pagination' => FALSE));
                if ($context == 'openlabs')
                {                                                              
                    elgg_set_ignore_access($ignoreacess);
                }
                                                                             
	set_context($context);

    if ($content) {
		echo $content;

		$more_url = "{$vars['url']}pg/file/owner/group:{$vars['entity']->guid}/";
		echo "<div class=\"forum_latest\"><a href=\"$more_url\">" . elgg_echo('file:more') . "</a></div>";
	} else {
		echo "<div class=\"forum_latest\">" . elgg_echo("file:nogroup") . "</div>";
	}
?>
</div>
<?php
}