<?php

	/**
	 * A simple view to provide the user with entities filters and the number of entities on you follow
	 **/
	 
	 $num_entities = $vars['count'];
	 if(!$num_entities)
	 	$num_entities = "no";
	 	
	 $filter = $vars['filter'];
	 
	 //url
	 $url = $vars['url'] . "pg/follow/". $_SESSION['user']->username;

?>
<div id="elgg_horizontal_tabbed_nav">
<ul>    
        <li <?php if($filter == "profiles") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=profiles"><?php echo elgg_echo('follow:users'); ?></a></li>
	<li <?php if($filter == "openlabs") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=openlabs"><?php echo elgg_echo('follow:openlabs'); ?></a></li>
        <li <?php if($filter == "teams") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=teams"><?php echo elgg_echo('follow:teams'); ?></a></li>
	
</ul>
</div>
<div class="team_count">
	<?php
		echo sprintf(elgg_echo("follow:count"),$num_entities , $vars['type_name']);
	?>
</div>