<?php
	/**
	 * Elgg openlabs plugin
	 * 
	 * @package Elggopenlabs from ElggGroups
	 */

	// new openlabs default to open membership
	if (isset($vars['entity'])) {
		$membership = $vars['entity']->membership;
	} else {
		$membership = ACCESS_PUBLIC;
	}
	
?>
<div class="contentWrapper">
<form action="<?php echo $vars['url']; ?>action/openlabs/edit" enctype="multipart/form-data" method="post">

	<?php echo elgg_view('input/securitytoken'); ?>

	<p>
		<label><?php echo elgg_echo("openlabs:icon"); ?><br />
		<?php

			echo elgg_view("input/file",array('internalname' => 'icon'));
		
		?>
		</label>
	</p>
<?php

	//var_export($vars['profile']);
	if (is_array($vars['config']->openlab) && sizeof($vars['config']->openlab) > 0)
		foreach($vars['config']->openlab as $shortname => $valtype) {
			
?>

	<p>
		<label>
			<?php echo elgg_echo("openlabs:{$shortname}") ?><br />
			<?php echo elgg_view("input/{$valtype}",array(
															'internalname' => $shortname,
															'value' => $vars['entity']->$shortname,
															)); ?>
		</label>
	</p>

<?php
			
		}
?>
       
	<p>
		<label>
			<?php echo elgg_echo('openlabs:membership'); ?><br />
			<?php echo elgg_view('input/access', array('internalname' => 'membership','value' => $membership, 'options' => array( ACCESS_PRIVATE => elgg_echo('openlabs:access:private')))); ?>
		</label>
	</p>
	<?php

	if (get_plugin_setting('hidden_openlabs', 'openlabs') == 'yes')
	{
?>

	<p>
		<label>
			<?php echo elgg_echo('openlabs:visibility'); ?><br />
			<?php 
			
			$this_owner = $vars['entity']->owner_guid;
			if (!$this_owner) {
				$this_owner = get_loggedin_userid();
			}
			
			$access = array(ACCESS_FRIENDS => elgg_echo("access:friends:label"), ACCESS_LOGGED_IN => elgg_echo("LOGGED_IN"), ACCESS_PUBLIC => elgg_echo("PUBLIC"));
			$collections = get_user_access_collections($vars['entity']->guid);
			if (is_array($collections)) {
				foreach ($collections as $c)
					$access[$c->id] = $c->name;
			}

			$current_access = ($vars['entity']->access_id ? $vars['entity']->access_id : ACCESS_PUBLIC);
			echo elgg_view('input/access', array('internalname' => 'vis', 
												'value' =>  $current_access,
												'options' => $access));
			
			
			?>
		</label>
	</p>

<?php 	
	}
	
	?>
	
    <?php
		if (isset($vars['config']->group_tool_options)) {
			foreach($vars['config']->group_tool_options as $openlab_option) {
				$openlab_option_toggle_name = $openlab_option->name."_enable";
				if ($openlab_option->default_on) {
					$openlab_option_default_value = 'yes';
				} else {
					$openlab_option_default_value = 'no';
				}
?>	
    <p>
			<label>
				<?php echo $openlab_option->label; ?><br />
				<?php

/* STD Desactiovation des choix 	
 * 				echo elgg_view("input/radio",array(
									"internalname" => $openlab_option_toggle_name,
									"value" => $vars['entity']->$openlab_option_toggle_name ? $vars['entity']->$openlab_option_toggle_name : $openlab_option_default_value,
									'options' => array(
														elgg_echo('openlabs:yes') => 'yes',
														elgg_echo('openlabs:no') => 'no',
													   ),
													));
 * */
 
				?>
			</label>
	</p>
	<?php
		}
	}
	?>
	<p>
		<?php
			if ($vars['entity'])
			{ 
		?>
		<input type="hidden" name="openlab_guid" value="<?php echo $vars['entity']->getGUID(); ?>" />
		<?php
			}
		?>
		<input type="submit" class="submit_button" value="<?php echo elgg_echo("save"); ?>" />
		
	</p>

</form>
</div>

<?php
if ($vars['entity']) {
?>
<div class="contentWrapper">
<div id="delete_openlab_option">
	<form action="<?php echo $vars['url'] . "action/openlabs/delete"; ?>">
		<?php
			echo elgg_view('input/securitytoken');
				$warning = elgg_echo("openlabs:deletewarning");
			?>

			<input type="hidden" name="openlab_guid" value="<?php echo $vars['entity']->getGUID(); ?>" />
			<input type="submit" name="delete" value="<?php echo elgg_echo('openlabs:delete'); ?>" onclick="javascript:return confirm('<?php echo $warning; ?>')"/>
	</form>
</div><div class="clearfloat"></div>
</div>
<?php
}
?>