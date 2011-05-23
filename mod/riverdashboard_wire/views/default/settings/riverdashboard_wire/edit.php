<?php
/**
 * River Dashboard Wire
 * 
 * @package River Dashboard Wire
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Untamed
 */
 
 if (!get_plugin_setting('dashboardon', 'riverdashboard_wire')) {
	set_plugin_setting('dashboardon', 0, 'riverdashboard_wire');
}
if (!get_plugin_setting('refresh', 'riverdashboard_wire')) {
	set_plugin_setting('refresh', 30, 'riverdashboard_wire');
}

?>
 
<p>
  <?php echo elgg_echo('riverdashboard_wire:settings:refresh'); ?>
 
  <select name="params[refresh]">
  <option value="5" <?php if ($vars['entity']->refresh == 5) echo " selected=\"yes\" "; ?>>5</option>
  <option value="10" <?php if ($vars['entity']->refresh == 10) echo " selected=\"yes\" "; ?>>10</option>
  <option value="15" <?php if ($vars['entity']->refresh == 15) echo " selected=\"yes\" "; ?>>15</option>
  <option value="20" <?php if ($vars['entity']->refresh == 20) echo " selected=\"yes\" "; ?>>20</option>
  <option value="25" <?php if ($vars['entity']->refresh == 25) echo " selected=\"yes\" "; ?>>25</option>
  <option value="30" <?php if ($vars['entity']->refresh == 30) echo " selected=\"yes\" "; ?>>30</option>
  <option value="40" <?php if ($vars['entity']->refresh == 40) echo " selected=\"yes\" "; ?>>40</option>
  <option value="50" <?php if ($vars['entity']->refresh == 50) echo " selected=\"yes\" "; ?>>50</option>
  <option value="60" <?php if ($vars['entity']->refresh == 60) echo " selected=\"yes\" "; ?>>60</option>
  <option value="90" <?php if ($vars['entity']->refresh == 90) echo " selected=\"yes\" "; ?>>90</option>
  <option value="120" <?php if ($vars['entity']->refresh == 120) echo " selected=\"yes\" "; ?>>120</option>
  <option value="180" <?php if ($vars['entity']->refresh == 180) echo " selected=\"yes\" "; ?>>180</option>
  <option value="240" <?php if ($vars['entity']->refresh == 240) echo " selected=\"yes\" "; ?>>240</option>
  <option value="300" <?php if ($vars['entity']->refresh == 300) echo " selected=\"yes\" "; ?>>300</option>
  <option value="600" <?php if ($vars['entity']->refresh == 600) echo " selected=\"yes\" "; ?>>600</option>
  </select>
</p>

<p>
  <?php echo elgg_echo('riverdashboard_wire:settings:dashboardon'); ?>
 
  <select name="params[dashboardon]">
  <option value="1" <?php if ($vars['entity']->dashboardon == 1) echo " selected=\"yes\" "; ?>>Dashboard On</option>
  <option value="0" <?php if ($vars['entity']->dashboardon == 0) echo " selected=\"yes\" "; ?>>Activity Page On</option>
  </select>
</p>