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
<div id="join"><a href="<?php echo $vars['url']; ?>"><img src="<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/boopinn_final-flare-beta.jpg" alt="Join"></img></a>


<?php
	if (isloggedin()) {
?>




<div id="header_topbar_container_search">
<?php echo elgg_view('page_elements/searchbox'); ?>
</div><!-- search-->


<div id="user_topbar">
<?php
$contents = "";

// is there a page owner?
$owner = get_loggedin_user() ; 
if ($owner instanceof elggentity) {
	if ($owner instanceof elgguser ) {
		$info = $owner->name;
	}
	$display =  $info;
	$contents = $display;
}

// is there a page owner?
$owner = get_loggedin_user();
/*
 * */
if ($owner instanceof elggentity) {

	$icon = elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny'));
	if ($owner instanceof elgguser || $owner instanceof elgggroup) {
		$info = '<a href="' . $owner->geturl() . '">' . $owner->name . '</a>';
	}
	$display = "<div id=\"owner_block_icon\">" . $icon . "</div>";

	$contents .= $display;
} 









echo $contents;
?>

</div>
<?php
	}
?>



</div>


</div><!-- /#wrapper_header -->
</div><!-- /#layout_header -->

