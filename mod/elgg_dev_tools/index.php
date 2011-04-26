<?php
/**
 * The Admin Options Index Page
 *
 * This shows a form to update all of the plugin development tools you may need.
 *
 * @package Elgg Developer Tools
 * @author Cash Costello
 * @author Aaron Saray (102degrees.com)
 */

admin_gatekeeper();
set_context('admin');

$tab = get_input("tab");

$content = elgg_view_title(elgg_echo('elgg_dev_tools:title'));
$content .= elgg_view('elgg_dev_tools/index', array("tab" => $tab));

$body = elgg_view_layout("two_column_left_sidebar", '', $content);

page_draw(elgg_echo('elgg_dev_tools:title'), $body);
