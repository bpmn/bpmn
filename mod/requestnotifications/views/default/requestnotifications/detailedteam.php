<?php
	/**
	 * RequestNotifications detailed view
	 * 
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */
?>
	
<?php
	$user = get_loggedin_user();		
	$count = 0;
	
	$ts = time();
	$token = generate_action_token($ts);
?>

<h2 class="requestnotifications_title"><?php echo elgg_echo('requestnotifications:title'); ?></h2>

<div class="requestnotifications_wrapper">

	<?php
	// User friend requests detail	
		$fr_count = get_entities_from_relationship("friendrequest", $user->guid, true, "user", "", 0, "", 0, 0, true);
		if(isset($fr_count) && $fr_count > 0) {
			$entities = get_entities_from_relationship("friendrequest", $user->guid, true, "user", "", 0, "", $fr_count);
			$content = "";
			foreach($entities as $entity) {
				$content .= "<table class='request'>\n";
				$content .= "<tr>\n";
				$content .= "<td rowspan='2'>" . elgg_view("profile/icon", array("entity" => $entity, "size" => "small")) . "</td>\n";
				$content .= "<td class='name'><a href='" . $entity->getURL() . "' title='" . $entity->briefdescription . "'>" . $entity->name . "</a></td>\n";
				$content .= "</tr>\n";
				$content .= "<tr>\n";
				$content .= "<td>";
				$content .= "<a href='" . $CONFIG->wwwroot . "action/friend_request/approve?guid=" . $entity->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("requestnotifications:approve") . "'>" . elgg_echo("requestnotifications:approve") . "</a>";
				$content .= "&nbsp;|&nbsp;";
				$content .= "<a href='" . $CONFIG->wwwroot . "action/friend_request/decline?guid=" . $entity->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("requestnotifications:decline") . "'>" . elgg_echo("requestnotifications:decline") . "</a>";
				$content .= "</td>\n";
				$content .= "</tr>\n";
				$content .= "</table>\n";
			}
			?>
			<div class="requestnotifications_box">
				<h3 class="friendrequestscount"><?php echo elgg_echo('requestnotifications:friendrequests:title'); ?></h3>				
				<?php echo $content; ?>
				<div class="clearfloat"></div>
			</div>
		  <?php
		} ?>		
	
	<?php
	// Group membership requests
		$owned_groups = get_entities('group', 'teams', $user->guid, "");
		if ($owned_groups) {
			$content = "";
			foreach($owned_groups as $group) {
				$num_gr = get_entities_from_relationship('membership_request',$group->guid,true,'','',0,'',9999,0,true);
				if ($num_gr && $num_gr > 0) {
					$count += $num_gr;
					// First show the group
					$content .= "<div class='clearfloat'></div>";
					$content .= "<table class='request'>\n";
					$content .= "<tr>\n";
					$content .= "<td rowspan='2'>" . elgg_view("groups/icon", array("entity" => $group, "size" => "small")) . "</td>\n";
					$content .= "<td class='name'><a href='" . $group->getURL() . "' title='" . $group->briefdescription . "'>" . $group->name . "</a></td>\n";
					$content .= "</tr>\n";
					$content .= "<tr>\n";
					$content .= "<td>";
					$content .= sprintf(elgg_echo('requestnotifications:grouprequests:count'), $num_gr);
					$content .= "</td>\n";
					$content .= "</tr>\n";					
					$content .= "</table>\n";					
					$content .= "<div class='clearfloat'></div>";
					// Second load the users that have applied and show them
					$entities = get_entities_from_relationship('membership_request',$group->guid,true,'','',0,'',$num_gr);
					foreach($entities as $entity) {
						$content .= "<table class='subrequest'>\n";
						$content .= "<tr>\n";
						$content .= "<td rowspan='2'>" . elgg_view("profile/icon", array("entity" => $entity, "size" => "small")) . "</td>\n";
						$content .= "<td class='name'><a href='" . $entity->getURL() . "' title='" . $entity->briefdescription . "'>" . $entity->name . "</a></td>\n";
						$content .= "</tr>\n";
						$content .= "<tr>\n";
						$content .= "<td>";
						$content .= "<a href='" . $CONFIG->wwwroot . "action/groups/addtogroup?user_guid=" . $entity->guid . "&group_guid=" . $group->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("requestnotifications:approve") . "'>" . elgg_echo("requestnotifications:approve") . "</a>";
						$content .= "&nbsp;|&nbsp;";
						$content .= "<a href='" . $CONFIG->wwwroot . "action/groups/killrequest?user_guid=" . $entity->guid . "&group_guid=" . $group->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("requestnotifications:decline") . "'>" . elgg_echo("requestnotifications:decline") . "</a>";
						$content .= "</td>\n";
						$content .= "</tr>\n";
						$content .= "</table>\n";
					}
				}
			}
			if ($content != "") { ?>
			<div class="requestnotifications_box">
				<h3 class="grouprequestscount"><?php echo elgg_echo('requestnotifications:teamrequests:title'); ?></h3>				
				<?php echo $content; ?>
				<div class='clearfloat'></div>
			</div>
		  <?php
			}
		}
	?>
	
	<?php
	// Group invitations
		$num_invitations = get_entities_from_relationship('invited',$user->guid,true,'','',0,'',9999,0,true);
		if (isset($num_invitations) and $num_invitations > 0)  {
			$count += $num_invitations;
			$content = "";
			$invitations = get_entities_from_relationship('invited',$user->guid,true,'','',0,'',$num_invitations);
			foreach($invitations as $group) {				
				$content .= "<table class='request'>\n";
				$content .= "<tr>\n";
				$content .= "<td rowspan='2'>" . elgg_view("groups/icon", array("entity" => $group, "size" => "small")) . "</td>\n";
				$content .= "<td class='name'><a href='" . $group->getURL() . "' title='" . $group->briefdescription . "'>" . $group->name . "</a></td>\n";
				$content .= "</tr>\n";
				$content .= "<tr>\n";
				$content .= "<td>";
				$content .= "<a href='" . $CONFIG->wwwroot . "action/groups/joinrequest?group_guid=" . $group->guid . "' title='" . elgg_echo("requestnotifications:approve") . "'>" . elgg_echo("requestnotifications:approve") . "</a>";
				$content .= "&nbsp;|&nbsp;";
				$content .= "<a href='" . $CONFIG->wwwroot . "action/requestnotifications/removegroupinvitation?group_guid=" . $group->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("requestnotifications:decline") . "'>" . elgg_echo("requestnotifications:decline") . "</a>";
				$content .= "</td>\n";
				$content .= "</tr>\n";					
				$content .= "</table>\n";	
			}
			?>
			<div class="requestnotifications_box">
					<h3 class="groupinvitationscount"><?php echo elgg_echo('requestnotifications:teamrequests:title'); ?></h3>
					<?php echo $content; ?>
					<div class='clearfloat'></div>
			</div>	
			<?php
		}		
	?>
	
	<?php
	// Bookmarks shared with user
		$num_shared_bookmarks = get_entities_from_relationship('share',$user->guid,true,'','',0,'',9999,0,true);
		if (isset($num_shared_bookmarks) and $num_shared_bookmarks > 0) {
			$content = "";
			$count += $num_shared_bookmarks;
			$shared_bookmarks = get_entities_from_relationship('share',$user->guid,true,'object','bookmarks',0,'',$num_shared_bookmarks);
			foreach($shared_bookmarks as $bookmark) {
				$owner = $bookmark->getOwnerEntity();
				$friendlytime = friendly_time($bookmark->time_created);
				$content .= "<table class='request'>\n";
				$content .= "<tr>\n";
				$content .= "<td rowspan='2'>" . elgg_view("profile/icon", array("entity" => $owner, "size" => "small")) . "</td>\n";
				$content .= "<td class='name'><a href=\"{$bookmark->getURL()}\">{$bookmark->title}</a> (<a href=\"{$bookmark->address}\">".elgg_echo('bookmarks:visit')."</a>)</td>\n";
				$content .= "</tr>\n";
				$content .= "<tr>\n";
				$content .= "<td>";
				$content .= "<a href=\"{$vars['url']}pg/bookmarks/{$owner->username}\">{$owner->name}</a> {$friendlytime}";
				$content .= "&nbsp;|&nbsp;";
				$content .= "<a href='" . $CONFIG->wwwroot . "action/requestnotifications/removesharedbookmark?bookmark_guid=" . $bookmark->guid . "&__elgg_ts=" . $ts ."&__elgg_token=" . $token . "' title='" . elgg_echo("requestnotifications:decline") . "'>" . elgg_echo("requestnotifications:decline") . "</a>";
				$content .= "</td>\n";
				$content .= "</tr>\n";
				$content .= "</table>\n";				
			}		
			?>
			<div class="requestnotifications_box">
				<h3 class="sharedbookmarkscount"><?php echo elgg_echo('requestnotifications:sharedbookmarks:title'); ?></h3>
				<?php echo $content; ?>
				<div class='clearfloat'></div>
			</div>
		<?php
		}
	?>
	
	<?php
		// We trigger a plugin hook so other plugins can add stuff here
		// The triggered plugins should modify the 'count' param if they are adding new notifications
		$hook_params = array(count => $count);
		trigger_plugin_hook("requestnotifications_detail_add", "all", $hook_params, false);
		
		// If there are no requests, write a message telling so
		if ($hook_params[count] == 0) {				
			echo elgg_echo('requestnotifications:norequests');
		}
	?>
</div>