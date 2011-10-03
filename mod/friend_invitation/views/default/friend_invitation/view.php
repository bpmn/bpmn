<?php

/**
    view.php, part of Friend_invitation
    Copyright (C) 2009, Lorinthe, BV and Web100 Net technology Center,Ltd
    Author: Bogdan Nikovskiy, bogdan@web100.com.ua
	    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
			    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
					    
    You should have received a copy of the GNU General Public License
    along with this program. If not, see <http://www.gnu.org/licenses/>.
						    	
*/
	//get the full page owner entity
        //$test=page_owner();
	//$entity = get_entity(page_owner());
        $entity = get_loggedin_user();


	// load saved message or use dafault
/*	$message = get_plugin_setting('friend_invitation_default_message', "friend_invitation");
	if ( ! $message )
	    $message = elgg_echo('friend_invitation:default_message');
*/	    
	// replace macro for member name
	//$message = str_replace('%MEMBER%', $entity->name, $message);
    
    $message = friend_invitation_render_template_message($entity);
    $allow_change_message = friend_invitation_allow_change_message();

?>
<script type="text/JavaScript">
$(document).ready(function(){
     
    $("#friend_invitation_postit").click(function(){
        
        //display the ajax loading gif at the start of the function call
        $('#friend_invitation_loader').html('<?php echo elgg_view('ajax/loader',array('slashes' => true)); ?>');
        $('#friend_invitation_result').empty(); // remove the previous result
        $('#friend_invitation_postit').removeClass('ready_to_search');
        $('#friend_invitation_postit').addClass('now_searching');
        //load the results back into the message board contents and remove the loading gif
        //remember that the actual div being populated is determined on views/default/messageboard/messageboard.php     
        $("#friend_invitation_result").load("<?php echo $vars['url']; ?>mod/friend_invitation/ajax_endpoint/send_invitation.php", 				{
        			friend_invitation_to:$("[name=friend_invitation_to]").val(),
					pageOwner:$("[name=pageOwner]").val(),
					friend_invitation_message:$("[name=friend_invitation_message]").val()
				}, function(){
                    $('#friend_invitation_loader').empty(); // remove the loading gif
                    $('[name=friend_invitation_to]').val(''); // clear the input textarea
                    $('#friend_invitation_postit').removeClass('now_searching');
                    $('#friend_invitation_postit').addClass('ready_to_search');
                }); //end 
                 
    }); // end of the main click function
        
}); //end of the document .ready function   
</script>

<div class="contentWrapper">
<div id="friend_invitation_input_wrapper"><!-- start of search_members_input_wrapper div -->
    <label><?php echo elgg_echo('friend_invitation:friends_list');?></label>
    <!-- input receivers -->
    <input type="text" name="friend_invitation_to" id="friend_invitation_to" value="" class="friend_invitation_input_field" />

  <br />
    <!--label><?php //echo elgg_echo('friend_invitation:message');?></label-->
	<!-- input message -->
    <!--textarea name="friend_invitation_message" id="friend_invitation_message" class="friend_invitation_input_field" <?php if (!$allow_change_message) { ?> disabled="disabled" <?php } ?>><?php echo $message; ?></textarea-->
    
  <br />
    <!-- the person posting an item on the message board -->
    <input type="hidden" name="guid" value="<?php echo $_SESSION['guid']; ?>" class="guid"  />
   
    <!-- the page owner, this will be the profile owner -->
    <input type="hidden" name="pageOwner" value="<?php echo get_loggedin_userid(); ?>" class="pageOwner"  />
   
    <!-- submit button -->
    <input type="submit" id="friend_invitation_postit" class="ready_to_search" value="<?php echo elgg_echo('friend_invitation:widget:send'); ?>" />
    
    <!-- loading graphic -->
    <div id="friend_invitation_loader" class="loading">  </div>

</div><!-- end of search_members_input_wrapper div -->
<div id="friend_invitation_result"></div>
<div style="clear:both;">&nbsp;</div>
</div>