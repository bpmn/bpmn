<?php
/**
 * Elgg Dev Tools Language File
 *
 * @package Elgg Developer Tools
 * @author Aaron Saray (102degrees.com)
 * @author Cash Costello
 */


$english = array(
// generics
	'elgg_dev_tools:title'		=> 'Elgg Development Tools',
	'elgg_dev_tools:adminlink'	=> 'Elgg Developer Tools',
	'elgg_dev_tools:yes'		=> 'Yes',
	'elgg_dev_tools:no'			=> 'No',


// settings 
	'elgg_dev_tools:settings'					=> "Developer Settings",
	'elgg_dev_tools:message:successfulupdate'	=> 'The Developer Settings have been updated.',
	'elgg_dev_tools:settings:explanation'		=> 'Control your development and debugging settings below. Some of these are also available from the Site Administration section of Elgg.',
	'elgg_dev_tools:settings:formbutton'		=> 'Update Settings',
	'elgg_dev_tools:simplecache:question'		=> 'Use simple cache?',
	'elgg_dev_tools:simplecache:explanation'	=> 'The simple cache handles caching javascript and css files. You will usually want to turn this off when developing a plugin.',
	'elgg_dev_tools:viewscache:question'		=> 'Use views filepath cache?',
	'elgg_dev_tools:viewscache:explanation'		=> 'The views cache records the location of each view. If you are adding views to a plugin, you definitely want this off.',
	'elgg_dev_tools:displayerrors:question'		=> 'Display errors?',
	'elgg_dev_tools:displayerrors:explanation'	=> "This controls whether PHP warnings and errors are written to the browser screen. This is normally set in php.ini and is overwritten by Elgg's .htaccess file to be off.",
	'elgg_dev_tools:enablefirephp:question'		=> 'Enable FirePHP logging?',
	'elgg_dev_tools:enablefirephp:explanation'	=> 'Enable the FirePHP logging class - useful for ajax development or pushing debug information to Firebug.  See <a href="http://firephp.org">firephp.org</a>.',
	'elgg_dev_tools:enablefirephp:warning'		=> "FirePHP is saying that you don't have the FirePHP Firefox extension installed.  If you really don't, check out <a href=\"http://firephp.org\">firephp.org</a> to get it.  Otherwise, just ignore this message.",
	'elgg_dev_tools:debug:question'				=> 'Elgg debug trace level',
	'elgg_dev_tools:debug:explanation'			=> "Production sites normally use ERROR or OFF. NOTICE logs all the database queries.",
	'elgg_dev_tools:htmllog:question'			=> 'Display logging and debugging in footer of page?',
	'elgg_dev_tools:htmllog:explanation'		=> "This displays debug information just above the footer of the page.",
	'elgg_dev_tools:timing:question'			=> 'Enable page creation timing?',
	'elgg_dev_tools:timing:explanation'			=> "This writes the amount of time the page creation process took to your error log.",
	'elgg_dev_tools:showviews:question'			=> 'Wrap views with div elements?',
	'elgg_dev_tools:showviews:explanation'		=> 'This wraps almost every view with a div container named for the view. Useful for finding the view creating particular HTML.',
	'elgg_dev_tools:showstrings:question'		=> 'Show raw translation strings?',
	'elgg_dev_tools:showstrings:explanation'	=> 'This displays the translation strings used by elgg_echo()',
	'elgg_dev_tools:logevents:question'			=> 'Log events?',
	'elgg_dev_tools:logevents:explanation'		=> 'Write events and plugin hooks to the log. Warning: there are many of these per page.',
    /** disable error handler **/
    'elgg_dev_tools:handler:error:question'		=> 'Disable elgg error handler?',
    'elgg_dev_tools:handler:error:explanation'	=> "Elgg routes PHP errors through its own error handler controlled by the debug trace level. See __elgg_php_error_handler() for details.",

    /** disable exception handler **/
    'elgg_dev_tools:handler:exception:question'	=> 'Disable elgg exception handler?',
	'elgg_dev_tools:handler:exception:explanation'=> "Elgg registers an exception handler that sends them to PHP's error log and the screen. See __elgg_php_exception_handler() for details.",

    /** Create debug.log in the elgg uploads directory **/
    'elgg_dev_tools:errorlog:question'			=> 'Create debug log in elgg data directory?',
	'elgg_dev_tools:errorlog:explanation'		=> 'If you\'re on a shared host, it can be difficult to debug elgg if all logging goes to a shared error log. This will log to a debug.log file.',

// plugin builder
	'elgg_dev_tools:builder'					=> "Plugin Builder",
	'elgg_dev_tools:message:successfulbuild'	=> 'Your plugin %s has been created',
	'elgg_dev_tools:error:nopluginname'			=> 'Plugin name is a required field',
	'elgg_dev_tools:error:dir_error'			=> 'Error creating the directory %s',
	'elgg_dev_tools:error:file_error'			=> 'Error creating the file %s',
	'elgg_dev_tools:builder:explanation'		=> 'Build the skeleton of a plugin by setting the parameters below.',
	'elgg_dev_tools:builder:formbutton'			=> 'Build Plugin',
	'elgg_dev_tools:plugin_name'				=> 'Plugin name',
	'elgg_dev_tools:plugin_name:explanation'	=> 'Name of your plugin directory. Recommend no special characters or spaces.',
	'elgg_dev_tools:pages'						=> 'Primary pages',
	'elgg_dev_tools:pages:explanation'			=> 'Comma-separated list of primary pages. Example: index, friends, users',
	'elgg_dev_tools:page_handler'				=> 'Page handler',
	'elgg_dev_tools:page_handler:explanation'	=> "If you want a page handler, enter the identifier here. Example: 'test' gives you a page handler address of http://example.org/pg/test/",
	'elgg_dev_tools:actions'					=> 'Actions',
	'elgg_dev_tools:actions:explanation'		=> 'Comma-separated list of actions that you want to register with the system',
	'elgg_dev_tools:plugin_settings'			=> 'Plugin settings',
	'elgg_dev_tools:plugin_settings:explanation'=> 'Will the plugin have any configuration options for the administrator?',
	'elgg_dev_tools:user_settings'				=> 'User settings',
	'elgg_dev_tools:user_settings:explanation'	=> 'Will the plugin have any configuration options for the user?',
	'elgg_dev_tools:widget'						=> 'Widget',
	'elgg_dev_tools:widget:explanation'			=> "Will the plugin have a widget for a user's profile or dashboard?",
	'elgg_dev_tools:css'						=> 'Extend CSS',
	'elgg_dev_tools:css:explanation'			=> 'Will your plugin need to add anything to the CSS?',

// inspect
	'elgg_dev_tools:inspect'					=> 'Inspect',
	'elgg_dev_tools:inspect:explanation'		=> 'Inspect global variables of the Elgg framework.',

	'elgg_dev_tools:event_log_msg'				=> "%s: '%s, %s' in %s",


);

add_translation("en", $english);
