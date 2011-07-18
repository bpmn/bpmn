<?php

	/**
	 * Login by Email Only
	 * 
	 * @author Lenny Urbanowski
	 * @link http://community.elgg.org/pg/profile/itsLenny
	 * @copyright (c) Lenny Urbanowski 2010
	 * @license GNU General Public License (GPL) version 2
	 *
	 *
	 * Based on: Login by Email
	 * 
	 * @author Pedro Prez
	 * @link http://community.elgg.org/pg/profile/pedroprez
	 * @copyright (c) Keetup 2009
	 * @link http://www.keetup.com/
	 * @license GNU General Public License (GPL) version 2
	 */
	
global $CONFIG;

$form_body = "<p class=\"loginbox\"><label>" . elgg_echo('email') . "<br />" . elgg_view('input/text', array('internalname' => 'username', 'class' => 'login-textarea')) . "</label>";
$form_body .= "<br />";
$form_body .= "<label>" . elgg_echo('password') . "<br />" . elgg_view('input/password', array('internalname' => 'password', 'class' => 'login-textarea')) . "</label><br />";

$form_body .= elgg_view('login/extend');

$form_body .= elgg_view('input/submit', array('value' => elgg_echo('login'))) . " <div id=\"persistent_login\"><label><input type=\"checkbox\" name=\"persistent\" value=\"true\" />".elgg_echo('user:persistent')."</label></div></p>";
$form_body .= "<p class=\"loginbox\">";
$form_body .= (!isset($CONFIG->disable_registration) || !($CONFIG->disable_registration)) ? "<a href=\"{$vars['url']}pg/register/\">" . elgg_echo('register') . "</a> | " : "";
$form_body .= "<a href=\"{$vars['url']}account/forgotten_password.php\">" . elgg_echo('user:password:lost') . "</a></p>";

$login_url = $vars['url'];
if ((isset($CONFIG->https_login)) && ($CONFIG->https_login)) {
	$login_url = str_replace("http", "https", $vars['url']);
}
?>

<div id="login-box">
<h2><?php echo elgg_echo('login'); ?></h2>
	<?php
		echo elgg_view('input/form', array('body' => $form_body, 'action' => "{$login_url}action/login"));
	?>
</div>
<script type="text/javascript">
	$(document).ready(function() { $('input[name=username]').focus(); });
</script>