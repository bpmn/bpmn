<?php

	$performed_by = get_entity($vars['item']->subject_guid);
	$object = get_entity($vars['item']->object_guid);
	$url = $object->getURL();
	$container = get_entity($object->container_guid);

        $string = elgg_view("profile/icon",array('entity' => $performed_by, 'size' => 'tiny', 'override' => 'true'));
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
        $string .= sprintf(elgg_echo("file:river:created"),$url) . " " . elgg_echo("file:river:item");
	$string .= " <a href=\"" . $object->getURL() . "\">" . $object->title . "</a>";
	if ($container && $container instanceof ElggGroup) {
                $icon=elgg_view("teams/icon_river", array('entity' => $container, 'size' => 'tiny', 'override' => 'true'));
		$string .= ' ' . elgg_echo('file:river:togroup') .$icon ." <a href=\"" . $container->getURL() ."\">". $container->name . "</a>";
	}

	echo $string;
	
?>