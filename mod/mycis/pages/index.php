<?php

// include the Elgg engine
include_once dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php"; 


// for test only 
$groups = compute_groups_in_cis(get_loggedin_user()) ;


// maybe logged in users only?
//gatekeeper();

// get any input
//$param = get_input('param');

// if username or owner_guid was not set as input variable, we need to set page owner
// Get the current page's owner
$page_owner = page_owner_entity();
if (!$page_owner) {
	$page_owner_guid = get_loggedin_userid();
	if ($page_owner_guid)
		set_page_owner($page_owner_guid);
}	

$title = elgg_echo('mycis:pagetitle');

// create content for main column
$content = elgg_view_title($title);
$content .= '<div id="center-container">' ; 
$content .= '<div id="mycis"></div>' ;     
$content .= '</div>' ; 
$content .= '<div id="right-container">' ; 
$content .= '<div id="inner-details"></div>' ; 
$content .= '</div>' ; 
$content .= '<div id="log"></div>' ; 

?>

<?php


// layout the sidebar and main column using the default sidebar
$body = elgg_view_layout('two_column_left_sidebar', '', $content);

// create the complete html page and send to browser
page_draw($title, $body);
?>