<?php
/**
 * Elgg comment river view 
 *
 * @package Elgg
 * @subpackage Core
 */

$performed_by = get_entity($vars['item']->subject_guid);
$object = get_entity($vars['item']->object_guid);
$url = $object->getURL();
$title = $object->title;
if (!$title) {
	$title = elgg_echo('untitled');
}
$subtype = get_subtype_from_id($object->subtype);


$string = elgg_view("profile/icon",array('entity' => $performed_by, 'size' => 'tiny', 'override' => 'true'));
$url_user = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";


$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
$string .= sprintf(elgg_echo("river:posted:generic"),$url) . " ";
$string .= elgg_echo("{$subtype}:river:annotate") . " | <a href=\"{$object->getURL()}\">" . $title . "</a>";




echo $string;