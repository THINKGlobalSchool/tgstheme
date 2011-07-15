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
 * Composer code borrowed from Evan Winslow's Elgg Facebook Theme:
 * https://github.com/ewinslow/elgg-facebook_theme
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

	// Composer menu hook
	elgg_register_plugin_hook_handler('register', 'menu:composer', 'tgstheme_composer_menu_handler');

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
	// Logged in users only
	gatekeeper();

	// Show profile module
	$params['sidebar'] = elgg_view('tgstheme/modules/profile');

	// Show groups module
	$params['sidebar'] .= elgg_view('tgstheme/modules/groups', array('limit' => 5));

	// Grab tabs
	$tags = elgg_get_tags(array('threshold' => 2, 'limit' => 50));

	// Tag Module
	$options = array('class' => 'tgstheme-module');
	$params['sidebar'] .= elgg_view_module('featured', elgg_echo('tagcloud'), elgg_view("output/tagcloud", array('value' => $tags)), $options);

	// Show launchpad module
	$params['sidebar'] .= elgg_view('launchpad/module');

	// Share box area
	//$params['content'] = elgg_view('wire-extender/wire_form');
	$composer = elgg_view('page/elements/composer', array('entity' => elgg_get_logged_in_user_entity()));
	$params['content'] = elgg_view_module('info', elgg_echo("wire-extender:label:thewire:doing"), $composer);

	// Announcements
	$params['content'] .= elgg_view('announcements/announcement_list');

	// River module
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

/**
 * Adds menu items to the "composer". Need to also add
 * the forms that these items point to.
 *
 * @todo Get the composer concept integrated into core
 */
function tgstheme_composer_menu_handler($hook, $type, $items, $params) {
	$entity = $params['entity'];

	if (elgg_is_active_plugin('thewire') && $entity->canWriteToContainer(0, 'object', 'thewire')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'thewire',
			'href' => "/ajax/view/thewire/composer?container_guid=$entity->guid",
			'text' => elgg_view_icon('share') . elgg_echo("composer:object:thewire"),
			'priority' => 100,
		));

		//trigger any javascript loads that we might need
		elgg_view('thewire/composer');
	}

	/*
	if (elgg_is_active_plugin('messageboard') && $entity->canAnnotate(0, 'messageboard')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'messageboard',
			'href' => "/ajax/view/messageboard/composer?entity_guid=$entity->guid",
			'text' => elgg_view_icon('speech-bubble-alt') . elgg_echo("composer:annotation:messageboard"),
			'priority' => 200,
		));

		//trigger any javascript loads that we might need
		elgg_view('messageboard/composer');
	}
	*/

	if (elgg_is_active_plugin('bookmarks') && $entity->canWriteToContainer(0, 'object', 'bookmarks')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'bookmarks',
			'href' => "/ajax/view/bookmarks/composer?container_guid=$entity->guid",
			'text' => elgg_view_icon('push-pin') . elgg_echo("composer:object:bookmarks"),
			'priority' => 300,
		));

		//trigger any javascript loads that we might need
		elgg_view('bookmarks/composer');
	}

	if (elgg_is_active_plugin('blog') && $entity->canWriteToContainer(0, 'object', 'blog')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'blog',
			'href' => "/ajax/view/blog/composer?container_guid=$entity->guid",
			'text' => elgg_view_icon('speech-bubble') . elgg_echo("composer:object:blog"),
			'priority' => 600,
		));

		//trigger any javascript loads that we might need
		elgg_view('blog/composer');
	}

	if (elgg_is_active_plugin('file') && $entity->canWriteToContainer(0, 'object', 'file')) {
		$items[] = ElggMenuItem::factory(array(
			'name' => 'file',
			'href' => "/ajax/view/file/composer?container_guid=$entity->guid",
			'text' => elgg_view_icon('clip') . elgg_echo("composer:object:file"),
			'priority' => 700,
		));

		//trigger any javascript loads that we might need
		elgg_view('file/composer');
	}

	return $items;
}