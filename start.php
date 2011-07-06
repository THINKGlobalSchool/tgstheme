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
	// Register CSS
	$t_css = elgg_get_simplecache_url('css', 'tgstheme/css');
	elgg_register_css('elgg.tgstheme', $t_css);

	// Register JS library
	$t_js = elgg_get_simplecache_url('js', 'tgstheme/tgstheme');
	elgg_register_js('elgg.tgstheme', $t_js);

	// Load JS/CSS Globally
	elgg_load_css('elgg.tgstheme');
	elgg_load_js('elgg.tgstheme');

	// Register 'home' page handler
	elgg_register_page_handler('home', 'home_page_handler');

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
	$params['title'] = elgg_echo('tgstheme:title:home');
	$params['content'] = "Test";

	$body = elgg_view_layout('one_column', $params);

	echo elgg_view_page($params['title'], $body);
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