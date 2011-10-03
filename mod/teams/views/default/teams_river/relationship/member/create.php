<?php

	$performed_by = get_entity($vars['item']->subject_guid);
	$object = get_entity($vars['item']->object_guid);
	$objecturl = $object->getURL();

        $string = elgg_view("profile/icon",array('entity' => $performed_by, 'size' => 'tiny', 'override' => 'true'));
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string.= sprintf(elgg_echo("teams:river:member"),$url) . " ";
        $string.=elgg_view("teams/icon_river", array('entity' => $object, 'size' => 'tiny', 'override' => 'true'));
	$string .= " <a href=\"" . $object->getURL() . "\">" . $object->name . "</a>";

?>

<?php echo $string; ?>