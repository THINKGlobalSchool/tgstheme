<?php
/**
 * TGS Theme 2 River Widget
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

echo elgg_view('filtrate/dashboard', array(
	'menu_name' => 'activity_filter',
	'infinite_scroll' => false,
	'default_params' => array(
		'type' => 0
	),
	'list_url' => elgg_get_site_url() . 'ajax/view/tgstheme/activity_list',
	'disable_advanced' => true,
	'disable_history' => true
));