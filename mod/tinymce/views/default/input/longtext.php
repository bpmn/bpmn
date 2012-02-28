<?php

	/**
	 * Elgg long text input with the tinymce text editor intacts
	 * Displays a long text input field
	 *
	 * @package ElggTinyMCE
	 *
	 * @uses $vars['value'] The current value, if any
	 * @uses $vars['js'] Any Javascript to enter into the input tag
	 * @uses $vars['internalname'] The name of the input field
	 *
	 */

	global $tinymce_js_loaded;

	$input = rand(0,9999);

	if (!isset($tinymce_js_loaded)) $tinymce_js_loaded = false;

	if (!$tinymce_js_loaded) {

?>
<!-- include tinymce -->
<script language="javascript" type="text/javascript" src="<?php echo $vars['url']; ?>mod/tinymce/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<!-- intialise tinymce, you can find other configurations here http://tinymce.moxiecode.com/tryit/full.php -->
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "specific_textareas",
	editor_selector : "mceEditor",
	theme : "advanced",
	skin : "cirkuit",
        content_css : "<?php echo $vars['url']; ?>mod/tinymce/views/default/tinymce/custom_content.css",
        plugins : "lists,style,table,advhr,advimage,emotions,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras",
        convert_urls : false,
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,table,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink",
	theme_advanced_buttons3 : "print,|,insertdate,inserttime,|,forecolor,backcolor,|,image,emotions<?php if (isadminloggedin()){?>,|,code<?php }?>",
        theme_advanced_buttons4 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	extended_valid_elements : "@[id|class|style|title|dir<ltr?rtl|lang|xml::lang|onclick|ondblclick|onmousedown|onmouseup|onmouseover|onmousemove|onmouseout|onkeypress|onkeydown|onkeyup],a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|style],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style],embed[src|type|wmode|width|height],object[classid|clsid|codebase|width|height],font[face|size|color|style],span[class|align|style],style[lang|media|title|type]"
        
        

});
function toggleEditor(id) {
if (!tinyMCE.get(id))
	tinyMCE.execCommand('mceAddControl', false, id);
else
	tinyMCE.execCommand('mceRemoveControl', false, id);
}
</script>
<?php

		$tinymce_js_loaded = true;
	}

?>

<!-- show the textarea -->
<textarea class="input-textarea mceEditor" name="<?php echo $vars['internalname']; ?>" <?php echo $vars['js']; ?>><?php echo htmlentities($vars['value'], null, 'UTF-8'); ?></textarea>

<script type="text/javascript">
	$(document).ready(function() {
		$('textarea').parents('form').submit(function() {
			tinyMCE.triggerSave();
		});
	});
</script>
