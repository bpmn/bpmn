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
	if (!isloggedin()) {
		return false;
	}
	set_input('like_action', true);
?>	
	<!-- separator -->
	<!-- itemtime -->
	<!-- river_actions -->
	<!-- separator -->
<?php	
	$entity = get_entity($vars['item']->object_guid);
	if ($entity && $vars['item']) {
		$content = elgg_view('input/like', array('entity' => $entity, 'item' => $vars['item']));
		//if (!empty($content)) {
		echo elgg_view('likes/wrapper', array('body' => $content));
		//}
		if (get_plugin_setting('allowdislike', 'likes') == 'yes') {
			$content = elgg_view('input/dislike', array('entity' => $entity, 'item' => $vars['item']));
			//if (!empty($content)) {
			echo elgg_view('likes/wrapper', array('body' => $content));
			//}	
		}
	}