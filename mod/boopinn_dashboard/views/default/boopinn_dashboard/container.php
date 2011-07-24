
<div id="dashboard_container">
	<div class="dash_right">
		<div class="dash_right_left">
                <h4>Showcase your company, your team's work/project !</h4>

		<div class="dashf-left">
                    	<div class="dash_box">
			  
			    <h6>Get exposure of your work within the Boopinn network, attracting experts and enthusiasts to your open labs</h6>
 <button type="button" style="width:110px" onclick=<?php echo("self.location.href='".$CONFIG->wwwroot."pg/teams/new/'")?> >
			    <h6>Create a team</h6>

			   </button>

			
		</div>


		<div class="dashf-right">
		
		    <h4>Add your contribution to the Boopinn Network and CIS !</h4>

<div class="dash_box">
                            

			    <h6>To collaborate on an idea you'd like to develop, on problems you would like to solve, find creative and innovative solutions</h6>
<button type="button" style="width:110px" onclick=<?php echo("self.location.href='".$CONFIG->wwwroot."pg/openlabs/new/'")?> >
			    <h6>Create an open lab</h6>
			    </button>
			</div>
			</div>
		</div>

		</div>

		<div class="dash_right_right">dash_right_right<br>
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
