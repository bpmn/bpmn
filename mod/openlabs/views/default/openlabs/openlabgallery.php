<?php
	/**
	 * Elgg openlabs plugin gallery view
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	$icon = elgg_view(
			"openlabs/icon", array(
									'entity' => $vars['entity'],
									'size' => 'large',
								  )
		);

	$info .= "<p><b><a href=\"" . $vars['entity']->getUrl() . "\">" . $vars['entity']->name . "</a></b></p>";
	
	// num users, last activity, owner etc
	
	
	echo elgg_view('search/gallery_listing',array('icon' => $icon, 'info' => $info));
?>