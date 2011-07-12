<?php

	/**
	 * Elgg hoverover extender for messages
	 * 
	 * @package ElggMessages
	 */
	 
	 //need to be logged in to send a message

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/mycis/actions/cis.php");

        if (isloggedin()) {
             
            $myCis = get_users_in_cis(get_loggedin_user());
            $inmycis=false;
            foreach($myCis as $listcis){
                if ($listcis->guid==page_owner()){
                    $inmycis=true;
                    break;
                }
            }

            if($inmycis) {
?>

	<p class="user_menu_messages">
		<a href="<?php echo $vars['url']; ?>pg/messages/compose/?send_to=<?php echo $vars['entity']->guid; ?>"><?php echo elgg_echo("messages:sendmessage"); ?></a>
	</p>
	
<?php
            }
            else {
?>
        <p class="user_menu_messages">
            <?php echo elgg_echo("messages:notincis"); ?>
	</p>
<?php
            }
}

?>