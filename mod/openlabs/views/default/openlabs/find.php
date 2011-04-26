<?php

	/**
	 * A simple openlab search by tag view
	 **/

$tag_string = elgg_echo('openlabs:search:tags');
	 
?>
<div class="sidebarBox">
<h3><?php echo elgg_echo('openlabs:searchtag'); ?></h3>
<form id="openlabsearchform" action="<?php echo $vars['url']; ?>pg/openlabs/all/" method="get">
	<input type="text" name="tag" value="<?php echo $tag_string; ?>" onclick="if (this.value=='<?php echo $tag_string; ?>') { this.value='' }" class="search_input" />
	<input type="submit" value="<?php echo elgg_echo('search:go'); ?>" />
</form>
</div>
