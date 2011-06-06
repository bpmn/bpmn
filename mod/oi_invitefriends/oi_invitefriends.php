<?php
include($CONFIG->pluginspath . "oi_invitefriends/vendor/openinviter/openinviter.php"); 

$inviter=new OpenInviter();
$oi_services=$inviter->getPlugins();
if (isset($_POST['provider_box'])) 
{
	if (isset($oi_services['email'][$_POST['provider_box']])) $plugType='email';
	elseif (isset($oi_services['social'][$_POST['provider_box']])) $plugType='social';
	else $plugType='';
}
else $plugType = '';
function ers($ers)
	{
	if (!empty($ers))
		{
		/* Modificado - Changed
		$contents="<table cellspacing='0' cellpadding='0' style='border:1px solid red;' align='center'><tr><td valign='middle' style='padding:3px' valign='middle'><img src='images/ers.gif'></td><td valign='middle' style='color:red;padding:5px;'>";
		foreach ($ers as $key=>$error)
			$contents.="{$error}<br >";
		$contents.="</td></tr></table><br >";
		return $contents;
		*/
		foreach ($ers as $key=>$error)
			register_error($error);
		}
	}
	
function oks($oks)
	{
	if (!empty($oks))
		{
		/* Modificado - Changed
		$contents="<table border='0' cellspacing='0' cellpadding='10' style='border:1px solid #5897FE;' align='center'><tr><td valign='middle' valign='middle'><img src='images/oks.gif' ></td><td valign='middle' style='color:#5897FE;padding:5px;'>	";
		foreach ($oks as $key=>$msg)
			$contents.="{$msg}<br >";
		$contents.="</td></tr></table><br >";
		return $contents;
		*/
		foreach ($oks as $key=>$msg)
			system_message($msg);
		}
	}

if (!empty($_POST['step'])) $step=$_POST['step'];
else $step='get_contacts';

$ers=array();$oks=array();$import_ok=false;$done=false;
if ($_SERVER['REQUEST_METHOD']=='POST')
	{
	if ($step=='get_contacts')
		{
		if (empty($_POST['email_box']))
			$ers['email']=elgg_echo('oi_invitefriends:openinviter:email_missing');
		if (empty($_POST['password_box']))
			$ers['password']=elgg_echo('oi_invitefriends:openinviter:password_missing');
		if (empty($_POST['provider_box']))
			$ers['provider']=elgg_echo('oi_invitefriends:openinviter:provider_missing');
		if (count($ers)==0)
			{
			$inviter->startPlugin($_POST['provider_box']);
			$internal=$inviter->getInternalError();
			if ($internal)
				$ers['inviter']=$internal;
			elseif (!$inviter->login($_POST['email_box'],$_POST['password_box']))
				{
				$internal=$inviter->getInternalError();
				$ers['login']=($internal?$internal:elgg_echo('oi_invitefriends:openinviter:login_failed'));
				}
			elseif (false===$contacts=$inviter->getMyContacts())
				$ers['contacts']=elgg_echo('oi_invitefriends:openinviter:unable_get_contacts');
			else
				{
				$import_ok=true;
				$step='send_invites';
				$_POST['oi_session_id']=$inviter->plugin->getSessionID();
				/* Modificado - Changed
				$_POST['message_box']='';
				*/
				$_POST['message_box']= sprintf(elgg_echo('oi_invitefriends:message:default'),$CONFIG->site->name);
				}
			}
		}
	elseif ($step=='send_invites')
		{
		//Mount message
		$message_footer=elgg_echo('oi_invitefriends:openinviter:inviter_technology');
		$message_subject=sprintf(elgg_echo('oi_invitefriends:subject'), $CONFIG->site->name);
		$current_user = get_loggedin_user();
		$link = $CONFIG->wwwroot . 'pg/register?friend_guid=' . $current_user->guid . '&invitecode=' . generate_invite_code($current_user->username);
		$message_body=sprintf(elgg_echo('oi_invitefriends:email'),
			$CONFIG->site->name,
			$current_user->name,
			$_POST['message_box'],
			$link
		);
		$message_body.="\n\r".$message_footer;
		
		if (empty($_POST['provider_box'])) $ers['provider']=elgg_echo('oi_invitefriends:openinviter:provider_missing');
		else
			{
			$inviter->startPlugin($_POST['provider_box']);
			$internal=$inviter->getInternalError();
			if ($internal) $ers['internal']=$internal;
			else
				{
				if (empty($_POST['email_box'])) $ers['inviter']=elgg_echo('oi_invitefriends:openinviter:inviter_missing');
				if (empty($_POST['oi_session_id'])) $ers['session_id']=elgg_echo('oi_invitefriends:openinviter:no_session');
				if (empty($_POST['message_box'])) $ers['message_body']=elgg_echo('oi_invitefriends:openinviter:message_missing');
				else $_POST['message_box']=strip_tags($_POST['message_box']);
				$selected_contacts=array();$contacts=array();

				//Send throught social networks ("Internal" plugin)
				$message=array('subject'=>$message_subject,'body'=>$message_body,'attachment'=>"\n\rAttached message: \n\r".$_POST['message_box']);
				
				if ($inviter->showContacts())
					{
					foreach ($_POST as $key=>$val)
						if (strpos($key,'check_')!==false)
							$selected_contacts[$_POST['email_'.$val]]=$_POST['name_'.$val];
						elseif (strpos($key,'email_')!==false)
							{
							$temp=explode('_',$key);$counter=$temp[1];
							if (is_numeric($temp[1])) $contacts[$val]=$_POST['name_'.$temp[1]];
							}
					if (count($selected_contacts)==0) $ers['contacts']=elgg_echo('oi_invitefriends:openinviter:no_contacts');
					}
				}
			}
		if (count($ers)==0)
			{
			$sendMessage=$inviter->sendMessage($_POST['oi_session_id'],$message,$selected_contacts);
			$inviter->logout();
			if ($sendMessage===-1)
				{
				$site = get_entity($CONFIG->site_guid);
				if (($site) && (isset($site->email))) {
					$from = $site->email;
				} else {
					$from = 'noreply@' . get_site_domain($CONFIG->site_guid);
				}

				$already_members = array();
				
				//Send throught e-mail
				foreach ($selected_contacts as $email=>$name)
				{
					if (get_user_by_email($email)) {
						$already_members[] = $email;
					}
					else
					{
						elgg_send_email($from, $email, $message_subject, $message_body);
					}
				}
				
				if (count($already_members) > 0) {				
					$ers[] = sprintf(elgg_echo('oi_invitefriends:already_members'), implode(', ', $already_members));
				}
					
				$oks['mails']=elgg_echo('oi_invitefriends:openinviter:mail_success');
				//system_message($message_body);
				}
			elseif ($sendMessage===false)
				{
				$internal=$inviter->getInternalError();
				$ers['internal']=($internal?$internal:elgg_echo('oi_invitefriends:openinviter:mail_errors'));
				}
			else $oks['internal']=elgg_echo('oi_invitefriends:openinviter:invite_success');
			$done=true;
			ers($ers).oks($oks);
			forward($_SERVER['HTTP_REFERER']);
			}
		}
	}
else
	{
	$_POST['email_box']='';
	$_POST['password_box']='';
	$_POST['provider_box']='';
	}

$contents="<script type='text/javascript'>
	function toggleAll(element) 
	{
	var form = document.forms.openinviter, z = 0;
	for(z=0; z<form.length;z++)
		{
		if(form[z].type == 'checkbox')
			form[z].checked = element.checked;
	   	}
	}
</script>";
$contents.="<div class='contentWrapper notitle'><form action='' method='POST' name='openinviter'>".ers($ers).oks($oks);
if (!$done)
	{
	if ($step=='get_contacts')
		{
		$contents.="<br>".elgg_echo('oi_invitefriends:openinviter:introduction')."<br><table align='center' class='thTable' cellspacing='2' cellpadding='0' style='border:none;'>
			<tr class='thTableRow'><td align='right'><label for='email_box'>".elgg_echo('oi_invitefriends:openinviter:form_email')."</label></td><td><input class='input-text' type='text' name='email_box' value='{$_POST['email_box']}'></td></tr>
			<tr class='thTableRow'><td align='right'><label for='password_box'>".elgg_echo('oi_invitefriends:openinviter:form_password')."</label></td><td><input class='input-text' type='password' name='password_box' value='{$_POST['password_box']}'></td></tr>
			<tr class='thTableRow'><td align='right'><label for='provider_box'>".elgg_echo('oi_invitefriends:openinviter:form_provider')."&nbsp;</label></td><td><select class='thSelect' name='provider_box'><option value=''></option>";
		foreach ($oi_services as $type=>$providers)	
			{
			$contents.="<optgroup label='{$inviter->pluginTypes[$type]}'>";
			foreach ($providers as $provider=>$details)
				$contents.="<option value='{$provider}'".($_POST['provider_box']==$provider?' selected':'').">{$details['name']}</option>";
			$contents.="</optgroup>";
			}
		$contents.="</select></td></tr>
			<tr class='thTableImportantRow'><td colspan='2' align='center'><input class='thButton' type='submit' name='import' value='".elgg_echo('oi_invitefriends:openinviter:import_contacts')."'></td></tr>
		</table><input type='hidden' name='step' value='get_contacts'>";
		}
	else
		{
			/* Modificado - Changed
			$contents.="<table class='thTable' cellspacing='0' cellpadding='0' style='border:none;'>
					<tr class='thTableRow'><td align='right' valign='top'><label for='message_box'>Message</label></td><td><textarea rows='5' cols='50' name='message_box' class='thTextArea' style='width:300px;'>{$_POST['message_box']}</textarea></td></tr>
					<tr class='thTableRow'><td align='center' colspan='2'><input type='submit' name='send' value='Send Invites' class='thButton' ></td></tr>
				</table>";
			*/
			//$contents.="<div class='contentWrapper notitle'>";
			$contents.="<p><label>";
			$contents.=elgg_echo('oi_invitefriends:message');
			$contents.="</label>";
			$contents.="<textarea class='input-textarea' name='message_box'>{$_POST['message_box']}</textarea>";
			$contents.="</p>";
			$contents.=elgg_view('input/submit', array('value' => elgg_echo('send')));
			//$contents.="</div>";
		}
	}
$contents.="<center><a href='http://openinviter.com/'><img src='http://openinviter.com/images/banners/banner_blue_1.gif?nr=47506' border='0' alt='Powered by OpenInviter.com' title='Powered by OpenInviter.com'></a></center>";
if (!$done)
	{
	if ($step=='send_invites')
		{
		if ($inviter->showContacts())
			{
			$contents.="<table class='thTable' align='center' cellspacing='0' cellpadding='0'><tr class='thTableHeader'><td colspan='".($plugType=='email'? "3":"2")."'>".elgg_echo('oi_invitefriends:openinviter:your_contacts')."</td></tr>";
			if (count($contacts)==0)
				$contents.="<tr class='thTableOddRow'><td align='center' style='padding:20px;' colspan='".($plugType=='email'? "3":"2")."'>".elgg_echo('oi_invitefriends:openinviter:address_book_empty')."</td></tr>";
			else
				{
				$contents.="<tr class='thTableDesc'><td><input type='checkbox' onChange='toggleAll(this)' name='toggle_all' title='".elgg_echo('oi_invitefriends:openinviter:select_deselect')."' checked>".elgg_echo('oi_invitefriends:openinviter:checkbox_invite')."&nbsp;</td><td>".elgg_echo('oi_invitefriends:openinviter:invite_name')."</td>".($plugType == 'email' ?"<td>".elgg_echo('oi_invitefriends:openinviter:invite_email')."</td>":"")."</tr>";
				$odd=true;$counter=0;
				foreach ($contacts as $email=>$name)
					{
					$counter++;
					if ($odd) $class='thTableOddRow'; else $class='thTableEvenRow';
					$contents.="<tr class='{$class}'><td><input name='check_{$counter}' value='{$counter}' type='checkbox' class='thCheckbox' checked><input type='hidden' name='email_{$counter}' value='{$email}'><input type='hidden' name='name_{$counter}' value='{$name}'></td><td>{$name}</td>".($plugType == 'email' ?"<td>{$email}</td>":"")."</tr>";
					$odd=!$odd;
					}
				/* Modificado - Changed
				$contents.="<tr class='thTableFooter'><td colspan='".($plugType=='email'? "3":"2")."' style='padding:3px;'><input type='submit' name='send' value='Send invites' class='thButton'></td></tr>";
				*/
				$contents.="<tr class='thTableFooter'><td colspan='".($plugType=='email'? "3":"2")."' style='padding:3px;'>".elgg_view('input/submit', array('value' => elgg_echo('send')))."</td></tr>";
				}
			$contents.="</table>";
			}
		$contents.="<input type='hidden' name='step' value='send_invites'>
			<input type='hidden' name='provider_box' value='{$_POST['provider_box']}'>
			<input type='hidden' name='email_box' value='{$_POST['email_box']}'>
			<input type='hidden' name='oi_session_id' value='{$_POST['oi_session_id']}'>";
		}
	}
$contents.="</form></div>";
echo $contents;
?>