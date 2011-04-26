<?php
/**
 * Update Elgg Dev Tools Setttings
 *
 * This applies the changes from the Elgg admin settings form.
 * Normally, you would validate these settings before setting the plugin
 * options, but since this is only available to admins we assume they know
 * what they are doing.
 *
 * @package Elgg Developer Tools
 * @author Aaron Saray (102degrees.com)
 * @author Cash Costello
 */


set_plugin_setting('enablefirephp', get_input('enablefirephp'), 'elgg_developer_tools');

set_plugin_setting('displayerrors', get_input('displayerrors'), 'elgg_developer_tools');

set_plugin_setting('errorhandler', get_input('errorhandler'), 'elgg_developer_tools');

set_plugin_setting('exceptionhandler', get_input('exceptionhandler'), 'elgg_developer_tools');

set_plugin_setting('errorlog', get_input('errorlog'), 'elgg_developer_tools');

set_plugin_setting('htmllog', get_input('htmllog'), 'elgg_developer_tools');

if (get_input('usesimplecache')) {
	elgg_view_enable_simplecache();
} else {
	elgg_view_disable_simplecache();
}

if (get_input('useviewscache')) {
	elgg_enable_filepath_cache();
} else {
	elgg_disable_filepath_cache();
}

$debug_trace_level = get_input('debug');
if ($debug_trace_level == 'OFF') {
	unset_config('debug');
} else {
	set_config('debug', $debug_trace_level);
}

set_plugin_setting('timing', get_input('timing'), 'elgg_developer_tools');

set_plugin_setting('showviews', get_input('showviews'), 'elgg_developer_tools');

set_plugin_setting('showstrings', get_input('showstrings'), 'elgg_developer_tools');

set_plugin_setting('logevents', get_input('logevents'), 'elgg_developer_tools');


system_message(elgg_echo("elgg_dev_tools:message:successfulupdate"));
forward($CONFIG->wwwroot . 'pg/elgg_dev_tools/');
