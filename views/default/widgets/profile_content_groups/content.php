<?php
/**
 * TGS Theme 2 Groups/Content Profile Widget
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.com/
 */

// General stuff
$page_owner = elgg_get_page_owner_entity();

if (!$page_owner) {
	$page_owner = elgg_get_logged_in_user_entity();
}

// Module menu
$filter_menu = elgg_view_menu('content_groups_profile_menu', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz elgg-menu-filter elgg-menu-filter-default'
));

// User content menu
$content_menu = elgg_view_menu('owner_block', array('entity' => $page_owner));

// User groups module
$groups_module = elgg_view('modules/genericmodule', array(
	'view' => 'tgstheme/modules/profile_groups',
	'view_vars' => array(
		'guid' => $page_owner->guid,
	), 
));

$content .= $filter_menu;
$content .= "<div id='user-content' class='profile-content-groups-filter-container'>{$content_menu}</div>";
$content .= "<div id='user-groups' class='profile-content-groups-filter-container hidden'>{$groups_module}</div>";


echo $content;