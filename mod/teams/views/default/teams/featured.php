<?php

	/**
	 * This view will display featured teams - these are set by admin
	 **/
	 
	
?>
<div class="sidebarBox featuredteams">
<h3><?php echo elgg_echo("teams:featured"); ?></h3>

<?php
	if($vars['featured']){
		
		foreach($vars['featured'] as $group){
			$icon = elgg_view(
				"teams/icon", array(
									'entity' => $group,
									'size' => 'small',
								  )
				);
				
			echo "<div class=\"contentWrapper\">" . $icon . " <p><span>" . $group->name . "</span><br />";
			echo $group->briefdescription . "</p><div class=\"clearfloat\"></div></div>";
			
		}
	}
?>
</div>