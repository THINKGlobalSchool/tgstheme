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
 * VIEW OVERRIDES:
 *   * navigation/menu/site - use text string 'Browse' instead of 'More'
 *   * css/elements/*
 *   * css/typeaheadtags/css
 * 	 * messages/css
 *   * page/elements/header_logo
 *   * page/elements/owner_block
 *   * page/elements/shortcut_icon
 *   * search/css
 *   * search/search_box
 *   * js/tinymce
 *
 * Composer code borrowed from Evan Winslow's Elgg Facebook Theme:
 * https://github.com/ewinslow/elgg-facebook_theme
 */

elgg_register_event_handler('init', 'system', 'tgstheme_init');

function tgstheme_init() {
	// Register Global CSS
	$t_css = elgg_get_simplecache_url('css', 'tgstheme/css');
	elgg_register_simplecache_view('css/tgstheme/css');
	elgg_register_css('elgg.tgstheme', $t_css);
	elgg_load_css('elgg.tgstheme');
	
	// Register TinyMCE CSS
	$tm_css = elgg_get_simplecache_url('css', 'tgstheme/tinymce');
	elgg_register_simplecache_view('css/tgstheme/tinymce');
	elgg_register_css('elgg.tgstheme.tinymce', $tm_css);
	elgg_load_css('elgg.tgstheme.tinymce');

	// Register Activity Ping JS library
	$t_js = elgg_get_simplecache_url('js', 'tgstheme/tgstheme');
	elgg_register_simplecache_view('js/tgstheme/tgstheme');
	elgg_register_js('elgg.tgstheme', $t_js);
	elgg_load_js('elgg.tgstheme');

	// Register Activity Ping JS library
	$ap_js = elgg_get_simplecache_url('js', 'tgstheme/activityping');
	elgg_register_simplecache_view('js/tgstheme/activityping');
	elgg_register_js('elgg.activityping', $ap_js);
	
	// Register Share Ping JS library
	$s_js = elgg_get_simplecache_url('js', 'tgstheme/share');
	elgg_register_simplecache_view('js/tgstheme/share');
	elgg_register_js('elgg.share', $s_js);
	
	// Register Share Ping JS library
	$s_js = elgg_get_simplecache_url('js', 'tgstheme/share');
	elgg_register_simplecache_view('js/tgstheme/share');
	elgg_register_js('elgg.share', $s_js);
	
	// Register Menus JS library
	$m_js = elgg_get_simplecache_url('js', 'tgstheme/tgsmenus');
	elgg_register_simplecache_view('js/tgstheme/tgsmenus');
	elgg_register_js('elgg.tgsmenus', $m_js);
	elgg_load_js('elgg.tgsmenus');

	if (elgg_get_context() == 'activity') {
		elgg_load_js('elgg.activityping');
	}

	// Register JS for jQuery HTML extension (fixes weird autocomplete when ajax loaded)
	elgg_register_js('elgg.userpicker.html', 'mod/tgstheme/vendors/jquery.ui.autocomplete.html.js');

	// Register 'home' page handler
	elgg_register_page_handler('home', 'home_page_handler');

	// Register 'legal' page handler
	elgg_register_page_handler('legal','legal_page_handler');

	// Register activity ping page handler
	elgg_register_page_handler('activity_ping', 'ping_page_handler');

	// Add 'home' navigation item
	if (elgg_is_logged_in()) {
		$home_url = 'home';
	} else {
		$home_url = '';
	}
	$item = new ElggMenuItem('home', "<span class='elgg-icon elgg-icon-home'></span>", $home_url);
	elgg_register_menu_item('site', $item);

	// Add a couple footer items
	$item = new ElggMenuItem('1termsofuse', elgg_echo("tgstheme:label:terms"), elgg_get_site_url() . 'legal/spot_terms_of_use');
	elgg_register_menu_item('footer', $item);

	$item = new ElggMenuItem('2privacypolicysupplement', elgg_echo("tgstheme:label:policysupplement"), elgg_get_site_url() . 'legal/privacy_supplement');
	elgg_register_menu_item('footer', $item);
	
	// Register share by email item
	if (elgg_is_logged_in()) {
		elgg_load_js('lightbox');
		elgg_load_js('elgg.share');
		elgg_load_css('lightbox');
		elgg_load_js('elgg.userpicker');
		elgg_load_js('elgg.userpicker.html');
	
		$address = urlencode(current_page_url());
	
		elgg_register_menu_item('extras', array(
			'name' => 'email_share',
			'text' => elgg_view_icon('mail-red'),
			'href' => "ajax/view/tgstheme/email_share?address=$address",
			'link_class' => 'elgg-lightbox',
			'rel' => 'nofollow',
		));
	}
	
	// Share by email action
	$action_path = elgg_get_plugins_path() . 'tgstheme/actions/share';
	elgg_register_action('share/email', "$action_path/email.php");

	// also extend the core activity
	elgg_extend_view('core/river/filter', 'tgstheme/update', -1);

	// Extend HEAD
	elgg_extend_view('page/elements/head', 'tgstheme/head');

	// Extend topbar
	elgg_extend_view('page/elements/topbar', 'tgstheme/topbar');
	
	// Extend admin CSS
	elgg_extend_view('css/admin', 'css/tgstheme/admin');
	elgg_extend_view('css/admin', 'css/elements/autocomplete_admin');
	
	// Extend custommenus CSS
	elgg_extend_view('css/custommenus/css', 'css/tgstheme/custommenus');
	
	// Extend Fullcalendar CSS
	elgg_extend_view('css/fullcalendar', 'css/tgstheme/fullcalendar');
	
	// Extend search/searchbox
	if (elgg_get_plugin_setting('help_group', 'tgstheme') && elgg_is_logged_in()) {
		elgg_extend_view('search/search_box', 'tgstheme/help_link');
	}

	// Extend activity sidebar
	if (elgg_is_logged_in() && elgg_get_context() == 'activity') {
		elgg_extend_view('page/elements/sidebar', 'tgstheme/main_stats', 499);
	}

	if (!elgg_is_logged_in() && elgg_get_plugin_setting('analytics_enable', 'tgstheme')) {
		elgg_extend_view('page/elements/head', 'tgstheme/analytics');
	}

	// Plugin hook for index redirect
	if (elgg_is_logged_in()) {
		elgg_register_plugin_hook_handler('index', 'system', 'home_redirect', 600);
	}

	// Composer menu hook
	elgg_register_plugin_hook_handler('register', 'menu:composer', 'tgstheme_composer_menu_handler');

	// Topbar menu hook
	elgg_register_plugin_hook_handler('register', 'menu:topbar', 'tgstheme_topbar_menu_handler');
	
	// Entity menu hook, used to reorganize the entity menu
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'tgstheme_entity_menu_handler', 9999);

	// Entity menu hook, used to reorganize the entity menu
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'tgstheme_ownerblock_menu_handler', 9999);

	// Add a new tab to the tabbed profile
	elgg_register_plugin_hook_handler('tabs', 'profile', 'tgstheme_twitter_profile_tab_hander');
	elgg_register_plugin_hook_handler('tabs', 'profile', 'tgstheme_liked_profile_tab_hander');
	
	// Add a hook handler for HTMLawed allowed styles
	elgg_register_plugin_hook_handler('allowed_styles', 'htmlawed', 'tgstheme_allowed_styles_handler');

//	elgg_unregister_page_handler('activity');

//	elgg_register_page_handler('activity', 'tgstheme_river_page_handler');

	// Whitelist ajax views
	elgg_register_ajax_view('thewire/composer');
	elgg_register_ajax_view('messageboard/composer');
	elgg_register_ajax_view('bookmarks/composer');
	elgg_register_ajax_view('blog/composer');
	elgg_register_ajax_view('file/composer');
	elgg_register_ajax_view('webvideos/composer');
	elgg_register_ajax_view('tgstheme/email_share');
	elgg_register_ajax_view('tgstheme/modules/liked');
	
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

	// Forward parents to parentportal home, not the dashboard
	if (elgg_is_active_plugin('parentportal')) {
		if (parentportal_is_user_parent(elgg_get_logged_in_user_entity())) {
			forward('parentportal');
		}
	}

	// Extendable sidebar view
	$params['sidebar'] = elgg_view('tgstheme/home/sidebar_top');

	// Show profile module
	$params['sidebar'] .= elgg_view('tgstheme/modules/profile');

	// Show launchpad module
	$params['sidebar'] .= elgg_view('launchpad/module');

	// Show groups module
	$params['sidebar'] .= elgg_view('tgstheme/modules/groups', array('limit' => 6));

	// Grab tabs
	$tags = elgg_get_tags(array('threshold' => 2, 'limit' => 50));

	// Shuffle tags
	shuffle($tags);

	// Tag Module
	$options = array('class' => 'tgstheme-module');
	$params['sidebar'] .= elgg_view_module('featured', elgg_echo('tagcloud'), elgg_view("output/tagcloud", array('value' => $tags)), $options);

	// Extendable content view
	$params['content'] = elgg_view('tgstheme/home/content_top');

	// Share box area
	$composer = elgg_view('page/elements/composer', array('entity' => elgg_get_logged_in_user_entity()));
	$params['content'] .= elgg_view_module('info', elgg_echo("wire-extender:label:thewire:doing"), $composer);

	// Announcements
	$params['content'] .= elgg_view('announcements/announcement_list');
	
	// Extra info module
	if (elgg_get_plugin_setting('module_enable', 'tgstheme')) {
		$popup_label = elgg_echo('tgstheme:label:whatisthis');
		$popup_info = elgg_echo(elgg_get_plugin_setting('module_description', 'tgstheme'));
	
		$title = elgg_get_plugin_setting('module_title', 'tgstheme');
	
		$module_title = elgg_echo($title) . "<span class='home-small right'><a rel='popup' href='#info'>$popup_label</a><div id='info' class='home-popup' style='display: none;'>$popup_info</div>";
	
		$params['content'] .= elgg_view('modules/ajaxmodule', array(
			'title' => $module_title,
			'tag' => elgg_get_plugin_setting('module_tag', 'tgstheme'),
			'subtypes' => array(elgg_get_plugin_setting('module_subtype', 'tgstheme')),
			'listing_type' => 'simpleicon',
			'restrict_tag' => TRUE,
			'limit' => 2,
			'module_type' => 'featured',
			'module_id' => 'home-page-info-module',
			'hide_empty' => TRUE,
	 	));

	}

	// River module
	$river_title = elgg_echo('content:latest');

	$river_title .= elgg_view('output/url', array(
		'text' => elgg_echo('link:view:all'),
		'href' => elgg_get_site_url() . 'activity',
		'class' => 'right'
	));

	$params['content'] .= elgg_view('modules/riverajaxmodule', array(
		'title' => $river_title,
		'limit' => 10,
		'module_type' => 'featured',
	));

	$body = elgg_view_layout('one_sidebar_right', $params);
	echo elgg_view_page(elgg_echo('tgstheme:title:home'), $body);
}

/* Legal Page Handler */
function legal_page_handler($page) {
	switch($page[0]) {
		case 'spot_terms_of_use':
			$title = "THINK Spot Terms of Use";
			$content = elgg_view('tgstheme/legal/spot_terms_of_use');
			break;
		case 'privacy_supplement':
			$title = "SUPPLEMENTAL POLICY TO THE TGS PRIVACY AND INFORMATION SECURITY POLICY";
			$content = elgg_view('tgstheme/legal/privacy_supplement');
			break;
	}

	$params['content'] = $content;

	$body = elgg_view_layout('one_column', $params);
	echo elgg_view_page($title, $body);
}

/**
 * Ping Page Handler
 *
 * @param array $page From the page_handler function
 * @return true|false Depending on success
 *
 */
function ping_page_handler($page) {
	if (elgg_is_xhr()) {
		// check for last checked time
		if (!$seconds_passed = get_input('seconds_passed', 0)) {
			echo '';
			exit;
		}

		$last_reload = time() - $seconds_passed;

		// Get current count of entries
		$current_count = elgg_get_river(array(
			'count' => TRUE,
		));

		// Get the count at the last reload
		$last_count = elgg_get_river(array(
			'count' => TRUE,
			'posted_time_upper' => $last_reload,
		));

		if ($current_count > $last_count) {
			$count = $current_count - $last_count;

			$s = ($count == 1) ? '' : 's';

			$link = "<a href='' onClick=\"window.location.reload();\" class='update_link'>$count update$s!</a>";
			$page_title = "[$count update$s] ";

			echo json_encode(array(
				'count' => $count,
				'link' => $link,
				'page_title' => $page_title,
			));
		}
		return TRUE;
	}
	return FALSE;
}

/**
 * Custom page handler for activiy
 *
 * @param array $page
 */
function tgstheme_river_page_handler($page) {
	global $CONFIG;

	elgg_set_page_owner_guid(elgg_get_logged_in_user_guid());

	// make a URL segment available in page handler script
	$page_type = elgg_extract(0, $page, 'all');
	$page_type = preg_replace('[\W]', '', $page_type);
	if ($page_type == 'owner') {
		$page_type = 'mine';
	}
	set_input('page_type', $page_type);

	// content filter code here
	$entity_type = '';
	$entity_subtype = '';

	$path = elgg_get_plugins_path() . "tgstheme/pages/river.php";

	require_once($path);
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

	if (elgg_is_active_plugin('webvideos') && $entity->canWriteToContainer(0, 'object', 'webvideo')) {
		
		$icon = "<span class=\"elgg-icon elgg-icon-video\"></span>";
		
		$items[] = ElggMenuItem::factory(array(
			'name' => 'webvideos',
			'href' => "/ajax/view/webvideos/composer?container_guid=$entity->guid",
			'text' => $icon . elgg_echo("composer:object:webvideo"),
			'priority' => 800,
		));

		//trigger any javascript loads that we might need
		elgg_view('webvideos/composer');
	}

	return $items;
}

/**
 * Hook to remove the elgg logo from the topbar menu
 */
function tgstheme_topbar_menu_handler($hook, $type, $items, $params) {
	foreach($items as $idx => $item) {
		if ($item->getName() == 'elgg_logo') {
			unset($items[$idx]);
		}

		if ($item->getName() == 'friends') {
			unset($items[$idx]);
		}

		if ($item->getName() == 'profile') {
			$text = $item->getText();
			$user = elgg_get_logged_in_user_entity();
			$name_text = "<span style='margin-left: 10px; float: right'>" . $user->name . "</span>";
			$item->setText($text . $name_text);
		}

		if ($item->getName() == 'messages') {
			$text = $item->getText();
			$item->setText($text . elgg_echo('messages'));
		}
	}
	return $items;
}

/**
 * Reorganize the entity menu
 */ 
function tgstheme_entity_menu_handler($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'object')) {
		/* 
		 We're going to make all new sections here:
		 - default will be broken up into 'info' and 'actions' and 'other'
		   we can add items to these sections manually as needed
		*/

		// Core 'info' menu items (as decided by me)
		$core_info_items = array(
			'access',
			'published_status', // Blogs
			'likes_count'
		);

		// Core 'action' items 
		$core_action_items = array(
			'edit',
			'delete',
			'likes',
		);

		// Assign new sections
		foreach ($return as $idx => $item) {
			if ($item->getSection() == 'default') {
				if (in_array($item->getName(), $core_info_items)) {
			        $item->setSection('info');
				} else if (in_array($item->getName(), $core_action_items)) {
					if ($item->getName() == 'likes' && !elgg_is_logged_in()) {
						unset($return[$idx]); // Likes are showing up not logged in for some reason
					}
			        $item->setSection('actions');
				} else {
			        $item->setSection('other');
				}
			}
		}
	}
	return $return;
}

/**
 * Modify the owner block menu
 */
function tgstheme_ownerblock_menu_handler($hook, $type, $return, $params) {
	// Strip the 'group' text from the group menu items
	if (elgg_instanceof($params['entity'], 'group')) {
		// Assign new sections
		foreach ($return as $item) {
			$item->setText(substr($item->getText(), 6));
		}
	}	

	return $return;
}

/**
 * Handler to add a twitter tab to the tabbed profile
 */
function tgstheme_twitter_profile_tab_hander($hook, $type, $value, $params) {
	if (!empty(elgg_get_page_owner_entity()->twitter)) {
		$value[] = 'twitter_tab';
	}
	return $value;
}


/**
 * Handler to add a 'Things I've Liked' tab to the tabbed profile
 */
function tgstheme_liked_profile_tab_hander($hook, $type, $value, $params) {
	$value[] = 'liked_tab';
	return $value;
}

/**
 * Handler add any required css styles to HTMLawed's allowed styles list
 */
function tgstheme_allowed_styles_handler($hook, $type, $value, $params) {
	$value[] = 'display';
	return $value;
}