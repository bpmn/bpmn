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

$form_body = "<p>" . elgg_echo('user:password:text') . "</p>";
$form_body .= "<p><label>". elgg_echo('email') . " "
	. elgg_view('input/text', array('internalname' => 'username')) . "</label></p>";
$form_body .= elgg_view('input/captcha');
$form_body .= "<p>" . elgg_view('input/submit', array('value' => elgg_echo('request'))) . "</p>";

?>
<div class="contentWrapper">
<?php
echo elgg_view('input/form', array(
	'action' => "{$vars['url']}action/loginbyemailonly/requestnewpassword",
	'body' => $form_body)
);
?>
</div>