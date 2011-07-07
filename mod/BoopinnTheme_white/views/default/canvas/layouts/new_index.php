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



	<div class="coda-slider preload" id="coda-slider-1">
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Welcome</h2>
				<p>

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

</p>
			</div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Panel 2</h2>
				<p>Proin nec turpis eget dolor dictum lacinia. Nullam nunc magna, tincidunt eu porta in, faucibus sed magna. Suspendisse laoreet ornare ullamcorper. Nulla in tortor nibh. Pellentesque sed est vitae odio vestibulum aliquet in nec leo.</p>
			</div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Panel 3</h2>
				<p>Cras luctus fringilla odio vel hendrerit. Cras pulvinar auctor sollicitudin. Sed lacus quam, sodales sit amet feugiat sit amet, viverra nec augue. Sed enim ipsum, malesuada quis blandit vel, posuere eget erat. Sed a arcu justo. Integer ultricies, nunc at lobortis facilisis, ligula lacus vestibulum quam, id tincidunt sapien arcu in velit. Vestibulum consequat augue et turpis condimentum mollis sed vitae metus. Morbi leo libero, tincidunt lobortis fermentum eget, rhoncus vel sem. Morbi varius viverra velit vel tempus. Morbi enim turpis, facilisis vel volutpat at, condimentum quis erat. Morbi auctor rutrum libero sed placerat. Etiam ipsum velit, eleifend in vehicula eu, tristique a ipsum. Donec vitae quam vel diam iaculis bibendum eget ut diam. Fusce quis interdum diam. Ut urna justo, dapibus a tempus sit amet, bibendum at lectus. Sed venenatis molestie commodo.</p>
			</div>
		</div>
		<div class="panel">
			<div class="panel-wrapper">
				<h2 class="title">Panel 4</h2>
				<p>Nulla ultricies ornare erat, a rutrum lacus varius nec. Pellentesque vehicula lobortis dignissim. Ut scelerisque auctor eros sed porttitor. Nullam pulvinar ultrices malesuada. Quisque lobortis bibendum nisi et condimentum. Mauris quis erat vel dui lobortis dignissim.</p>
			</div>
		</div>
	</div><!-- .coda-slider -->



















    <div class="clearfloat"></div>
</div>
</div>
