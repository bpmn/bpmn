<?php

	/**
	 * This view will display featured openlabs - these are set by admin
	 **/
	 
	
?>
<div class="sidebarBox featuredopenlabs">
<h3><?php echo elgg_echo("openlabs:featured"); ?></h3>

<?php
	if($vars['featured']){
		
		foreach($vars['featured'] as $openlab){
			$icon = elgg_view(
				"openlabs/icon", array(
									'entity' => $openlab,
									'size' => 'small',
								  )
				);
				
			echo "<div class=\"contentWrapper\">" . $icon . " <p><span>" . $openlab->name . "</span><br />";
			echo $openlab->briefdescription . "</p><div class=\"clearfloat\"></div></div>";
			
		}
	}
?>
</div>