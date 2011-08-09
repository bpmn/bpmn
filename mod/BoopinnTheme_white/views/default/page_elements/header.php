<?php
/**
 * Elgg pageshell
 * The standard HTML header that displays across the site
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['config'] The site configuration settings, imported
 * @uses $vars['title'] The page title
 * @uses $vars['body'] The main content of the page
 */
// Set title
if (empty($vars['title'])) {
    $title = $vars['config']->sitename;
} else if (empty($vars['config']->sitename)) {
    $title = $vars['title'];
} else {
    $title = $vars['config']->sitename . ": " . $vars['title'];
}

global $autofeed;
if (isset($autofeed) && $autofeed == true) {
    $url = $url2 = full_url();
    if (substr_count($url, '?')) {
        $url .= "&view=rss";
    } else {
        $url .= "?view=rss";
    }
    if (substr_count($url2, '?')) {
        $url2 .= "&view=odd";
    } else {
        $url2 .= "?view=opendd";
    }
    $feedref = <<<END

<link rel="alternate" type="application/rss+xml" title="RSS" href="{$url}" />
<link rel="alternate" type="application/odd+xml" title="OpenDD" href="{$url2}" />

END;
} else {
    $feedref = "";
}

// we won't trust server configuration but specify utf-8
header('Content-type: text/html; charset=utf-8');

$version = get_version();
$release = get_version(true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="ElggRelease" content="<?php echo $release; ?>" />
        <meta name="ElggVersion" content="<?php echo $version; ?>" />
        <title><?php echo $title; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $vars['url'] . "mod/BoopinnTheme_white/_graphics/favicon.ico"; ?>" />

        <script type="text/javascript" src="<?php echo $vars['url']; ?>vendors/jquery/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $vars['url']."mod/BoopinnTheme_white/scripts/javascripts/jquery.easing.1.3.js";?>"></script>
        <script type="text/javascript" src="<?php echo $vars['url']; ?>vendors/jquery/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo $vars['url']; ?>vendors/jquery/jquery.form.js"></script>
        <script type="text/javascript" src="<?php echo $vars['url']; ?>_css/js.php?lastcache=<?php echo $vars['config']->lastcache; ?>&amp;js=initialise_elgg&amp;viewtype=<?php echo $vars['view']; ?>"></script>
        <script type="text/javascript" src="<?php echo $vars['url']."mod/BoopinnTheme_white/scripts/javascripts/jquery.coda-slider-2.0.js";?>"></script>
        <script type="text/javascript" src="<?php echo $vars['url']."mod/BoopinnTheme_white/scripts/stylesheets/coda-slider-2.0.css";?>"></script>
        <?php
        $context = get_context();

        if (isset($context) && $context == "cis") {
            echo elgg_view('mycis/rgraph', $vars);
        }

        global $pickerinuse;
        if (isset($pickerinuse) && $pickerinuse == true) {
            ?>
            <!-- only needed on pages where we have friends collections and/or the friends picker -->
            <script type="text/javascript" src="<?php echo $vars['url']; ?>vendors/jquery/jquery.easing.1.3.packed.js"></script>
            <script type="text/javascript" src="<?php echo $vars['url']; ?>_css/js.php?lastcache=<?php echo $vars['config']->lastcache; ?>&amp;js=friendsPickerv1&amp;viewtype=<?php echo $vars['view']; ?>"></script>
    <?php
}
?>
        <!-- include the default css file -->
        <link rel="stylesheet" href="<?php echo $vars['url']; ?>_css/css.css?lastcache=<?php echo $vars['config']->lastcache; ?>&amp;viewtype=<?php echo $vars['view']; ?>" type="text/css" />

<?php
echo $feedref;
echo elgg_view('metatags', $vars);
?>
        <script type="text/javascript">
        <?php
        if (isset($context) && $context != "cis") {
            $initJs = "jQuery(document).ready(function($) {

                  $('#coda-slider-1').codaSlider({
                         autoSlide:true,
                         autoSlideInterval:4500,
                         autoSlideStopWhenClicked:true
                });
                
                 // set focus in user name field 
                $('input[name=username]').focus(); 
            });";
        } else {
            $initJs = "jQuery(document).ready(function($) { init() ; });";
        }

        echo $initJs;
        ?>
	</script>

<script type="text/javascript">

function launch_ga() 
{
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19883710-1']);
  _gaq.push(['_setDomainName', 'boopinn.com']);
  _gaq.push(['_setAllowHash', 'false']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  
} 

</script>




    </head>

    <body>
