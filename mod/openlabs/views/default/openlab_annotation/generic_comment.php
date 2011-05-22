<?php
/**
 * Elgg generic comment
 *
 * @package Elgg
 * @subpackage Core
 *
 */

$owner = get_user($vars['annotation']->owner_guid);

?>
<div class="generic_comment"><!-- start of generic_comment div -->
	<div class="generic_comment_icon">
		<?php
			echo elgg_view("profile/icon",
				array(
					'entity' => $owner,
					'size' => 'small'
				)
			);
		?>
	</div>
	<div class="generic_comment_details">

		<!-- output the actual comment -->
		<?php echo elgg_view("output/longtext",array("value" => $vars['annotation']->value)); ?>

		<p class="generic_comment_owner">
			<a href="<?php echo $owner->getURL(); ?>"><?php echo $owner->name; ?></a> <?php echo elgg_view_friendly_time($vars['annotation']->time_created); ?>
		</p>

		<?php

			// if the user looking at the comment can edit, show the delete link
			if ($vars['annotation']->canEdit()) {

			?>
		<p>
			<?php

				echo elgg_view("output/confirmlink",array(
					'href' => $vars['url'] . "action/comments/delete?annotation_id=" . $vars['annotation']->id,
					'text' => elgg_echo('delete'),
					'confirm' => elgg_echo('deleteconfirm'),
				));
                                
                                echo elgg_view("openlab_output/iconurl",array(
					'href' => $vars['url'] . "action/openlabs/rate_plus?annotation_id=" . $vars['annotation']->id,
                                        'src'  => $vars['url']."mod/openlabs/graphics/thumb-up-icon.png"	,
                                        'alt'   => "Good comment !!!" ,
                                        "is_action" => true ));

                                echo elgg_view("openlab_output/iconurl",array(
					'href' => $vars['url'] . "action/openlabs/rate_less?annotation_id=" . $vars['annotation']->id,
                                        'src'  => $vars['url']."mod/openlabs/graphics/thumb-down-icon.png",
                                        'alt'   => "Bad comment !!!" ,
                                       "is_action" => true ));
                             
			?>
                           <!--
                        <a  href="<?php $vars['url']?>/action/openlabs/rate_plus?annotation_id=<?php $vars['annotation']->id ?>">
                            <img src ="<?php echo $vars['url']; ?>mod/openlabs/graphics/thumb-down-icon.png" annotation_id=<?php $vars['annotation']->id ?>">
                            <img src ="<?php echo $vars['url']; ?> width ="16px" height = "16px" alt="Good comment !!!">
                        </a>
                         <a href ="<?php $vars['url']?>action/openlabs/rate_less?annotation_id=<?php $vars['annotation']->id ?>">
                            <img src ="<?php echo $vars['url']; ?>mod/openlabs/graphics/thumb-up-icon.png"   width ="16px" height = "16px" alt="Bad comment !!!">
                         </a> -->
		</p>

			<?php
			} //end of can edit if statement
		?>
	</div><!-- end of generic_comment_details -->
</div><!-- end of generic_comment div -->