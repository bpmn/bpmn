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

	// Get the Elgg engine
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	$callback = get_input('callback');
	$action_name = get_input('action_name');
	$annotation_name = $action_name;
				
	$river_item = get_input('river_item');
	if ($river_item) {
		$annotation_name .= "_$river_item";
	}
	
	$guid_entity = get_input('guid');
	
	$title = urldecode(get_input('title'));
	
	//We count the quantity of people that likes this.
	$likes_no = (int) count_annotations($guid_entity, "", "", $annotation_name);
	$annotations = get_annotations($guid_entity, '', '', $annotation_name, '', '', $likes_no);
	
	$users = array();
	if ($likes_no > 0) {
		foreach ($annotations as $annotation) {
			$guid = $annotation->owner_guid;
			$users[$guid] = get_entity($guid);
		}
	}
	
	$users_no = sizeof($users);
	if ($users_no > 0) {
		$content = elgg_view_entity_list($users, $users_no, NULL, $users_no, FALSE);    
	}
	
	if (!$callback) {
		$content = elgg_view_layout('two_column_left_sidebar', '', elgg_view_title($title) . $content);
		page_draw($title, $content);
	} else {
		echo elgg_view_title($title);
		echo $content; 
	}	