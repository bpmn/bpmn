<?php
	/**
	 * Icon display
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	global $CONFIG;
	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");

	$openlab_guid = get_input('openlab_guid');
	$openlab = get_entity($openlab_guid);
	
	$size = strtolower(get_input('size'));
	if (!in_array($size,array('large','medium','small','tiny','master','topbar')))
		$size = "medium";
	
	$success = false;
	
	$filehandler = new ElggFile();
	$filehandler->owner_guid = $openlab->owner_guid;
	$filehandler->setFilename("openlabs/" . $openlab->guid . $size . ".jpg");
	
	$success = false;
	if ($filehandler->open("read")) {
		if ($contents = $filehandler->read($filehandler->size())) {
			$success = true;
		} 
	}
	
	if (!$success) {
		$contents = @file_get_contents($CONFIG->pluginspath . "openlabs/graphics/default{$size}.jpg");
	}
	
	header("Content-type: image/jpeg");
	header('Expires: ' . date('r',time() + 864000));
	header("Pragma: public");
	header("Cache-Control: public");
	header("Content-Length: " . strlen($contents));
	echo $contents;
?>