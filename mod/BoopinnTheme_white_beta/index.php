

<!--
 take the css and javascript from the view source and because the engine was already started you can call the system_messages() function. Then loop through them and display them. This function also empties the system messages from the session. 
-->

<html>
<head>
<title>boopinn where creativity meets</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--<META http-equiv="refresh" content="0; URL=http://www.boopinn.com">
-->
<LINK REL=StyleSheet HREF="http://localhost/boopinn/mod/BoopinnTheme_white/index_css.php" TYPE="text/css" MEDIA=screen>



</head>






<BODY  BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#0000FF" VLINK="#FF00FF" ALINK="#FF0000">

<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');
?>
<script type="text/javascript">
$(document).ready(function () {
$('.messages').animate({opacity: 1.0}, 1000);
$('.messages').animate({opacity: 1.0}, 2000);
$('.messages').fadeOut('slow');
$('span.closeMessages a').click(function () {
$(".messages").stop();
$('.messages').fadeOut('slow');
return false;
});
$('div.messages').click(function () {
$(".messages").stop();
$('.messages').fadeOut('slow');
return false;
});
});
</script>


<center>
<div id="welcome-box">
<div id="login-box">
<?php
$form_body = "<p><label>" . elgg_echo('username') . "<br />" . elgg_view('input/text', array('internalname' => 'username', 'class' => 'login-textarea')) . "</label><br />";
$form_body .= "<label>" . elgg_echo('password') . "<br />" . elgg_view('input/password', array('internalname' => 'password', 'class' => 'login-textarea')) . "</label><br />";
$form_body .= elgg_view('input/submit', array('value' => elgg_echo('login'))) . "</p>";
$form_body .= "<p><a href=\"". $vars['url'] ."account/register.php\">" . elgg_echo('register') . "</a> | <a href=\"". $vars['url'] ."account/forgottn_password.php\">" . elgg_echo('user:password:lost') . "</a></p>";

echo elgg_view('input/form', array('body' => $form_body, 'action' => "". $vars['url'] ."action/login"));
?>

<?php

system_message(elgg_echo('loginok'));
			register_error(elgg_echo('loginerror'));

?>


</center>



</body>
</html>
