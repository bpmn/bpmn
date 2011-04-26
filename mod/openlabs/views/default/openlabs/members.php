<?php
	/**
	 * Elgg openlabs items view.
	 * This is the messageboard, members, pages and latest forums posts. Each plugin will extend the views
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */
	 
?>

<div id="openlab_members">
<h2><?php echo elgg_echo("openlabs:members"); ?></h2>

<?php

    $members = $vars['entity']->getMembers(12);
    foreach($members as $mem){
           
        echo "<div class=\"member_icon\"><a href=\"".$mem->getURL()."\">" . elgg_view("profile/icon",array('entity' => $mem, 'size' => 'tiny', 'override' => 'true')) . "</a></div>";   
           
    }

	echo "<div class=\"clearfloat\"></div>";
	$more_url = "{$vars['url']}pg/openlabs/memberlist/{$vars['entity']->guid}/";
	echo "<div id=\"openlabs_member_link\"><a href=\"{$more_url}\">" . elgg_echo('openlabs:members:more') . "</a></div>";

?>
<div class="clearfloat"></div>
</div>