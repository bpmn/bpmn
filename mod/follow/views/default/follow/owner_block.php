<?php

$label = elgg_echo('follow:this');
$user = get_loggedin_user();
$entity_guid=page_owner();
$url = elgg_add_action_tokens_to_url("{$vars['url']}action/follow/add_follow?user_guid={$user->guid}&entity_guid={$entity_guid}");
?>
<div id="owner_block_follow_this">
<a href="<?php echo $url; ?>"><?php echo $label ?></a>
</div>



