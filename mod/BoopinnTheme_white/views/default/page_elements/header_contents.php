<?php
/**
 * Elgg header contents
 * This file holds the header output that a user will see
 *
 * @package Elgg
 * @subpackage Core
 **/

?>

<div id="page_container">
<div id="page_wrapper">

<div id="layout_header">
<div id="wrapper_header">

	<!-- display the page title -->
<div id="join"><a href="<?php echo $vars['url']; ?>"><img src="<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/boopinn_final-flare_small4.jpg" alt="Join"></img></a>


<div id="header_topbar_container_search">
<?php echo elgg_view('page_elements/searchbox'); ?>
</div>

</div>
</div><!-- /#wrapper_header -->
</div><!-- /#layout_header -->
