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
        	//set a view to display the requests notifications
	$notif_request = elgg_view("requestnotifications/sidebox");
	$body = elgg_view('boopinn_dashboard/container', array('request' => $notif_request));
	
        //page_draw($title, elgg_view_layout($area1, $body));
        page_draw($title, $body);