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

	global $ASKQUESTION_likes;
	run_function_once("likes_question_for_ping");
	if ($ASKQUESTION_likes) {
		echo elgg_view('likes/question/wrapper');
	}

	if (!isset($vars['entity']->autodetect_items)) {
		$vars['entity']->autodetect_items = 'yes';
	}
	if (!isset($vars['entity']->enable_ajaxsupport)) {
		$vars['entity']->enable_ajaxsupport = 'yes';
	}
	if (!isset($vars['entity']->allowdislike)) {
		$vars['entity']->allowdislike = 'no';
	}
?>	
<p>
	<?php echo elgg_echo('like:autodetect_items'); ?>
	<select name="params[autodetect_items]">
		<option value="yes" <?php if ($vars['entity']->autodetect_items == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->autodetect_items != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:enable_ajaxsupport'); ?>
	<select name="params[enable_ajaxsupport]">
		<option value="yes" <?php if ($vars['entity']->enable_ajaxsupport == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->enable_ajaxsupport != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:allowdislike'); ?>
	<select name="params[allowdislike]">
		<option value="yes" <?php if ($vars['entity']->allowdislike == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->allowdislike != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php
	if ($vars['entity']->autodetect_items != 'no') {
		return false;
	}

?>
	<br />
	<h3><?php echo elgg_echo('likes:admin:subtitle') ?></h3>
	<br />
<p>
	<?php echo elgg_echo('like:show:thewire'); ?>
	<select name="params[show_thewire]">
		<option value="yes" <?php if ($vars['entity']->show_thewire == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_thewire != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:show:messageboard'); ?>
	<select name="params[show_messageboard]">
		<option value="yes" <?php if ($vars['entity']->show_messageboard == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_messageboard != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:show:bookmarks'); ?>
	<select name="params[show_bookmarks]">
		<option value="yes" <?php if ($vars['entity']->show_bookmarks == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_bookmarks != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:show:file'); ?>
	<select name="params[show_file]">
		<option value="yes" <?php if ($vars['entity']->show_file == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_file != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:show:blog'); ?>
	<select name="params[show_blog]">
		<option value="yes" <?php if ($vars['entity']->show_blog == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_blog != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:show:page'); ?>
	<select name="params[show_page]">
		<option value="yes" <?php if ($vars['entity']->show_page == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_page != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:show:topic'); ?>
	<select name="params[show_topic]">
		<option value="yes" <?php if ($vars['entity']->show_topic == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_topic != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php 
	if (is_plugin_enabled('tidypics')) {
?>
<p>
	<?php echo elgg_echo('like:show:tidypics_image'); ?>
	<select name="params[show_tidypics_image]">
		<option value="yes" <?php if ($vars['entity']->show_tidypics_image == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_tidypics_image != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<p>
	<?php echo elgg_echo('like:show:tidypics_album'); ?>
	<select name="params[show_tidypics_album]">
		<option value="yes" <?php if ($vars['entity']->show_tidypics_album == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_tidypics_album != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php 
	}
?>
<?php 
	if (is_plugin_enabled('izap_videos')) {
?>
<p>
	<?php echo elgg_echo('like:show:izap_videos'); ?>
	<select name="params[show_izap_videos]">
		<option value="yes" <?php if ($vars['entity']->show_izap_videos == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_izap_videos != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php 
	}
?>
<?php 
	if (is_plugin_enabled('event_calendar')) {
?>
<p>
	<?php echo elgg_echo('like:show:event_calendar'); ?>
	<select name="params[show_event_calendar]">
		<option value="yes" <?php if ($vars['entity']->show_event_calendar == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->show_event_calendars != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>
<?php 
	}
	//Developed by Keetup
	echo elgg_view('developed_by_keetup')
?>