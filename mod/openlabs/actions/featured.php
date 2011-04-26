<?php
	
	/**
	 * Join a openlab action.
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	// Load configuration
	global $CONFIG;
	
	admin_gatekeeper();
	
	$openlab_guid = get_input('openlab_guid');
	$action = get_input('action_type');
	
	$openlab = get_entity($openlab_guid);
	
	if($openlab){
		
		//get the action, is it to feature or unfeature
		if($action == "feature"){
		
			$openlab->featured_openlab = "yes";
			system_message(elgg_echo('openlabs:featuredon'));
			
		}
		
		if($action == "unfeature"){
			
			$openlab->featured_openlab = "no";
			system_message(elgg_echo('openlabs:unfeatured'));
			
		}
		
	}
	
	forward(REFERER);
	
?>