<?php

	/**
	 * A simple view to provide the user with group filters and the number of group on the site
	 **/
	 
	 $num_teams = $vars['count'];
	 if(!$num_teams)
	 	$num_teams = 0;
	 	
	 $filter = $vars['filter'];
	 
	 //url
	 $url = $vars['url'] . "pg/teams/all/". $_SESSION['user']->username;

?>
<div id="elgg_horizontal_tabbed_nav">
<ul>    
        <li <?php if($filter == "newest") echo "class='selected'"; ?>><a href="<?php echo $url; ?>?filter=newest"><?php echo elgg_echo('teams:newest'); ?></a></li>
	
</ul>
</div>
<div class="team_count">
	<?php
		echo $num_teams . " " . elgg_echo("teams:count");
	?>
</div>