<?php

	/**
	 * A simple view to provide the user with openlab filters and the number of openlab on the site
	 **/
	 
	 $num_openlabs = $vars['count'];
	 if(!$num_openlabs)
	 	$num_openlabs = 0;
	 	
	 $filter = $vars['filter'];
	 
	 //url
	 $url = $vars['url'] . "pg/openlabs/all/";

?>
<div id="elgg_horizontal_tabbed_nav">
<ul>
	<li <?php if($filter == "active") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=active"><?php echo elgg_echo('openlabs:latestdiscussion'); ?></a></li>
	<li <?php if($filter == "newest") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=newest"><?php echo elgg_echo('openlabs:newest'); ?></a></li>
	<li <?php if($filter == "pop") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=pop"><?php echo elgg_echo('openlabs:popular'); ?></a></li>
</ul>
</div>
<div class="openlab_count">
	<?php
		echo $num_openlabs . " " . elgg_echo("openlabs:count");
	?>
</div>