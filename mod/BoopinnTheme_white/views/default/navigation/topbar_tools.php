<?php

	/*** Seashells Theme for Elgg 
	* (c) Ismayil Khayredinov (ismayil.khayredinov@gmail.com)
	*
	* HORIZONTAL MENU
	*/

$menu = get_register('menu');

//var_export($menu);

if (is_array($menu) && sizeof($menu) > 0) {
	$alphamenu = array();
	foreach($menu as $item) {
		$alphamenu[$item->name] = $item;
	}
	ksort($alphamenu);

?>

<?php

    foreach($alphamenu as $item){
        echo '<div class="toolbarlinks">' ;
        echo "<a href=\"{$item->value}\" class=\"pagelinks\">" . $item->name . "</a>";
        echo "</div>" ;
    }
   ?>
               
<?php
}?>
