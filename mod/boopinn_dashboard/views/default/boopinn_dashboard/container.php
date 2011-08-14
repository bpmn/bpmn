
<div id="dashboard_container">
	<div class="dash_right">
		<div class="dash_right_left">
                <h4><?php echo elgg_echo('dashboard:createteam:title') ?></h4>

		<div class="dashf-left">
                    	<div class="dash_box">
			  
			    <h6><?php echo elgg_echo('dashboard:createteam:text')?></h6>
 <button class="buttonclass" onclick=<?php echo("self.location.href='".$CONFIG->wwwroot."pg/teams/new/'")?> >
			    <span><h6><?php echo elgg_echo('dashboard:createteam:button') ?></h6></span>

			   </button>

			
		</div>


		<div class="dashf-right">
		
		    <h4><?php echo elgg_echo('dashboard:createcis')?></h4>

<div class="dash_box">
                            

			    <h6><?php echo elgg_echo('dashboard:createopenlab:text') ?></h6>
<button class="buttonclass" onclick=<?php echo("self.location.href='".$CONFIG->wwwroot."pg/openlabs/new/'")?> >
			    <span><h6><?php echo elgg_echo('dashboard:createopenlab:button') ?></h6></span>
			    </button>
			</div>
			</div>
		</div>

		</div>

		<div class="dash_right_right">
                                            <?php echo $vars['users_activity']; ?>
		</div>
		<div class="dash_right_footer">
                    <div class="dash_box">
                        <?php echo $vars['teams_activity']; ?>
			</div>
                    <div class="dash_box">
                        <?php echo $vars['openlabs_activity']; ?>
			</div>
                    <div class="dash_box">
                        <?php echo $vars['cis_activity']; ?>
			</div>
                    <div class="dash_box">
                        <?php echo $vars['follow_activity']; ?>
			</div>
                </div>
	</div>

	<div class="dash_left">


        	<?php
        		if (isloggedin()){
	        		echo "<h4>" . elgg_echo("welcome") . " ";
        			echo $vars['user']->name;
        			echo "</h4>";
    			}
        	?>
        <!--</div>-->

    
		<div class="dashf-left">
                    
			<div class="dash_box">
                            <?php echo $vars['request']; ?><!--br-->
			</div>
		
		</div>
	</div>


</div>
