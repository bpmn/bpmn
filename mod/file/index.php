<?php

/**
 * Elgg file browser
 * 
 * @package ElggFile
 * 
 * 
 * TODO: File icons, download & mime types
 */
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

$context = get_context();


if ($context == 'openlab') {
    gatekeeper();
} else {
    // access check for closed groups
    group_gatekeeper();
}

//set the title
if (page_owner() == get_loggedin_userid()) {
    $title = elgg_echo('file:yours');
} else {
    $title = sprintf(elgg_echo("file:user"), page_owner_entity()->name);
}

$area2 = elgg_view_title($title);

// Get objects
set_context('search');
$offset = (int) get_input('offset', 0);

if (!$content) {
    $ignoreacess = elgg_get_ignore_access();
    // discussion is public 
    elgg_set_ignore_access(True);
    $content = elgg_list_entities(array('types' => 'object', 'subtypes' => 'file', 'container_guid' => page_owner(), 'limit' => 10, 'offset' => $offset, 'full_view' => FALSE));
    elgg_set_ignore_access($ignoreaccess);
}


if (!$content) {
    $content = elgg_view('page_elements/contentwrapper', array('body' => elgg_echo("file:none")));
}
$area2 .= $content;

set_context('file');
$area1 = get_filetype_cloud(page_owner());


$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);

page_draw($title, $body);
?>