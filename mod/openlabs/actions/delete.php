<?php
/**
 * Delete openlab
 */
global $CONFIG;

$guid = (int) get_input('openlab_guid');
$entity = get_entity($guid);

if (($entity) && ($entity instanceof ElggGroup)) {
	// delete openlab icons
	$owner_guid = $entity->owner_guid;
	$prefix = "openlabs/" . $entity->guid;
	$imagenames = array('.jpg', 'tiny.jpg', 'small.jpg', 'medium.jpg', 'large.jpg');
	$img = new ElggFile();
	$img->owner_guid = $owner_guid;
	foreach ($imagenames as $name) {
		$img->setFilename($prefix . $name);
		$img->delete();
	}

	// delete openlab
	if ($entity->delete()) {
		system_message(elgg_echo('openlab:deleted'));
	} else {
		register_error(elgg_echo('openlab:notdeleted'));
	}
} else {
	register_error(elgg_echo('openlab:notdeleted'));
}

$url_name = get_loggedin_user()->username;
forward("{$vars['url']}pg/openlabs/member/{$url_name}");
