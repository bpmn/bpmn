<div class="sidebarBox">
<div id="owner_block_submenu"><ul>
<?php
	if(isloggedin()){
		echo "<li><a href=\"{$vars['url']}pg/openlabs/member/{$_SESSION['user']->username}\">". elgg_echo('openlabs:yours') ."</a></li>";
		echo "<li><a href=\"{$vars['url']}pg/openlabs/invitations/{$_SESSION['user']->username}\">". elgg_echo('openlabs:invitations') ."</a></li>";
		echo "<li><a href=\"{$vars['url']}pg/openlabs/suggestions/{$_SESSION['user']->username}\">". elgg_echo('openlabs:suggestions') ."</a></li>";
                echo "<li><a href=\"{$vars['url']}pg/openlabs/membershipreq_list/{$_SESSION['user']->username}\">". elgg_echo('openlabs:membershipreq_list') ."</a></li>";
                echo "<li><a href=\"{$vars['url']}pg/openlabs/new/\">". elgg_echo('openlabs:new') ."</a></li>";
	}
?>
</ul></div></div>