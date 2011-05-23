<?php
	/**
	* likes
	*
	* @author Pedro Prez
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/

	//Comment feed view (wrapper)
	$classname = $vars['classname'];
	if ($classname) {
		$classname = " $classname";
	}
?>
<div class="comment_feed<?php echo $classname ?>">
<?php 
	echo $vars['body'];
?>	
</div><!-- comment_feed -->


	