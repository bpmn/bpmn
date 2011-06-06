<?php
/**
* Widgets Plus! - Default & Locked Widgets, Custom Widget Titles & Links
*
* @package widgets_plus
* @author John Jakubowski (Xeno Media, Inc.)
* @copyright Xeno Media, Inc. 2010
* @link http://www.xenomedia.com/
*/

$showadmin = isadminloggedin();
$widgettypes = get_widget_types();
$context = get_context();
$owner = page_owner();

$ts = time();
$token = generate_action_token($ts);
$columns = array('', array('left'), array('middle'), array('right'));
for ($x = 1; $x < 4; $x++) $columns[$x][1] = get_widgets($owner, $context, $x);
$columns[0] = $columns[3]; //shuffle around the order
unset($columns[3]); //remove extra

if (empty($columns[0][1]) AND empty($columns[1][1]) AND empty($columns[2][1]))
{	//defaults for blank widgets
	if (isset($vars['area3'])) $vars['area1'] = $vars['area3'];
	if (isset($vars['area4'])) $vars['area2'] = $vars['area4'];
}

if ($ownerentity = page_owner_entity() AND $ownerentity->canEdit()) { ?>
<div id="customise_editpanel">
	<div id="customise_editpanel_rhs">
		<h2><?php echo elgg_echo("widgets:gallery"); ?></h2>
		<div id="widget_picker_gallery">
			<?php foreach ($widgettypes AS $handler => $widget)
			{
				$mult = $side = $main = '';
		
				if (isset($widget->handler) AND $winfo =& $widgettypes[$widget->handler])
				{
					if (isset($winfo->multiple)) $mult = $winfo->multiple;
		
					if (is_array($winfo->positions))
					{
						$side = in_array('side', $winfo->positions);
						$main = in_array('main', $winfo->positions);
					}
				}
		
				?>
				<table class="draggable_widget" cellspacing="0">
				<tr>
					<td><h3>
						<?php echo $widget->name; ?>
						<input type="hidden" name="multiple" value="<?php echo $mult; ?>" />
						<input type="hidden" name="side" value="<?php echo $side; ?>" />
						<input type="hidden" name="main" value="<?php echo $main; ?>" />
						<input type="hidden" name="handler" value="<?php echo htmlentities($handler, ENT_QUOTES, 'UTF-8'); ?>" />
						<input type="hidden" name="description" value="<?php echo htmlentities($widget->description, ENT_QUOTES, 'UTF-8'); ?>" />
						<input type="hidden" name="guid" value="0" />
					</h3></td>
					<td width="17px" align="right"></td>
					<td width="17px" align="right"><a href="#"><img src="<?php echo $vars['url']; ?>_graphics/spacer.gif" width="14px" height="14px" class="more_info" /></a></td>
					<td width="17px" align="right"><a href="#"><img src="<?php echo $vars['url']; ?>_graphics/spacer.gif" width="15px" height="15px" class="drag_handle" /></a></td>
				</tr>
				</table>
			<?php } ?>
			<br />
		</div>
	</div>

	<div class="customise_editpanel_instructions">
		<h2><?php echo elgg_echo('widgets:add'); ?></h2>
		<?php echo elgg_view('output/longtext', array('value' => elgg_echo('widgets:add:description'))); ?>
	</div>

	<div id="customise_page_view">
		<table cellspacing="0">
		<?php foreach ($columns AS $i => $column)
		{
			$extra = '';

			if ($column[0] == 'right')
			{
				?><tr><td colspan="2" align="left" valign="top"><?php

				if ($context == 'profile')
				{
					?><h2 class="profile_box"><?php echo elgg_echo('widgets:profilebox'); ?></h2>
					<div id="profile_box_widgets">
					<p><small><?php echo elgg_echo('widgets:position:fixed'); ?></small></p>
					</div><?php

					$extra = ' class="long"';
				}

				?></td><td rowspan="2" align="left" valign="top"><?php
			}
			else
			{
				if ($column[0] == 'left') { ?><tr><?php }
				?><td><?php
			}

					?><h2><?php echo elgg_echo('widgets:' . $column[0] . 'column'); ?></h2>
					<div id="<?php echo $column[0]; ?>column_widgets"<?php echo $extra; ?>>

					<?php if (is_array($column[1]))
					{
						foreach ($column[1] AS $widget)
						{
							$widgetid = $widget->getGUID();
							$column[2] .= ( $column[2] ? '::' : '' ) . $widget->handler . '::' . $widgetid;
							$winfo =& $widgettypes[$widget->handler];

							?><table class="draggable_widget" cellspacing="0">
							<tr>
								<td width="149px"><h3>
									<?php echo ( $widget->widget_title ? ( ($widget->widget_title == '<none>') ? '' : $widget->widget_title ) : ( $winfo->name ? $winfo->name : $widget->handler ) ); ?>
									<input type="hidden" name="handler" value="<?php echo $widget->handler; ?>" />
									<input type="hidden" name="multiple" value="<?php echo $winfo->multiple; ?>" />
									<input type="hidden" name="side" value="<?php echo in_array('side', $winfo->positions); ?>" />
									<input type="hidden" name="main" value="<?php echo in_array('main', $winfo->positions); ?>" />
									<input type="hidden" name="description" value="<?php echo htmlentities($winfo->description, ENT_QUOTES, 'UTF-8'); ?>" />
									<input type="hidden" name="guid" value="<?php echo $widgetid; ?>" />
								</h3></td>
								<td width="17px" align="right"></td>
								<td width="17px" align="right"><a href="#"><img src="<?php echo $vars['url']; ?>_graphics/spacer.gif" width="14px" height="14px" class="more_info" /></a></td>
								<td width="17px" align="right"><?php if ($showadmin OR !$widget->locked) { ?><a href="#"><img src="<?php echo $vars['url']; ?>_graphics/spacer.gif" width="15px" height="15px" class="drag_handle" /></a><?php } ?></td>
							</tr>
							</table><?php
						}
					}

					?></div>
				</td><?php

			if (in_array($column[0], array('right', 'middle'))) { ?></tr><?php }
			$columns[$i][2] = $column[2]; //copy to main array
		} ?>
		</table>
	</div>

	<form action="<?php echo $vars['url']; ?>action/widgets/reorder" method="post">
		<textarea type="textarea" value="Left widgets"   style="display:none" name="debugField1" id="debugField1" /><?php echo $columns[1][2]; ?></textarea>
		<textarea type="textarea" value="Middle widgets" style="display:none" name="debugField2" id="debugField2" /><?php echo $columns[2][2]; ?></textarea>
		<textarea type="textarea" value="Right widgets"  style="display:none" name="debugField3" id="debugField3" /><?php echo $columns[0][2]; ?></textarea>
		
		<input type="hidden" name="context" value="<?php echo $context; ?>" />
		<input type="hidden" name="owner" value="<?php echo $owner; ?>" />
		<input type="hidden" name="__elgg_ts" value="<?php echo $ts; ?>" />
		<input type="hidden" name="__elgg_token" value="<?php echo $token; ?>" />
		
		<input type="submit" value="<?php echo elgg_echo('save'); ?>" class="submit_button" onclick="$('a.toggle_customise_edit_panel').click();" />
		<input type="button" value="<?php echo elgg_echo('cancel'); ?>" class="cancel_button" onclick="$('a.toggle_customise_edit_panel').click();" />
	</form>
</div>

<?php } ?>

<table cellspacing="0" id="widget_table">
<?php foreach ($columns AS $column)
{
	if ($column[0] == 'right')
	{
		?><tr>
		<td colspan="2" align="left" valign="top" height="1px">
			<?php if (isset($vars['area1'])) echo $vars['area1']; ?>
		</td>
		<td rowspan="2" align="left" valign="top" height="100%">

		<?php if ($owner == $_SESSION['user']->guid)
		{
			?><a href="#" class="toggle_customise_edit_panel"><?php echo(elgg_echo('dashboard:configure')); ?></a>
			<?php if ($showadmin AND $owner == ( ($temp = get_plugin_setting('widgets_plus_admin', 'widgets_plus')) ? intval($temp) : 2 )) { ?><a href="<?php echo $vars['url']; ?>action/widgets/clone?__elgg_token=<?php echo $token; ?>&__elgg_ts=<?php echo $ts; ?>" class="dashboard_link"><?php echo(elgg_echo('widgets_plus:clone')); ?></a><?php }
		}
	}
	else
	{
		if ($column[0] == 'left') { ?><tr><?php }
		?><td align="left" valign="top"><?php
	}

			?><div id="widgets_<?php echo $column[0]; ?>"><?php
			if ($column[0] == 'middle' AND isset($vars['area2'])) echo $vars['area2'];

			if (is_array($column[1]))
			{
				foreach ($column[1] AS $widget) echo elgg_view_entity($widget);
			}

			?></div>
		</td><?php

	if (in_array($column[0], array('right', 'middle'))) { ?></tr><?php }
} ?>
</table>