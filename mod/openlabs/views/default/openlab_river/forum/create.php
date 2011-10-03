<?php
/**
 * Any comment on original post
 */

	$performed_by = get_entity($vars['item']->subject_guid);
	$object = get_entity($vars['item']->object_guid);

	$forumtopic = $object->guid;
	$openlab_guid = $object->container_guid;
	//grab the annotation, if one exists
	if(($vars['item']->annotation_id) != 0) {
		$comment = get_annotation($vars['item']->annotation_id)->value;
	}
	$comment = strip_tags($comment);//this is so we don't get large images etc in the activity river
	$url = $object->getURL();
        $string = elgg_view("profile/icon",array('entity' => $performed_by, 'size' => 'tiny', 'override' => 'true'));
	$url_user = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string .= sprintf(elgg_echo("openlabforum:river:posted"),$url_user) . " ";
	//$string .= elgg_echo("openlabforum:river:annotate:create") . " | <a href=\"" . $url . "\">" . $object->title . "</a>";
        $icon_openlab=elgg_view("teams/icon_river", array('entity' => $object, 'size' => 'tiny', 'override' => 'true'));
        $string .= elgg_echo("openlabforum:river:annotate:create").":" .$icon_openlab ."<a href=\"" . $url . "\">" . $object->name . "</a>";
	if ($comment) {
		$string .= "<div class=\"river_content_display\">";
		$string .= elgg_get_excerpt($comment, 100);
		$string .= "</div>";
	}

	echo $string;
?>