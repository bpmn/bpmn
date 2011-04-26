<?php 
/**
 * Settings Form View
 * 
 * This is the form that the admin uses to change elgg dev tools options
 * 
 * @package Elgg Developer Tools
 * @author Aaron Saray (102degrees.com)
 * @author Cash Costello
 */

$simplecache_flag = $vars['config']->simplecache_enabled;
$viewscache_flag = $vars['config']->viewpath_cache_enabled;
$firephp_flag = (int) get_plugin_setting('enablefirephp', 'elgg_developer_tools');
//$htmllog_flag = (int) get_plugin_setting('htmllog', 'elgg_developer_tools');
$displayerrors_flag = (int) get_plugin_setting('displayerrors', 'elgg_developer_tools');
$errorlog_flag = (int) get_plugin_setting('errorlog', 'elgg_developer_tools');
$errorhandler_flag = (int) get_plugin_setting('errorhandler', 'elgg_developer_tools');
$exceptionhandler_flag = (int) get_plugin_setting('exceptionhandler', 'elgg_developer_tools');
$timing_flag = (int) get_plugin_setting('timing', 'elgg_developer_tools');
$showviews_flag = (int) get_plugin_setting('showviews', 'elgg_developer_tools');
$showstrings_flag = (int)get_plugin_setting('showstrings', 'elgg_developer_tools');
$logevents_flag = (int)get_plugin_setting('logevents', 'elgg_developer_tools');
$debug_level = $vars['config']->debug;
if (!$debug_level) {
	$debug_level = 'OFF';
}

/******************** build form *******************************/

$form_body = '<p>' . elgg_echo('elgg_dev_tools:settings:explanation') . '</p>';

/** simple cache **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:simplecache:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$simplecache_flag, 'internalname'=>'usesimplecache', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:simplecache:explanation') . '</em></p>';
/** end simple cache **/

/** views cache **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:viewscache:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$viewscache_flag, 'internalname'=>'useviewscache', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:viewscache:explanation') . '</em></p>';
/** end views cache **/

/** display errors **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:displayerrors:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$displayerrors_flag, 'internalname'=>'displayerrors', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:displayerrors:explanation') . '</em></p>';
/** end display errors **/

/** firephp **/
$form_body .= '<p><h4>' . elgg_echo('elgg_dev_tools:enablefirephp:question') . '</h4>';

// helper - see if fire php extension is installed - sometimes is wrong - drat
if ($value) {
    if (class_exists('FirePHP')) {
        $fb = FirePHP::getInstance(TRUE);
        if (!$fb->detectClientExtension()) {
            $form_body .= '<em class="error" id="firephperror">' . elgg_echo('elgg_dev_tools:enablefirephp:warning') . '</em><br />';
        }
    } 
}

$form_body .= elgg_view('input/radio', array('value'=>$firephp_flag, 'internalname'=>'enablefirephp', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:enablefirephp:explanation') . '</em></p>';
/** end firephp **/


/** debug **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:debug:question') . "</h4>";
$form_body .= elgg_view('input/pulldown', array('value'=>$debug_level, 'internalname'=>'debug', 'options'=>array('OFF', 'ERROR', 'WARNING', 'NOTICE')));
$form_body .= '<br /><em>' . elgg_echo('elgg_dev_tools:debug:explanation') . '</em></p>';
/** end debug **/

/** log to footer **/
/*
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:htmllog:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$htmllog_flag, 'internalname'=>'htmllog', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:htmllog:explanation') . '</em></p>';
 * 
 */
/** end log to footer **/

/** disable elgg error handler **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:handler:error:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$errorhandler_flag, 'internalname'=>'errorhandler', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:handler:error:explanation') . '</em></p>';
/** end disable elgg error handler **/

/** disable elgg exception handler **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:handler:exception:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$exceptionhandler_flag, 'internalname'=>'exceptionhandler', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:handler:exception:explanation') . '</em></p>';
/** end disable elgg exception handler **/

/** log to elgg uploads directory **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:errorlog:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$errorlog_flag, 'internalname'=>'errorlog', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:errorlog:explanation') . '</em></p>';
/** end log to elgg uploads directory **/

/** timing **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:timing:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$timing_flag, 'internalname'=>'timing', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:timing:explanation') . '</em></p>';
/** end timing **/

/** show views **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:showviews:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$showviews_flag, 'internalname'=>'showviews', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:showviews:explanation') . '</em></p>';
/** show views **/

/** show views **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:showstrings:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$showstrings_flag, 'internalname'=>'showstrings', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:showstrings:explanation') . '</em></p>';
/** show views **/

/** log events **/
$form_body .= "<p><h4>" . elgg_echo('elgg_dev_tools:logevents:question') . "</h4>";
$form_body .= elgg_view('input/radio', array('value'=>$logevents_flag, 'internalname'=>'logevents', 'options'=>array(elgg_echo('elgg_dev_tools:yes')=>1, elgg_echo('elgg_dev_tools:no')=>0)));
$form_body .= '<em>' . elgg_echo('elgg_dev_tools:logevents:explanation') . '</em></p>';
/** log events **/

$form_body .= "<br /><br />";

$form_body .= elgg_view('input/submit', array('value'=>elgg_echo('elgg_dev_tools:settings:formbutton')));

echo elgg_view('input/form', array('body'=>$form_body, 'action'=>$CONFIG->wwwroot . 'action/elgg_dev_tools/updatesettings', 'internalid'=>'elgg_dev_tools_form'));
