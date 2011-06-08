<?php
	/**
	 * RequestNotifications sidebox view
	 * 
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */
?>

<div class="sidebarBox">
	<a href="<?php echo $vars['url'];?>pg/requestnotifications/" class="requestnotifications_viewall">
		<?php echo elgg_echo('requestnotifications:viewall');?>
	</a>
	<h3><?php echo elgg_echo('requestnotifications:requests');?></h3>
	<?php echo elgg_view('requestnotifications/shortlist', $vars); ?>
</div>