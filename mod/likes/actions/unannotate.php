<?php
	/**
	* likes
	*
	* @author likes
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/

	// Ensure we're logged in
		if (!isloggedin()) {
			if (!$callback) {	
				forward();
			}
		}
		
		$forward_url = "";
		//Forward
		if (isset($_SERVER['HTTP_REFERER'])) {
			//Go to referer page
			$forward_url = $_SERVER['HTTP_REFERER'];	
		}
		
		$action_name = get_input('action_name');
		if (!$action_name) {
			if (!$callback) {
				forward($forward_url);
			}
		}
		
		$unannotated = false;

	// Make sure we can get the "like" in question
		$like_id = (int) get_input('like_id');
		if ($like = get_annotation($like_id)) {
	
			$entity = get_entity($like->entity_guid);
	
			if ($like->canEdit()) {
				$like->delete();
				$unannotated = true;
				if (!$callback) {
					system_message(elgg_echo("$action_name:deleted"));
					forward($forward_url);
				}
			}
		}
		
		if (!$unannotated) {
			if (!$callback) {
				register_error(elgg_echo("$action_name:notdeleted"));
			}
		}
	//Go to home
		if (!$callback) {
			forward($forward_url);
		}