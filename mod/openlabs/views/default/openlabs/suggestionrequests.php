<div class="contentWrapper">

<?php

	if (!empty($vars['suggestions']) && is_array($vars['suggestions'])) {
		$user = get_loggedin_user();
		foreach($vars['suggestions'] as $openlab)
			if ($openlab instanceof ElggGroup) {

?>
	<div class="reportedcontent_content active_report">
		<div class="openlabs_membershiprequest_buttons">
			<?php
				echo "<div class=\"member_icon\"><a href=\"" . $openlab->getURL() . "\">";
				echo elgg_view("profile/icon", array(
					'entity' => $openlab,
					'size' => 'small',
					'override' => 'true'
				));
				echo "</a></div>{$openlab->name}<br />";

				echo str_replace('<a', '<a class="delete_report_button" ', elgg_view('output/confirmlink',array(
					'href' => $vars['url'] . "action/openlabs/killsuggestion?user_guid={$user->getGUID()}&openlab_guid={$openlab->getGUID()}",
					'confirm' => elgg_echo('openlabs:invite:remove:check'),
					'text' => elgg_echo('delete'),
				)));
			$url = elgg_add_action_tokens_to_url("{$vars['url']}action/openlabs/joinrequest?user_guid={$user->guid}&openlab_guid={$openlab->guid}");
			?>
			<a href="<?php echo $url; ?>" class="archive_report_button"><?php echo elgg_echo('accept'); ?></a>
			<br /><br />
		</div>
	</div>
<?php

			}

	} else {

		echo "<p>" . elgg_echo('openlabs:suggestions:none') . "</p>";

	}

?>
</div>
