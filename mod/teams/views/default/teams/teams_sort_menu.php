<?php

	/**
	 * A simple view to provide the user with group filters and the number of group on the site
	 **/
	 
	 $num_teams = $vars['count'];
	 if(!$num_teams)
	 	$num_teams = 0;
	 	
	 $filter = $vars['filter'];
	 
	 //url
	 $url = $vars['url'] . "pg/teams/owned/". $_SESSION['user']->username;

?>
<div id="elgg_horizontal_tabbed_nav">
<ul>
	<li <?php if($filter == "owned") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=owned"><?php echo elgg_echo('teams:owner'); ?></a></li>
	<li <?php if($filter == "member") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=member"><?php echo elgg_echo('teams:member'); ?></a></li>
</ul>
</div>
<div class="group_count">
	<?php
		echo $num_teams . " " . elgg_echo("teams:count");
	?>
</div>