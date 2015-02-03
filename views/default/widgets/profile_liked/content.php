<?php
/**
 * TGS Theme 2 Liked content widget
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.com/
 */

$page_owner = elgg_get_page_owner_guid();

if (!$page_owner) {
	$page_owner = $vars['user'];
}

$body = elgg_view('modules/genericmodule', array(
	'view' => 'tgstheme/modules/liked',
	'view_vars' => array(
		'guid' => $page_owner,
	), 
));

echo $body;