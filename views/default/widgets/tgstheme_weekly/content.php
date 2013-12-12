<?php
/**
 * TGS Theme 2 Weekly Widget
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

$body = elgg_view('modules/genericmodule', array(
	'view' => 'tgstheme/modules/weekly',
	'view_vars' => array(
		//'guid' => $vars['entity']->guid,
	), 
));

echo $body;