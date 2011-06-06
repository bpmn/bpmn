<?php
/**
* Widgets Plus! - Default & Locked Widgets, Custom Widget Titles & Links
*
* @package widgets_plus
* @author John Jakubowski (Xeno Media, Inc.)
* @copyright Xeno Media, Inc. 2010
* @link http://www.xenomedia.com/
*/

static $widgettypes, $deflinks;
$username = page_owner_entity()->username;
$title = elgg_echo($handler = 'error');
$guid = $vars['entity']->getGUID();

if (empty($widgettypes))
{
	$widgettypes = get_widget_types();

	$deflinks = array( //default links for some handlers
		'a_users_groups' => $vars['url'] . 'pg/groups/member/' . $username,
		'album_view' => $vars['url'] . 'pg/photos/owned/' . $username,
		'blog' => $vars['url'] . 'pg/blog/' . $username,
		'bookmarks' => $vars['url'] . "pg/bookmarks/$username/items",
		'event_calendar' => $vars['url'] . 'pg/event_calendar/',
		'filerepo' => $vars['url'] . 'pg/file/' . $username,
		'friends' => $vars['url'] . 'pg/friends/' . $username,
		'izap_videos' => $vars['url'] . 'pg/izap_videos/' . $username,
		'latest' => $vars['url'] . 'pg/photos/mostrecent/' . $username,
		'latest_photos' => $vars['url'] . 'pg/photos/mostrecent/' . $username,
		'messageboard' => $vars['url'] . 'pg/messageboard/' . $username,
		'pages' => $vars['url'] . 'pg/pages/owned/' . $username,
		'river_widget' => $vars['url'] . 'pg/riverdashboard/',
		'thewire' => $vars['url'] . 'pg/thewire/' . $username
	);
}
if ($vars['entity'] instanceof ElggObject AND $vars['entity']->getSubtype() == 'widget')
{
	$handler = $vars['entity']->handler;
	$title = $widgettypes[$handler]->name;
	$link = ( $vars['entity']->link ? ( ($vars['entity']->link == '<none>') ? '' : $vars['entity']->link ) : $deflinks[$handler] );
	$title = ( $vars['entity']->widget_title ? ( ($vars['entity']->widget_title == '<none>') ? '' : $vars['entity']->widget_title ) : ( $title ? $title : $handler ) );
}
if (get_input('callback') != 'true')
{
	$editable = ($vars['entity']->canEdit() AND (isadminloggedin() OR !$vars['entity']->locked));

	?>
	<div id="widget<?php echo $guid; ?>">
		<div class="collapsable_box">
			<div class="collapsable_box_<?php echo ( $editable ? 'header' : 'locked' ); ?>">
				<a href="#" class="toggle_box_contents">-</a>
				<?php if ($editable) { ?><a href="#" class="toggle_box_edit_panel"><?php echo elgg_echo('edit'); ?></a><?php } ?>
				<?php echo ( $title ? '<h1>' . ( $link ? '<a href="' . $link . '">' . $title . '</a>' : $title ) . '</h1>' : '' ); ?>
			</div>
	<?php

	if ($editable)
	{
		?><div class="collapsable_box_editpanel"><?php

		echo elgg_view('widgets/editwrapper', array(
			'body' => elgg_view("widgets/$handler/edit", $vars),
			'entity' => $vars['entity']
		));

		?></div><?php
	}

	?>
			<div class="collapsable_box_content">
				<div id="widgetcontent<?php echo $guid; ?>">
				<?php echo elgg_view('ajax/loader'); ?>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	$(function()
	{ // run function to check for widgets collapsed/expanded state
		$('#widgetcontent<?php echo $guid; ?>').load('<?php echo $vars['url']; ?>pg/view/<?php echo $guid; ?>?shell=no&username=<?php echo $username; ?>&context=widget&callback=true');
		widget_state('widget<?php echo $guid; ?>');
	});
	</script>
<?php
}
else echo ( elgg_view_exists("widgets/$handler/view") ? elgg_view("widgets/$handler/view", $vars) : elgg_echo('widgets:handlernotfound') ) . '<script language="javascript">$(setup_avatar_menu);</script>';