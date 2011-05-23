<?php
	/**
	 * RequestNotifications base view
	 * 
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */
?>

	<div class="requestnotifications_box">
		<?php
			$user = get_loggedin_user();
			
			$count = 0;
			gatekeeper();
			
			//get friend requests
			$num_fr = get_entities_from_relationship('friendrequest', $user->guid, true, "user", "", 0, "", 0, 0, true);
			if(isset($num_fr) && $num_fr > 0){
				$count += $num_fr; ?>
				<p><a href="<?php echo $vars['url']; ?>pg/friend_request" class='friendrequestscount'>
					<?php echo sprintf(elgg_echo('requestnotifications:friendrequests:count'), $num_fr); ?>
				</a></p>
		<?php }
		
			//get group membership requests
			$owned_groups = get_entities('group', '', $user->guid, "");
			if ($owned_groups) {
				$num_gr = 0;
				foreach($owned_groups as $key => $group)
					$num_gr += get_entities_from_relationship('membership_request',$group->guid,true,'','',0,'',9999,0,true);
				if ($num_gr && $num_gr > 0) {
					$count += $num_gr; ?>
					<p><a href="<?php echo $vars['url']; ?>pg/requestnotifications/" class='grouprequestscount'>
						<?php echo sprintf(elgg_echo('requestnotifications:grouprequests:count'), $num_gr); ?>
					</a></p>
					<?php
				}
			}
			
			//get group invitations
			$num_invitations = get_entities_from_relationship('invited',$user->guid,true,'','',0,'',9999,0,true);
			if(isset($num_invitations) and $num_invitations > 0) {
				$count += $num_invitations; ?>
						<p><a href="<?php echo $vars['url']; ?>pg/requestnotifications/" class='groupinvitationscount'>
							<?php echo sprintf(elgg_echo('requestnotifications:groupinvite:count'), $num_invitations); ?>
						</a></p>
			<?php }
			
			//get shared bookmarks
			$num_shared_bookmarks = get_entities_from_relationship('share',$user->guid,true,'','',0,'',9999,0,true);
			if (isset($num_shared_bookmarks) and $num_shared_bookmarks > 0) {
				$count += $num_shared_bookmarks; ?>
						<p><a href="<?php echo $vars['url']; ?>pg/bookmarks/<?php echo $user->username; ?>/inbox" class='sharedbookmarkscount'>
							<?php echo sprintf(elgg_echo('requestnotifications:sharedbookmarks:count'), $num_shared_bookmarks); ?>
						</a></p>
			<?php }
			
			
			// We trigger a plugin hook so other plugins can add stuff here
			// The triggered plugins should modify the 'count' param if they are adding new notifications
			$hook_params = array(count => $count);
			trigger_plugin_hook("requestnotifications_list_add", "all", $hook_params, false);
			
			// If there are no requests, write a message telling so
			if ($hook_params[count] == 0) {				
				echo elgg_echo('requestnotifications:norequests');
			}
		?>
	</div>
