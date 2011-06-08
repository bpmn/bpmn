<?php
/**
 * Elgg URL display
 * Displays a URL as a link
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses string $vars['href'] The string to display in the <a></a> tags
 * @uses string $vars['text'] The string between the <a></a> tags.
 * @uses bool $vars['target'] Set the target="" attribute.
 * @uses string $vars['class'] what to add in class=""
 * @uses string $vars['js'] Javascript to insert in <a> tag
 * @uses bool $vars['is_action'] Is this a link to an action?
 *
 */

if (isset($vars['value'])) {
	$vars['href'] = $vars['value'];
}

$url = trim($vars['href']);

if (!empty($url)) {
	if (array_key_exists('target', $vars) && $vars['target']) {
		$target = "target = \"{$vars['target']}\"";
	} else {
		$target = '';
	}

        if (array_key_exists('alt', $vars) && $vars['alt']) {
		$target = "alt = \"{$vars['alt']}\"";
	} else {
		$target = '';
	}

       if (array_key_exists('src', $vars) && $vars['src']) {
		$src = "src = \"{$vars['src']}\"";
	} else {
		$src = '';
	}


	if (array_key_exists('class', $vars) && $vars['class']) {
		$class = "class = \"{$vars['class']}\"";
	} else {
		$class = '';
	}

	if (array_key_exists('js', $vars) && $vars['js']) {
		$js = "{$vars['js']}";
	} else {
		$js = '';
	}

	if ((substr_count($url, "http://") == 0) && (substr_count($url, "https://") == 0)) {
		$url = "http://" . $url;
	}

	if (array_key_exists('is_action', $vars) && $vars['is_action']) {
		$url = elgg_add_action_tokens_to_url($url);
	}

	$iconurlContent =  "<a href=\"{$url}\" $target $class $js><img $src $alt  width =\"16px\" height = \"16px\" ></a>";
        echo $iconurlContent ;
}
