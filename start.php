<?php
/**
 * TGS Theme 2
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */

elgg_register_event_handler('init', 'system', 'tgstheme_init');

function tgstheme_init() {
	// Register Global CSS
	$t_css = elgg_get_simplecache_url('css', 'tgstheme/css');
	elgg_register_css('elgg.tgstheme', $t_css);
	elgg_load_css('elgg.tgstheme');

	// Register JS library
	$t_js = elgg_get_simplecache_url('js', 'tgstheme/tgstheme');
	elgg_register_js('elgg.tgstheme', $t_js);
	elgg_load_js('elgg.tgstheme');

	// Register 'home' page handler
	elgg_register_page_handler('home', 'home_page_handler');

	// Add a site navigation item
	$item = new ElggMenuItem('home', "<span class='elgg-icon elgg-icon-home'></span>", 'home');
	elgg_register_menu_item('site', $item);

	// Plugin hook for index redirect
	elgg_register_plugin_hook_handler('index', 'system', 'home_redirect', 600);

	return true;
}

/**
 * Home Page Handler
 *
 * @param array $page From the page_handler function
 * @return true|false Depending on success
 *
 */
function home_page_handler($page) {
	gatekeeper();
	$params['sidebar'] = elgg_view('tgstheme/modules/profile');
	$params['sidebar'] .= elgg_view('tgstheme/modules/groups');
	$params['sidebar'] .= elgg_view('launchpad/module');

	$params['content'] = elgg_view('wire-extender/wire_form');
	$params['content'] .= elgg_view('announcements/announcement_list');

	$params['content'] .= elgg_view('modules/riverajaxmodule', array(
		'title' => elgg_echo('content:latest'),
		'limit' => 5,
		'module_type' => 'featured',
	));

	$body = elgg_view_layout('one_sidebar_right', $params);
	echo elgg_view_page(elgg_echo('tgstheme:title:home'), $body);
}

/**
 * Plugin hook to redirect users from index
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 * @return unknown
 */
function home_redirect($hook, $entity_type, $returnvalue, $params) {
	forward('home');
	return $returnvalue;
}