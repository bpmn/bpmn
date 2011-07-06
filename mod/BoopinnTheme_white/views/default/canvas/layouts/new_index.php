<?php

	/**
	 * Elgg custom profile 
	 * You can edit the layout of this page with your own layout and style. Whatever you put in the file
	 * will replace the frontpage of your Elgg site.
	 * 
	 * @package Elgg
	 */
	 
?>

<div id="custom_index">

    <!-- left column content -->
    <div id="index_left">
        <!-- welcome message -->
        <!--<div id="index_welcome"> -->
        	<?php
        		if (isloggedin()){
	        		echo "<h2>" . elgg_echo("welcome") . " ";
        			echo $vars['user']->name;
        			echo "</h2>";
    			}
        	?>
            <?php
            	//include a view that plugins can extend
            	//echo elgg_view("index/lefthandside");
            ?>
	        <?php
	            //this displays some content when the user is logged out
			    if (!isloggedin()){
	            	//display the login form
			    	echo $vars['area1'];
			    	//echo "<div class=\"clearfloat\"></div>";
		        }
	        ?>
        <!--</div>-->

    
    </div>
    
    <!-- right hand column -->
    <div id="index_right">
        <!-- more content -->
	    <?php
            //include a view that plugins can extend
            //echo elgg_view("index/righthandside");
?>

<style type="text/css">
p.textboopinn { color: #0066aa }
</style>

<h2>
<p class="textboopinn">Join Boopinn today, and grow your creativity and innovation</p>
<p class="textboopinn">potential in a open and borderless network!</p>
</h2>
<img src="<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/network.png" alt="Network"class="floatRight">	

<h6>
<p>Register, and create</p>
<p>  your "team" : to showcase your company or your project </p>
<p>  your "open lab" : to collaborate on ideas you would like to develop creative</p>
<p>                    and innovate solutions</p>
<p>View you CIS (Creative and Innovation Score)</p>
</h6>		 
</p>




    <div class="clearfloat"></div>
</div>
</div>
