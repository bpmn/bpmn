<?php
	/**
	* likes
	*
	* @author likes
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/

//Add river itemtime
$time_posted = friendly_time($vars['item']->posted);
$time_posted = <<<EOT
	<span class="river_item_time">
		$time_posted
	</span>
EOT;
$vars['body'] = preg_replace('/\<\!\-\-\s?itemtime\s?\-\-\>/', $time_posted, $vars['body'], 1);

//Add river action buttons
$item_action_view = elgg_view('river/item/actions', $vars);
$item_action = <<<EOT
	<span class='river_action_links'>
		$item_action_view
	</span>
EOT;
$vars['body'] = preg_replace('/\<\!\-\-\s?river_actions\s?\-\-\>/', $item_action, $vars['body'], 1);

$separator = "<div class='item_separator'>&nbsp;</div>";
$vars['body'] = preg_replace('/\<\!\-\-\s?separator\s?\-\-\>/', $separator, $vars['body'], 2);

$river_content = <<<EOT
	<p class="river_item_body">
		{$vars['body']}
	</p>
EOT;

//get the site admins choice avatars or action icons
$avatar_icon = get_plugin_setting("avatar_icon","riverdashboard");
if(!$avatar_icon) {
	$avatar_icon = "icon";
}
if($avatar_icon == "icon"){

	?>
	<div class="river_item">
		<div class="river_<?php echo $vars['item']->type; ?>">
			<div class="river_<?php echo $vars['item']->subtype; ?>">
				<div class="river_<?php echo $vars['item']->action_type; ?>">
					<div class="river_<?php echo $vars['item']->type; ?>_<?php if($vars['item']->subtype) echo $vars['item']->subtype . "_"; ?><?php echo $vars['item']->action_type; ?>">
						<?php echo $river_content ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
} else {
	?>
	<div class="river_item">
		<span class="river_item_useravatar">
			<?php
				echo elgg_view("profile/icon",array('entity' => get_entity($vars['item']->subject_guid), 'size' => 'tiny'));
			?>
		</span>
		<?php echo $river_content ?>
		<div class="clearfloat"></div>
	</div>
	<?php
}
?>