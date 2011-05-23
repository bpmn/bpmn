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
?>
	.likes_wrapper {
		/*margin: 4px 0 4px 0px;
		padding: 0px 0 0 25px;
		*/
		background:none repeat scroll 0 0 #F5F5F5;
		border-bottom:1px solid #DFDFDF;
		clear:left;
		float:none;
		font-size: 90%;
		margin:2px 0 2px 30px;
		overflow:hidden;
		padding: 5px 5px 5px 25px;
		width:330px;
	}
	
	.like {
		background: #F5F5F5 url(<?php echo $vars['url' ] ?>mod/likes/graphics/like.gif) no-repeat 5px 3px;
	}
	.dislike {
		background: #F5F5F5 url(<?php echo $vars['url' ] ?>mod/likes/graphics/dislike.gif) no-repeat 5px 3px;
	}
	
	.river_item .likes_wrapper {
		/*font-size: 0.9em;
		margin: 4px 0 0 15px;
		margin: 0;
		padding: 2px 0 0 25px;*/
	}
	
	.likes strong {
		font-weight: bolder;
	}
	
	/*Fix for riverfaces*/
	.river_item_list .likes {
		display: none;
	}
	.river_item_list .river_item .likes{
		display: block;
	}
    
	/*Integration with river_comments*/
	.comment_feed {
		/*background: #F5F5F5;
		border-bottom:1px solid #DFDFDF;
		clear:left;
		float:none;
		overflow:hidden;
		margin: 2px 20px 2px 30px;
		padding: 5px 0 4px 5px;
		width:350px;*/
	}
	
	/* lightbox */
    #fonLB {
        width: 100%;
        height: 100%;
        background: #000;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 12345;
        display: none;
    }
    .lb {
        display: none;
        position: absolute;
        top: 50px;
        left: 25%;
        z-index: 123456;
    }
    .lbHome {
       	background: #FFF;
    	border: 10px solid #999;
        padding: 30px 10px 10px;
        width: 580px;
    }
    .lbHome img {
        display: block;
        position: relative;
        z-index: 1;
        top: 0;
        left: 0;
    }
    .lbHome .cerrar {
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
    /* end of lightbox */

    /*Specific lightbox Changes*/
    .likes-content {
		overflow:auto;
		padding:4px;
    	height:266px;
    }
    /*Support for Widget Activity*/
	.collapsable_box_content .comment_feed {
	}
	.collapsable_box_content .comment_feed .likes_wrapper  {
		margin:2px 15px;
		width:210px;
	}
	.collapsable_box_content .comment_box .comment_feed {
		margin: 0px 30px;
	}
	.collapsable_box_content .comment_add_box textarea {
		width:213px;
	}
	.collapsable_box_content .comment_add_box textarea.current {
		width: 179px;
	}
	.collapsable_box_content .comment_box_submit {
		display: block;
	}
	
	/*Ajax loading*/
	.likes_loading{
		background: transparent url(<?php echo $vars['url']?>mod/likes/graphics/loading.gif) no-repeat center right;
		padding:0 18px;
	}
	
	/*River*/
	.item_separator {
		clear: both;
		display: block;
		margin: 1px 0px;
		height:3px;
	}
	.river_item_time {
		padding:0 0 0 32px;
	}
	.river_action_links {
		font-size: 90%;
	}
    	