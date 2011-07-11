<?php

/**
 * boopinn dashboard plugin index page
 *
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');

$body = '';
$content = '';

$title ='Boopinn Dashboard';

//$content = elgg_view('page_elements/contentwrapper', array('body' => $nav . $river));

	// display page
	$body .= elgg_view('boopinn_dashboard/container', array('body' => $content . elgg_view('boopinn_dashboard/js')));
	page_draw($title, elgg_view_layout($area1, $body));
