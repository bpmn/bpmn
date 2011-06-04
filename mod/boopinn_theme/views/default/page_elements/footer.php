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
<!--
 * <table width="958" height="79" border="0" cellpadding="0" cellspacing="0">
-->

<center>
<b>
<span style="color:white">Boopinn Copyrights 2011</span></b>
</center>

<!--
 </table>
 
-->

</div><!-- /#layout_footer -->


<div class="clearfloat"></div>

</div><!-- /#page_wrapper -->
</div><!-- /#page_container -->



<!-- insert an analytics view to be extended -->
<?php
	echo elgg_view('footer/analytics');
?>
</body>
</html>
