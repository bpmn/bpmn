<?php
/**
 * Elgg Tracker plugin
 * @license: GPL v 2.
 * @author slyhne
 * @copyright Zurf.dk
 * @link http://zurf.dk/elgg
 */

// Load Elgg engine
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

admin_gatekeeper();
	
$ip = get_input('ip');

// Set title
$body = elgg_view_title(sprintf(elgg_echo('tracker:title'), $ip));
		
// Get the list of all donators
$body .= list_entities_from_metadata("ip_address",$ip,"user","",0,10,false,$viewtypetoggle = true,true,false);		

//set a view to the donation box
$sidebar = elgg_view("tracker/search");

// Display them in the page
$page = elgg_view_layout("sidebar_boxes", $sidebar, $body);
		
// Display page
page_draw(sprintf(elgg_echo('tracker:title'), $ip),$page);
		
?>
