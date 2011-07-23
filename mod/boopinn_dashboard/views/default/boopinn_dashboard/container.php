
<div id="dashboard_container">
	<div class="dash_right">dash right<br>
		<div class="dash_right_left">
                    <h3> <?php echo( elgg_echo("dashboard:createcis"));?></h3>
		<div class="dashf-left">
                    
			<div class="dash_box">
                            <button type="button" onclick=<?php echo("self.location.href='".$CONFIG->wwwroot."pg/openlabs/new/'")?> >
                                <h4> <?php echo(elgg_echo("dashboard:createopenlab:title"));?> </h4><br>
                            <?php echo(elgg_echo("dashboard:createopenlab:text"));?>
                            </button>
			</div>
		</div>

		<div class="dashf-right">
			<div class="dash_box">
                           <button type="button" onclick=<?php echo("self.location.href='".$CONFIG->wwwroot."pg/teams/new/'")?> >
                            <h4><?php echo(elgg_echo("dashboard:createteam:title"));?></h4><br>
                            <?php echo(elgg_echo("dashboard:createteam:text"));?>
                           </button>
			</div>
		</div>

		</div>

		<div class="dash_right_right">dash_right_right<br>
		</div>
		<div class="dash_right_footer">dash_right_footer<br>
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
		<div class="dashf-left">
                    
			<div class="dash_box">
                            <?php echo $vars['request']; ?><!--br-->
			</div>
		</div>
	</div>


</div>
