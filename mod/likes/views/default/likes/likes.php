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
	$object = $vars['entity'];
	if (!$object instanceof ElggEntity) {
		return false;
	}
	$item = $vars['item'];
	$action_name = $vars['action_name'];
	if (!$action_name) {
		return false;
	}
	
	$annotation_name = $action_name;
	//If the view is called from the riverdahsboar then we make a special annotation
	if ($item) {
		$annotation_name .= "_{$item->id}";
	}
	
	//We count the quantity of people that likes this.
	$likes_no = (int) count_annotations($object->getGUID(), "", "", $annotation_name);
	
	
	if ($object instanceof ElggEntity) {
		//Do you like this object?
		$doyoulike = false;
		
		if(isloggedin()) {
			$likes_no_by_user = count_annotations($object->getGUID(), "", "", $annotation_name, 1, '', get_loggedin_userid());
			if ($likes_no_by_user > 0) {
				//You already liked it
				$doyoulike = true;
			}
		}
		
		

		/*$context = get_context();
		if ($context == 'widget') {
			$js = "onclick=\"lkPrepareItems(); readyToAnnotate(this); return false;\"";
		}*/
		/*
		$likes_no_by_user = count_annotations($object->getGUID(), "", "", $annotation_name, 1, '', get_loggedin_userid());
		if ($likes_no_by_user > 0) {
			//You already liked it
			$doyoulike = true;
			$annotation = get_annotations($object->getGUID(), "", "", $annotation_name, 1, get_loggedin_userid(), 1);
			if (!empty($annotation)) {
				$annotation = array_shift($annotation);
			}
			$link = "{$vars['url']}action/unannotate?action_name=$action_name&river_item={$item->id}&like_id={$annotation->id}&guid={$object->guid}" . url_compatible_mode('&');
			$content .=  "<a class='action' href=\"$link\" $js>" . elgg_echo("un$action_name") . "</a> · ";
		} else {
			//You can like it
			//always generate missing action tokens
			$link = "{$vars['url']}action/annotate?action_name=$action_name&river_item={$item->id}&guid={$object->guid}" . url_compatible_mode('&');
			$end_sentence = ($likes_no > 0 ? ' · ' : '');
			$content .=  "<a class='action' href=\"$link\" $js>" . elgg_echo($action_name) . "</a>$end_sentence";	
		} // if ($likes_no_by_user > 0) {
		*/
		
		if ($likes_no > 0) {
			
			// If more than two users, and if you are not there then the translation must finish with: 3 people likes it (like:lotofpeoplelikethis)
			// If more than two users, and you are in that list then the translation must finish with: you and 2 more people likes it.
			
			// If there are two users that likes it and you are not then the translation must be: user1 and user2 likes it. (like:others2likethis)
			// If there are two users that likes it and you are not then the translation must be: user1 and you likes it. (like:otherandyoulikethis)
			
			// If just one user likes it and that user is you then it must say: You likes it. (like:youlikethis)
			// If just one user likes it and that user is not you then it must say: user1 likes it. (like:otherlikesthis)
			
			if ($likes_no < 3) {
				$annotations = get_annotations($object->getGUID(), "", "", $annotation_name, "", "", $likes_no);
				
				$first_annotation = current($annotations);
				$user = get_entity($first_annotation->owner_guid);
				if ($user) {
					$username = "<a href=\"{$user->getURL()}\">$user->name</a>";
				}	 
				
				if ($likes_no == 1) {
					if ($doyoulike) {
						$content .= elgg_echo("$action_name:you{$action_name}this");
					} else {
						$content .= sprintf(elgg_echo("$action_name:other{$action_name}sthis"), $username);
					}
				} else {
					$last_annotation = end($annotations);
					$user2 = get_entity($last_annotation->owner_guid);
					if ($user2) {
						$username2 = "<a href=\"{$user2->getURL()}\">$user2->name</a>";
					}
					
					//Likes == 2
					if ($user == get_loggedin_user() || $user2 == get_loggedin_user()) {
						//TODO Make it better.
						if ($user2 == get_loggedin_user()) {
							$aux = $username;
							$username = $username2;
							$username2 = $aux;  
						}
						$content .= sprintf(elgg_echo("$action_name:otherandyou{$action_name}this"), $username2);
					} else {
						$content .= sprintf(elgg_echo("$action_name:others2{$action_name}this"), $username2, $username);
					}
				} //if ($likes_no == 1) {
			} else {
				$link_know_who = $vars['url'] . "pg/likes/who?action_name=$action_name&river_item={$item->id}&guid={$object->getGUID()}";
				$context = get_context();
				if ($context == 'widget') {
					$js_more = "onclick=\"showWhoElse(this); return false\"";
				}
				if ($doyoulike) {
					$title = sprintf(elgg_echo("$action_name:youandalotofpeople{$action_name}this"), sprintf(elgg_echo("like:others"),$likes_no-1));
					$link_know_who .= "&title=" . urlencode($title);
					$content .= sprintf(elgg_echo("$action_name:youandalotofpeople{$action_name}this"), "<a href=\"$link_know_who\" class=\"who_else\">" . sprintf(elgg_echo("like:others"),$likes_no-1) . "</a>");
				} else {
					$title = sprintf(elgg_echo("$action_name:lotofpeople{$action_name}this"), sprintf(elgg_echo("like:others"),$likes_no));
					$link_know_who .= "&title=" . urlencode($title);
					$content .= sprintf(elgg_echo("$action_name:lotofpeople{$action_name}this"), "<a href=\"$link_know_who\" class=\"who_else\" $js_more>" . sprintf(elgg_echo("like:others"),$likes_no). "</a>");
				}
			} //if ($likes_no < 3) {
		}
		if (!is_null($content)) {
			$content = "<div class='likes_wrapper $action_name' id='$annotation_name'>$content</div>";
		}
		if ($vars['callback'] != true) {
?>		
				<div class='likes <?php echo $action_name ?>_container'>
					<?php echo $content ?>
				</div>
<?php 
		} else {
			echo $content;
		} //if ($vars['callback'] != true) {
	} //if ($object instanceof ElggEntity && isloggedin())