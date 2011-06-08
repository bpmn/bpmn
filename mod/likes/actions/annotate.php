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

	// Make sure we're logged in (send us to the front page if not)
		if (!isloggedin()) {
			if (!$callback) {
				forward();
			}
		}
	
	// Get input data
		$guid = get_input('guid');
		
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

		$annotation_name = $action_name;
				
		$river_item = get_input('river_item');
		if ($river_item) {
			$annotation_name .= "_$river_item";
		}
		
		$annotated = false;
		
	//Check status
		$object = get_entity($guid);
		$user = get_loggedin_user();
		if ($user instanceof ElggUser && $object instanceof ElggEntity) {
			$likes_no_by_user = count_annotations($object->getGUID(), "", "", $annotation_name, 1, '', get_loggedin_userid());
			if ($likes_no_by_user == 0) {
				//Do LIKE action
				$like = create_annotation($object->guid, $annotation_name, 1, "", $user->guid, $object->access_id);
	
				// tell user annotation posted
				if ($like) {
					$annotated = true;
					if (!$callback) {
						system_message(elgg_echo("$action_name:posted"));
						forward($forward_url);
					}
				}
			}
		}
		
		if (!$annotated) {
			if (!$callback) {
				register_error(elgg_echo("$action_name:failure"));
			}
		}
	//Go to home
		if (!$callback) {
			forward($forward_url);
		}
?>