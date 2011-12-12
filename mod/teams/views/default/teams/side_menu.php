<div class="sidebarBox">
<div id="owner_block_submenu"><ul>
<?php
	if(isloggedin()){

	        echo "<li><a href=\"{$vars['url']}pg/teams/new/\">" . elgg_echo('teams:new') . "</a></li>";
                echo "<li><a href=\"{$vars['url']}pg/teams/member/{$_SESSION['user']->username}\">" . elgg_echo('teams:yours') . "</a></li>";
                echo "<li><a href=\"{$vars['url']}pg/teams/invitations/{$_SESSION['user']->username}\">" . elgg_echo('teams:invitations') . "</a></li>";
                echo "<li><a href=\"{$vars['url']}pg/teams/membershipreq_list/{$_SESSION['user']->username}\">" . elgg_echo('teams:membershipreq_list') . "</a></li>";

        }
 ?>
</ul></div></div>