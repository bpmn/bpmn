<?php
/**
 * Manage openlab invitation requests.
 *
 * @package Elggopenlabs from ElggGroups
 */

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
gatekeeper();

set_page_owner(get_loggedin_userid());

$user = get_loggedin_user();

$title = elgg_echo('openlabs:suggestions');

$area2 = elgg_view_title($title);

if ($user) {
	// @todo temporary workaround for exts #287.
	$suggestions = openlabs_get_suggested_openlabs($user->getGUID());

	$area2 .= elgg_view('openlabs/suggestionrequests',array('suggestions' => $suggestions));
	elgg_set_ignore_access($ia);
} else {
	$area2 .= elgg_echo("openlabs:noaccess");
}

$body = elgg_view_layout('two_column_left_sidebar', '', $area2);

page_draw($title, $body);