<?php
/**
 * Elgg footer
 * The standard HTML footer that displays across the site
 *
 * @package Elgg
 * @subpackage Core
 *
 */

// get the tools menu
//$menu = get_register('menu');

?>

<div class="clearfloat"></div>

<div id="layout_footer">
<center>

<h6><p>
<span style="color:black">Boopinn Copyrights &copy; 2011 - All rights reserved</p></span>
By clicking register or using Boopinn, you confirm that you read, understood, and accepted the general conditions on the usage and confidentiality policies of Boopinn.
	
</h6>
</center>
</div><!-- /#layout_footer -->

<div class="footer_box">
<div class="f-left"><img src="<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/ico.png"></img></div>

<div class="footer_box_links">
	<ul>
		<li>Boopinn</li>
		<li>
		<a target="" href="http://blog.boopinn.com" title="Boopinn explained">Boopinn explained</a><br>
		</li>
	</ul>

	<ul>
		<li>Communication</li>
		<li>
		<a target="" href="http://blog.boopinn.com" title="Visit our blog">Visit our Blog</a><br>
		</li>
		<li>
		<a target="" href="http://blog.boopinn.com" title="Partners">Partners</a><br>
		</li>
	</ul>

	<ul>
		<li>legal stuff</li>
		<li>
		<a target="" href="http://blog.boopinn.com" title="Terms of Use">Terms of Use</a><br>
		</li>
		<li>
		<a target="" href="http://blog.boopinn.com" title="Intellectual Property">Intellectual Property</a><br>
		</li>
		<li>
		<a target="" href="http://blog.boopinn.com" title="Privacy Policies">Privacy Policies</a><br>
		</li>
	</ul>
	<ul>
		<li>Contact us</li>
		<li>
		<a target="" href="http://blog.boopinn.com" title="Contact us">Contact us</a><br>
		</li>
	</ul>

</div>
</div>

<div class="footer_box_recommend">
<div class="f-left">(Best viewed with Firefox, Chrome, or Internet Explorer 9+)</div>
<div class="f-right">Boopinn is proudly powered by Open Source Softwares</div>
</div>



<div class="clearfloat"></div>

</div><!-- /#page_wrapper -->
</div><!-- /#page_container -->



<!-- insert an analytics view to be extended -->
<?php
	echo elgg_view('footer/analytics');
?>
</body>
</html>
