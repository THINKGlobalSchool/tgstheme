<?php
/**
 * Filtrate dashboard
 * 
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 * 
 * @uses $vars['menu_name']
 */

echo elgg_view_menu($vars['menu_name'], array(
	'sort_by' => 'priority'
));

echo "<div id='filtrate-content-container'></div>";