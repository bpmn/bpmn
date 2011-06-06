<?php
/**
* Widgets Plus! - Default & Locked Widgets, Custom Widget Titles & Links
*
* @package widgets_plus
* @author John Jakubowski (Xeno Media, Inc.)
* @copyright Xeno Media, Inc. 2010
* @link http://www.xenomedia.com/
*/

$guid = $vars['entity']->getGUID();

if ($showadmin = isadminloggedin() OR get_plugin_setting('widgets_plus_perms', 'widgets_plus'))
{	//show title/link if admin or allowed
	$form_body = '<p><label>' . elgg_echo('link') . ': ' . elgg_view('input/text', array('internalname' => 'params[link]', 'value' => $vars['entity']->link)) . '</label></p>';
	$form_body .= ( (strpos($vars['body'], 'params[title]') === false) ? '<p><label>' . elgg_echo('title') . ': ' . elgg_view('input/text', array('internalname' => 'params[widget_title]', 'value' => $vars['entity']->widget_title)) . '</label></p>' . $vars['body'] : preg_replace('/name="params\[title\]" value="[^"]*"/', 'name="params[widget_title]" value="' . $vars['entity']->widget_title . '"', str_replace(elgg_echo('title'), elgg_echo('title') . ':', $vars['body'])) ) . elgg_view('input/hidden', array('internalname' => 'params[title]', 'value' => ''));
}	//clean up gadget junk
else $form_body = preg_replace('/<p>.*name="params\[title\]".*<p>/sU', elgg_view('input/hidden', array('internalname' => 'params[title]', 'value' => '')) . '<p>', $vars['body']);

$form_body .= '<p><label>' . elgg_echo('access') . ': ' . elgg_view('input/access', array('internalname' => 'params[access_id]', 'value' => $vars['entity']->access_id)) . '</label></p>';
if ($showadmin AND $_SESSION['user']->guid == ( ($temp = get_plugin_setting('widgets_plus_admin', 'widgets_plus')) ? intval($temp) : 2 )) $form_body .= '<p><label>' . elgg_echo('default') . ': ' . elgg_view('input/pulldown', array('internalname' => 'params[locked]', 'value' => $vars['entity']->locked, 'options_values' => array(elgg_echo('suggested'), elgg_echo('locked')))) . '</label></p>';
$form_body .= '<p>' . elgg_view('input/hidden', array('internalname' => 'guid', 'value' => $guid)) . elgg_view('input/hidden', array('internalname' => 'noforward', 'value' => 'true')) . elgg_view('input/submit', array('internalname' => "submit$guid", 'value' => elgg_echo('save'))) . '</p>';
echo elgg_view('input/form', array('internalid' => "widgetform$guid", 'body' => $form_body, 'action' => $vars['url'] . 'action/widgets/save'))
?>

<script type="text/javascript">
$(function()
{
	var form = $('#widgetform<?php echo $guid; ?>'), submit = $('#submit<?php echo $guid; ?>'), content = $('#widgetcontent<?php echo $guid; ?>');

	form.submit(function(e)
	{
		e.preventDefault();
		submit.attr('disabled', 'disabled').val('<?php echo elgg_echo('saving'); ?>');
		content.html('<?php echo elgg_view('ajax/loader', array('slashes' => true)); ?>');
		$('#widget<?php echo $guid; ?> .toggle_box_edit_panel').click();

		$.post(form.attr('action'), form.serialize(), function()
		{
			submit.removeAttr('disabled').val('<?php echo elgg_echo('save'); ?>');
			content.load('<?php echo $vars['url']; ?>pg/view/<?php echo $guid; ?>?shell=no&username=<?php echo page_owner_entity()->username; ?>&context=<?php echo get_context(); ?>&callback=true');
		});
	});
});
</script>