<?php
	/**
	 * Elgg user display (small)
	 *
	 * @package ElggGroups
	 *
	 * @uses $vars['entity'] The user entity
	 */

	$icon = elgg_view(
			"teams/icon", array(
									'entity' => $vars['entity'],
									'size' => 'small',
								)
		);

	//get the membership type
	$membership = $vars['entity']->membership;
	if ($membership == ACCESS_PUBLIC) {
		$mem = elgg_echo("teams:open");
	} else {
		$mem = elgg_echo("teams:closed");
	}

        // afficher le status de la relation avec la team
        
        $member_type="";
        if (isloggedin()){
            if ($vars['entity']->owner_guid == get_loggedin_user()->guid)
                $member_type="owner";
            else
            $member_type="member";
            }

	//for admins display the feature or unfeature option
	if($vars['entity']->featured_group == "yes"){
		$url = elgg_add_action_tokens_to_url($vars['url'] . "action/teams/featured?group_guid=" . $vars['entity']->guid . "&action_type=unfeature");
		$wording = elgg_echo("teams:makeunfeatured");
	}else{
		$url = elgg_add_action_tokens_to_url($vars['url'] . "action/teams/featured?group_guid=" . $vars['entity']->guid . "&action_type=feature");
		$wording = elgg_echo("teams:makefeatured");
	}

	$info .= "<div class=\"teamsdetails\"><p>" . $mem . " / <b>" . get_group_members($vars['entity']->guid, 10, 0, 0, true) ."</b> " . elgg_echo("teams:member") . "</p>";
	//if admin, show make featured option
	if(isadminloggedin())
		$info .= "<p><a href=\"{$url}\">{$wording}</a></p>";
	$info .= "</div>";
	$info .= "<p><b><a href=\"" . $vars['entity']->getUrl() . "\">" . $vars['entity']->name . "</a>         " .$member_type."</b></p>";
	$info .= "<p class=\"owner_timestamp\">" . $vars['entity']->briefdescription . "</p>";

       
	// num users, last activity, owner etc

	echo elgg_view_listing($icon, $info);

?>
