<?php
	/**
	 * RequestNotifications Main Page
	 * 
	 * @package requestnotifications
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Adolfo Mazorra
	 * @copyright Adolfo Mazorra 2009
	 * @link http://elgg.org/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');
	
	gatekeeper();
	
	$user = get_loggedin_user();		

	set_page_owner($user->guid);
	
	page_draw(elgg_echo('requestnotifications:title'), elgg_view_layout('two_column_left_sidebar','',elgg_view('requestnotifications/detailed')));	
?>