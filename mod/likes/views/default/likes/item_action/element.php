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
	
	
	//if (get_context('widget')) {
		//$js_action = "onclick=\"rcPrepareItems(); jumpToComment(this); return false;\"";
	//}
	
	$object = $vars['entity'];
	if (!$object) {
		if (!isset($vars['item']->object_guid)) {
			return false;
		} else {
			$object = get_entity($vars['item']->object_guid);
		}
	}
	
	if (!$object instanceof ElggEntity) {
		return false;
	}
	$item = $vars['item'];
	$action_name = $vars['action_name'];
	
	$annotation_name = $action_name;
	//If the view is called from the riverdahsboar then we make a special annotation
	if ($item) {
		$annotation_name .= "_{$item->id}";
	}
	
	//If you do an action with ajax
	$last_action = $vars['last_action'];
	
	//We count the quantity of people that likes this.
	$likes_no = (int) count_annotations($object->getGUID(), "", "", $annotation_name);
	
	if ($object instanceof ElggEntity && isloggedin()) {
		//Do you like this object?
		$doyoulike = false;
	
		$context = get_context();
		if ($context == 'widget') {
			$js = "onclick=\"lkPrepareItems(); readyToAnnotate(this); return false;\"";
		}
	
		if(!$last_action) {
			$likes_no_by_user = count_annotations($object->getGUID(), "", "", $annotation_name, 1, '', get_loggedin_userid());
		}	
		if ($last_action == 'annotate' || $likes_no_by_user > 0) {
			//You already liked it
			$doyoulike = true;
			$annotation = get_annotations($object->getGUID(), "", "", $annotation_name, 1, get_loggedin_userid(), 1);
			if (!empty($annotation)) {
				$annotation = array_shift($annotation);
			}
			$annotation_id = $annotation->id; 
			
			$link = "{$vars['url']}action/unannotate?action_name=$action_name&river_item={$item->id}&like_id=$annotation_id&guid={$object->guid}" . url_compatible_mode('&');
			$content .=  "<a class='likes_action  {$action_name}_container' href=\"$link\" rel=\"$annotation_name\" $js>" . elgg_echo("un$action_name") . "</a>";
		} else {
			//You can like it
			//Nobody "like" in this river
			//always generate missing action tokens
			$link = "{$vars['url']}action/annotate?action_name=$action_name&river_item={$item->id}&guid={$object->guid}" . url_compatible_mode('&');
			$content .=  "<a class='likes_action' href=\"$link\" rel=\"$annotation_name\" $js>" . elgg_echo($action_name) . "</a>";	
		} // if ($likes_no_by_user > 0) {
	}
	//var_dump(get_input('like_action'));
	//if (get_input('like_action')) {
		$content = "· $content";
		if ($vars['callback'] != true) {	
?>	
			<span class='likes_action_container' rel='<?php echo "{$action_name}_container" ?>'><?php echo $content ?></span>
<?php
		} else {
			echo $content;
		} //if ($vars['callback'] != true) { 
	//}
	//set_input('like_action', false);
?>