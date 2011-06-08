<?php
	/**
	* likes
	*
	* @author likes
	* @link http://community.elgg.org/pg/profile/pedroprez
	* @copyright (c) Keetup 2010
	* @link http://www.keetup.com/
	* @license GNU General Public License (GPL) version 2
	*/

	/* lighbtox */ 
?>
	<style>
		/* lightbox */
	    .lbBack {
	        width: 100%;
	        height: 100%;
	        background: #000;
	        position: absolute;
	        top: 0;
	        left: 0;
	        z-index: 12345;
	        display: none;
	    }
	    .lbBase {
	        display: none;
	        position: absolute;
	        top: 50px;
	        left: 25%;
	        z-index: 123456;
	    }
	    .lbParticular {
	       	background: #FFF;
	    	border: 10px solid #999;
	        padding: 30px 10px 10px;
	        width: 580px;
	    }
	    .lbParticular img {
	        display: block;
	        position: relative;
	        z-index: 1;
	        top: 0;
	        left: 0;
	    }
	    .lbParticular .lbCerrar {
	        background: red;
	        border: 1px solid #CCC;
	        color: #FFF;
	        cursor: pointer;
	        font-family: Arial, Lucida, Lucida Sans;
	        font-size: 11px;
	        font-weight: bold;
	        height: 16px;
	        line-height: 17px;
	        padding: 0 0 1px 1px;
	        position: absolute;
	        right: 3px;
	        text-align: center;
	        top: 3px;
	        width: 16px;
	        z-index: 123;
	    }
	    .lbContent h2 {
	    	margin: 8px 0px;
	    }
	    
		div.buttons {
			float:right;
		}
		button.ping {
			margin-left: 10px;
		}
		button.submit_button:hover {
			color: white;
		}
	</style>
	<div id="likes_lbBack" class='lbBack'>&nbsp;</div>
	<div id="likes_lb" class="lbBase lbParticular">
		<div class='lbContent'>
			<h2><?php echo elgg_echo('likes:ping:title'); ?></h2>
			<p>
				<?php echo elgg_echo('likes:ping:description'); ?>
			</p>
			<form method='post' action='<?php echo $vars['url']?>mod/likes/ping.php'>
				<p><?php echo elgg_echo('likes:ping:description2'); ?> <small>(<?php echo elgg_echo('likes:ping:description3'); ?>)</small>.<br /></p>
				<label>
					E-mail: 
					<input type="text" name='email_address' value='' />
				</label>
				<div class='clearfloat'></div>
				<div class='buttons'>
					<a href="javascript:void(0)" onclick="lbClose();">
						<?php echo elgg_echo('likes:ping:cancel'); ?>
					</a>
					<button type="submit" class="submit_button ping">
						<?php echo elgg_echo('likes:ping'); ?>
					</button>
				</div>
			</form>
		</div>
	    <div class="lbCerrar">X</div>
	</div>