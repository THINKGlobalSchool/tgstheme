<?php
/**
 * TGS Theme 2
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.com/
 *
 * VIEW OVERRIDES:
 *   * navigation/menu/site - (Might not need this anymore)
 *   * css/elements/*
 *   * css/typeaheadtags/css
 * 	 * messages/css
 *   * page/default (Override default page shell)
 *   * page/elements/header
 *   * page/elements/header_logo (Won't need this is we lose the header)
 *   * page/elements/owner_block
 *   * page/elements/sidebar
 *   * page/elements/tagcloud_block
 *   * page/layouts/one_sidebar
 *   * page/layouts/one_column
 *   * page/layouts/content
 *   * page/components/list
 *   * navigation/breadcrumbs
 *   * search/css
 *   * search/search_box
 *   * river/elements/image
 *   * profile/layout
 *   * profile/header
 *   * group/default (set view location)
 *   * groups/profile/summary
 *   * core/account/login_box
 *   * core/river/filter
 *
 * 1.9 UPDATE TODOS
 *   * Re-work chosen/main theme JS libs (use AMD)
 */

elgg_register_event_handler('init', 'system', 'tgstheme_init');
elgg_register_event_handler('pagesetup', 'system', 'tgstheme_pagesetup', 501);

function tgstheme_init() {
	// Extend global CSS
	elgg_extend_view('css/elgg', 'css/tgstheme/css');
	elgg_extend_view('css/elgg', 'css/jquery.ui');

	// Extend admin CSS
	elgg_extend_view('css/admin', 'css/tgstheme/admin');
	elgg_extend_view('css/admin', 'css/jquery.ui');
	elgg_extend_view('css/admin', 'css/elements/icons');
	
	// Register general tgstheme JS library
	$t_js = elgg_get_simplecache_url('js', 'tgstheme/tgstheme');
	elgg_register_js('elgg.tgstheme', $t_js);
	elgg_load_js('elgg.tgstheme');
	
	// Register Share JS library
	$s_js = elgg_get_simplecache_url('js', 'tgstheme/share');
	elgg_register_js('elgg.share', $s_js);

	// Replace colorbox CSS
	elgg_unregister_css('lightbox', 'vendors/jquery/colorbox/theme/colorbox.css');
	elgg_register_css('lightbox', elgg_get_site_url() . "mod/tgstheme/vendors/jquery/colorbox/theme/colorbox.css");

	// Register 'home' page handler if roles isn't enabled
	if (!elgg_is_active_plugin('roles')) {
		elgg_register_page_handler('home', 'home_page_handler');
	} else {
		$user = elgg_get_logged_in_user_entity();



		// Roles is enabled, register homepage widgets widgets
		elgg_register_widget_type('tgstheme_profile', $user->name, elgg_echo('tgstheme:widget:profile_title'), array('rolewidget'));
		elgg_register_widget_type('tgstheme_newcontent', elgg_echo('tgstheme:widget:newcontent_title'), elgg_echo('tgstheme:widget:newcontent_desc'), array('rolewidget'));
		elgg_register_widget_type('tgstheme_groups', elgg_echo('tgstheme:widget:groups_title'), elgg_echo('tgstheme:widget:groups_desc'), array('rolewidget'));
		elgg_register_widget_type('tgstheme_weekly', elgg_echo('tgstheme:widget:weekly_title'), elgg_echo('tgstheme:widget:weekly_desc'), array('rolewidget'));
		elgg_register_widget_type('tgstheme_social', elgg_echo('tgstheme:widget:social_title'), elgg_echo('tgstheme:widget:social_desc'), array('rolewidget'));

		if (elgg_get_plugin_setting('module_enable', 'tgstheme')) {
			$extra_title = elgg_get_plugin_setting('module_tag', 'tgstheme');
			elgg_register_widget_type('tgstheme_extra', $extra_title, $extra_title, array('rolewidget'));
		}

		// Register profile widgets
		elgg_register_widget_type('profile_content_groups', elgg_echo('tgstheme:widget:profile_content_title'), elgg_echo('tgstheme:widget:profile_content_desc'), array('roleprofilewidget'));
		elgg_register_widget_type('profile_liked', elgg_echo('tgstheme:widget:profile_liked_title'), elgg_echo('tgstheme:widget:profile_liked_desc'), array('roleprofilewidget'));

		// Set up content/group filter menu
		elgg_register_plugin_hook_handler('register', 'menu:content_groups_profile_menu', 'tgstheme_content_groups_profile_menu_setup');

	}

	// Register 'legal' page handler
	elgg_register_page_handler('legal','legal_page_handler');

	// Register a generic iframe handler
	elgg_register_page_handler('iframe', 'iframe_page_handler');

	// Extend profile page handler
	//elgg_register_plugin_hook_handler('route', 'profile', 'tgstheme_route_profile_handler');

	// Hook into mentions get views
	elgg_register_plugin_hook_handler('get_views', 'mentions', 'tgstheme_mentions_get_views_handler');
	
	elgg_register_plugin_hook_handler('register', 'menu:social-menu', 'tgstheme_social_menu_setup');

	// Register share by email item
	if (elgg_is_logged_in()) {
		elgg_load_js('lightbox');
		elgg_load_js('elgg.share');
		elgg_load_css('lightbox');
	
		$address = urlencode(current_page_url());
	
		elgg_register_menu_item('extras', array(
			'name' => 'email_share',
			'text' => elgg_view_icon('mail-alt-solid'),
			'href' => "ajax/view/tgstheme/email_share?address=$address",
			'link_class' => 'elgg-lightbox',
			'rel' => 'nofollow',
		));

		// Load autocomplete for share
		elgg_load_js('elgg.autocomplete');
		elgg_load_js('jquery.ui.autocomplete.html');
	}
	
	// Share by email action
	$action_path = elgg_get_plugins_path() . 'tgstheme/actions/share';
	elgg_register_action('share/email', "$action_path/email.php");

	// Extend HEAD
	elgg_extend_view('page/elements/head', 'tgstheme/head');

	// Extend topbar
	elgg_extend_view('page/elements/topbar', 'tgstheme/topbar');

	// Extend Fullcalendar CSS
	elgg_extend_view('css/fullcalendar/fullcalendar', 'css/tgstheme/fullcalendar', 9999);
	
 	// Hacky set view location.. group-tools strikes again
    elgg_set_view_location('group/default', elgg_get_plugins_path() . "tgstheme/overrides/");

	if (!elgg_is_logged_in() && elgg_get_plugin_setting('analytics_enable', 'tgstheme')) {
		elgg_extend_view('page/elements/head', 'tgstheme/analytics');
	}

	// Extend the top of the groups profile
	elgg_extend_view('groups/profile/layout/top/extend', 'groups/profile/layout/newcontent');

	// Plugin hook for index redirect
	if (elgg_is_logged_in()) {
		elgg_register_plugin_hook_handler('index', 'system', 'home_redirect', 600);
	}

	// Topbar menu hook
	elgg_register_plugin_hook_handler('register', 'menu:topbar', 'tgstheme_topbar_menu_handler', 9999);
	
	// Hook into entity menu for tidypics specific items
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'tgstheme_tidypics_entity_menu_handler');

	// Hook into entity menu for podcast specific items
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'tgstheme_podcasts_entity_menu_handler');

	// Entity menu hook, used to reorganize the entity menu
	elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'tgstheme_ownerblock_menu_handler', 9999);

	// Modify widget menu
	elgg_register_plugin_hook_handler('register', 'menu:widget', 'tgstheme_widget_menu_setup', 501);

	// Modify footer menu
	elgg_register_plugin_hook_handler('register', 'menu:footer', 'tgstheme_footer_menu_setup');

	// Modify the 'site' menu to get return just the browse menu
	//elgg_register_plugin_hook_handler('prepare', 'menu:site', 'elgg_site_menu_setup');

	// Add a new tab to the tabbed profile
	elgg_register_plugin_hook_handler('tabs', 'profile', 'tgstheme_twitter_profile_tab_hander');
	elgg_register_plugin_hook_handler('tabs', 'profile', 'tgstheme_liked_profile_tab_hander');
	
	// Add a hook handler for HTMLawed allowed styles
	elgg_register_plugin_hook_handler('allowed_styles', 'htmlawed', 'tgstheme_allowed_styles_handler');

	// Hook into forward for iframe submits
	elgg_register_plugin_hook_handler('forward', 'all', 'tgstheme_iframe_forward_handler', 0);

	// Hook into output:before/layout to hack some core sidebars
	elgg_register_plugin_hook_handler('output:before', 'layout', 'tgstheme_layout_output_handler');	

	// Register exception for typeaheadtags
	elgg_register_plugin_hook_handler('get_exceptions', 'typeaheadtags', 'tgstheme_tags_exceptions_handler');

	// Unregister bookmarks page menu handler
	elgg_unregister_plugin_hook_handler('register', 'menu:page', 'bookmarks_page_menu');

	// Register <head> metadata
	elgg_register_plugin_hook_handler('head', 'page', 'tgstheme_setup_head');

	// Unextend header if user is logged in, this will be on the topbar
	elgg_unextend_view('page/elements/header', 'search/header');

	// Unregister core avatar upload action
	elgg_unregister_action('avatar/upload');
	
	// Register new avatar upload action
	$action_path = elgg_get_plugins_path() . 'tgstheme/actions/avatar';
	elgg_register_action('avatar/upload', "$action_path/upload.php");

	// Whitelist ajax views
	elgg_register_ajax_view('tgstheme/email_share');
	elgg_register_ajax_view('tgstheme/modules/liked');
	elgg_register_ajax_view('tgstheme/modules/weekly');
	elgg_register_ajax_view('tgstheme/modules/profile_groups');
	elgg_register_ajax_view('page/elements/topbar_ajax');

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

	/** Tidypics Required Libs **/
	// @TODO move to tidypics/AMD load
	if (elgg_is_active_plugin('tidypics')) {
		elgg_load_js('tidypics');
		elgg_load_js('tidypics:upload');
	}

	// Forward parents to parentportal home, not the dashboard
	if (elgg_is_active_plugin('parentportal')) {
		if (parentportal_is_user_parent(elgg_get_logged_in_user_entity())) {
			forward('parentportal');
		}
	}

	// Extendable sidebar view
	$params['sidebar'] = elgg_view('tgstheme/home/sidebar_top');

	// 'Publish' box
	// $params['sidebar'] .= elgg_view('tgstheme/modules/publish');

	// Show profile module
	$params['sidebar'] .= elgg_view('tgstheme/modules/profile');

	// Show launchpad module
	if (elgg_is_active_plugin('launchpad')) {
		$params['sidebar'] .= elgg_view('launchpad/module');
	}

	// Show groups module
	$options = array(
		'class' => 'tgstheme-module tgstheme-groups-module',
	);
	$content = elgg_view('tgstheme/modules/groups', array('limit' => 6));
	$groups_module = elgg_view_module('featured', elgg_echo('groups'), $content, $options);
	$params['sidebar'] .= $groups_module;

	// Extendable content view
	$params['content'] = elgg_view('tgstheme/home/content_top');

	// Announcements
	if (elgg_is_active_plugin('announcements')) {
		$params['content'] .= elgg_view('announcements/announcement_list');
	}
	
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
		'class' => 'home-small right'
	));

	$params['content'] .= elgg_view('modules/riverajaxmodule', array(
		'title' => $river_title,
		'limit' => 10,
		'module_type' => 'featured',
	));

	$body = elgg_view_layout('one_sidebar_home', $params);
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
 * Customize menus
 *
 * @return void
 * @access private
 */
function tgstheme_pagesetup() {
	// Add 'home' navigation item
	if (elgg_is_logged_in()) {
		$home_url = 'home';
	} else {
		$home_url = elgg_get_site_url();
	}

	/** Quickbar items **/

	// Help link (from admin)
	if (($group_guid = elgg_get_plugin_setting('help_group', 'tgstheme')) && elgg_is_logged_in()) {
		$group = get_entity($group_guid);
		$item = new ElggMenuItem('help_group', elgg_get_plugin_setting('help_label', 'tgstheme'), $group->getURL());
		elgg_register_menu_item('quickbar', $item);
	}

	// Library link (from admin)
	if (($group_guid = elgg_get_plugin_setting('library_group', 'tgstheme')) && elgg_is_logged_in()) {
		$group = get_entity($group_guid);
		$item = new ElggMenuItem('library_group', elgg_get_plugin_setting('library_label', 'tgstheme'), $group->getURL());
		elgg_register_menu_item('quickbar', $item);
	}

	// Porfolio link (from admin)
	if (($group_guid = elgg_get_plugin_setting('portfolio_link', 'tgstheme')) && elgg_is_logged_in()) {
		$item = new ElggMenuItem('portfolio_link', elgg_get_plugin_setting('portfolio_link_label', 'tgstheme'), elgg_get_plugin_setting('portfolio_link', 'tgstheme'));
		elgg_register_menu_item('quickbar', $item);
	}

	// weXplore link (from admin)
	if (($group_guid = elgg_get_plugin_setting('wexplore_group', 'tgstheme')) && elgg_is_logged_in()) {
		$group = get_entity($group_guid);
		$item = new ElggMenuItem('wexplore_group', elgg_get_plugin_setting('wexplore_label', 'tgstheme'), $group->getURL());
		elgg_register_menu_item('quickbar', $item);
	}

	/** Set null page owners on required pages **/
	if (elgg_get_context() == 'activity') {
		elgg_set_page_owner_guid(1);
	}


	// Add terms of use footer item
	$options = array(
		'name' => 'termsofuse',
		'href' => elgg_get_site_url() . 'legal/spot_terms_of_use',
		'text' => elgg_echo("tgstheme:label:terms"),
		//'section' => 'meta',
		'priority' => 100,
	);
	
	elgg_register_menu_item('footer', ElggMenuItem::factory($options));

	// Add privacy footer item
	$options = array(
		'name' => 'privacypolicysupplement',
		'href' => elgg_get_site_url() . 'legal/privacy_supplement',
		'text' => elgg_echo("tgstheme:label:policysupplement"),
		//'section' => 'meta',
		'priority' => 200,
	);

	elgg_register_menu_item('footer', ElggMenuItem::factory($options));

}

// Hook into bookmakrs routing to provide extra content
function tgstheme_route_bookmarks_handler($hook, $type, $return, $params) {
	if (is_array($return['segments']) && $return['segments'][0] == 'add') {
		$address = get_input('address');
		$title = get_input('title');
		$version = get_input('v', FALSE);

		if ($version == BOOKMARKLET_VERSION) {
			elgg_load_library('elgg:bookmarks');

			$content = elgg_view('tgstheme/bookmarklet', array(
				'page_owner_guid' => $page[1],
				'address' => get_input('address'),
				'title' => get_input('title'),
			));
			
			echo elgg_view_page($title, $content, 'bookmarklet');
			return false;
		} else if ($address && $title) {
			elgg_extend_view('forms/bookmarks/save', 'tgstheme/oldbookmarklet', 0);
		}
	}
	return $return;
}

// Hook into profile routing to override profile contents
function tgstheme_route_profile_handler($hook, $type, $return, $params) {
	if (is_array($return['segments']) && $return['segments'][1] != 'edit') {
		if (isset($return['segments'][0])) {
			$username = $return['segments'][0];
			$user = get_user_by_username($username);
			elgg_set_page_owner_guid($user->guid);
		}

		// short circuit if invalid or banned username
		if (!$user || ($user->isBanned() && !elgg_is_admin_logged_in())) {
			register_error(elgg_echo('profile:notfound'));
			forward();
		}

		// Push a top level breadcrumb
		elgg_push_breadcrumb($user->name, $user->getURL());

		if (isset($return['segments'][1])) {
			$section = $return['segments'][1];
		} else {
			$section = 'activity';
		}

		elgg_push_breadcrumb(elgg_echo("profile:{$section}"));

		//$content = tabbed_profile_layout_page($user, $section);
		$body = elgg_view_layout('one_sidebar', array(
			'content' => $content,
			'class' => 'tabbed-profile',
		));
		echo elgg_view_page($user->name, $body);
		return false;
	}
	return $return;
}

/**
 * IFRAME page handler
 *
 * @param array $page From the page_handler function
 * @return true|false Depending on success
 *
 */
function iframe_page_handler($page) {
	gatekeeper();
	$title = $content = '';

	// Set container guid if available
	if (get_input('container_guid') != 0) {
		elgg_set_page_owner_guid(get_input('container_guid'));
	}

	switch ($page[0]) {
		case 'thewire':
			// register the wire's JavaScript
			$thewire_js = elgg_get_simplecache_url('js', 'thewire');
			elgg_register_js('elgg.thewire', $thewire_js);
			elgg_load_js('elgg.thewire');
			$title = "Mini Post";
			$content = elgg_view_form('thewire/add');
			break;
		case 'blog':
			elgg_load_library('elgg:blog');
			$params = blog_get_page_content_edit($page_type, $page[1]);
			$title = $params['title'];
			$content = $params['content'];
			break;
		case 'file':
			elgg_load_library('elgg:file');
			$title = elgg_echo('file:add');
			$form_vars = array('enctype' => 'multipart/form-data');
			$body_vars = file_prepare_form_vars();
			$content = elgg_view_form('file/upload', $form_vars, $body_vars);
			break;
		case 'bookmark':
			elgg_load_library('elgg:bookmarks');
			$page_owner = elgg_get_page_owner_entity();
			$title = elgg_echo('bookmarks:add');
			$vars = bookmarks_prepare_form_vars();
			$content = elgg_view_form('bookmarks/save', array(), $vars);
			break;
		case 'video':
			$page_owner = elgg_get_page_owner_entity();
			$title = elgg_echo('videos:add');
			$vars = simplekaltura_prepare_form_vars();
			$content = elgg_view_form('simplekaltura/save', array(), $vars);
			break;
		case 'page':
			elgg_load_library('elgg:pages');
			$parent_guid = 0;
			$page_owner = elgg_get_page_owner_entity();
			$title = elgg_echo('pages:add');
			$vars = pages_prepare_form_vars(null, $parent_guid);
			$content = elgg_view_form('pages/edit', array(), $vars);
			break;
		case 'googledoc':
			elgg_load_js('elgg.googledocbrowser');
			elgg_load_css('googleapps-jquery-ui');
			$params = googleapps_get_page_content_docs_share();
			$title = $params['title'];
			$content = $params['content'];
			break;
		case 'book':
			elgg_load_library('elgg:readinglist');
			elgg_load_css('elgg.readinglist');
			elgg_load_js('elgg.readinglist');

			// Load google libs
			elgg_load_library('gapc:Client'); // Main client
			elgg_load_library('gapc:Books');  // Books service

			elgg_load_css('lightbox');
			elgg_load_js('lightbox');
			$params = readinglist_get_page_content_edit('add', null);
			$title = $params['title'];
			$content = $params['content'];
			break;
		case 'podcast':
			elgg_load_library('elgg:podcasts');
			elgg_load_js('elgg.podcasts');
			elgg_load_js('soundmanager2');
			elgg_load_css('elgg.podcasts');
			$params = podcasts_get_page_content_edit($page_type, null);
			$title = $params['title'];
			$content = $params['content'];
			break;
		case 'poll':
			$vars = polls_prepare_form_vars();
			$content = elgg_view_form('polls/save', array(), $vars);
			$title = elgg_echo('polls:add');
			break;
		case 'rss':
			$params = rss_get_page_content_edit('add', null);
			$title = $params['title'];
			$content = $params['content'];
			break;
		case 'tagdashboard':
			// Load CSS
			elgg_load_css('elgg.tagdashboards');
			elgg_load_css('jquery.ui.smoothness');
					
			// Load JS
			elgg_load_js('elgg.tagdashboards');

			$params = tagdashboards_get_page_content_edit('add', null);
			$title = $params['title'];
			$content = $params['content'];
			break;
		case 'webvideo':
			$params = webvideos_get_page_content_edit('add', null);
			$title = $params['title'];
			$content = $params['content'];
			break;
		case 'forward': // Special forward endpoint
			echo elgg_view_page('', '', 'iframe_forward');	
			return TRUE;
			break;
		default:
			// Invalid item
			forward();
			return FALSE;
	}

	$content = elgg_view('tgstheme/iframe', array(
		'title' => $title,
		'content' => $content,
	));

	echo elgg_view_page($title, $content, 'iframe');

	return TRUE;
}

/**
 * Home redirect
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 * @return unknown
 */
function home_redirect($hook, $entity_type, $returnvalue, $params) {
	forward('home');
}

/**
 * Plugin hook to add views to be parsed for usernames
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 * @return unknown
 */
function tgstheme_mentions_get_views_handler($hook, $entity_type, $returnvalue, $params) {
	$returnvalue[] = 'output/text';
	$returnvalue[] = 'river/elements/body';
	$returnvalue[] = 'object/elements/summary';
	return $returnvalue;
}

/**
 * Hook to remove the elgg logo from the topbar menu
 */
function tgstheme_topbar_menu_handler($hook, $type, $items, $params) {
	// Grab settings, admin, logout item and remove them from the menu
	foreach ($items as $idx => $item) {
		switch ($item->getName()) {
			case 'logout':
				$logout_item = $item;
				$logout_item->setText(elgg_view_icon('arrow-right') . $logout_item->getText());
				$logout_item->setPriority(500);
				unset($items[$idx]);
				break;
			case 'administration':
				$administration_item = $item;
				unset($items[$idx]);
				$administration_item->setPriority(400);
				break;
			case 'usersettings':
				$settings_item = $item;
				unset($items[$idx]);
				$settings_item->setPriority(400);
				break;
			case 'account':
				//$account_item = $item;
				//unset($items[$idx]);
				break;
		}
	}

	foreach ($items as $idx => $item) {
		switch ($item->getName()) {
			case 'elgg_logo':
				/* Remove Elgg Logo */
				unset($items[$idx]);
				break;
			case 'friends':
				/* Remove Friends */
				unset($items[$idx]);
				break;
			case 'profile':
				/* Modify Profile Menu */
				$text = $item->getText();
				$user = elgg_get_logged_in_user_entity();
				// $name_text = "<span class='tgstheme-topbar-username elgg-topbar-dropdown'>" . $user->name . "</span>";
				// $item->setText($text . $name_text);
				$item->setSection('alt');
				$item->setPriority('1000');
				$item->addLinkClass('elgg-topbar-dropdown');

				// Set logout/settings/admin parent
				$logout_item->setParent($item);

				// Set parent
				$settings_item->setParent($item);

				// Create new view profile item
				$view_profile_item = ElggMenuItem::factory(array(
					'name' => 'view_profile',
					'href' => $item->getHref(),
					'text' => elgg_view_icon('arrow-left') . elgg_echo('tgstheme:label:viewprofile'),
					'priority' => 100,
				));
				$view_profile_item->setParent($item);

				// Create new edit profile item
				$edit_profile_item = ElggMenuItem::factory(array(
					'name' => 'edit_profile',
					'href' => elgg_normalize_url("profile/{$user->username}/edit"),
					'text' => elgg_view_icon('settings-alt') . elgg_echo('profile:edit'),
					'priority' => 200,
				));

				$edit_profile_item->setParent($item);

				// Create new edit profile item
				$edit_avatar_item = ElggMenuItem::factory(array(
					'name' => 'edit_avatar',
					'href' => elgg_normalize_url("avatar/edit/{$user->username}"),
					'text' => elgg_view_icon('settings-alt') . elgg_echo('avatar:edit'),
					'priority' => 300,
				));

				$edit_avatar_item->setParent($item);
				
				// Add site notifications to profile dropdown
				if (elgg_is_active_plugin('site_notifications')) {
					$notification_item = elgg_get_menu_item('topbar', 'site_notifications');
					if ($notification_item) {
						$notification_item->setParentName('profile');
						$notification_item->setPriority(102);
					}
				}

				// Add all child elements
				$item->addChild($logout_item);
				$item->addChild($settings_item);
				$item->addChild($view_profile_item);
				$item->addChild($edit_profile_item);
				$item->addChild($edit_avatar_item);

				// If there's an admin item, add it to the user dropdown
				if ($administration_item) {
					// Set parent
					$administration_item->setParent($item);
					$item->addChild($administration_item);
				}

				break;
			case 'messages':
				/* Add 'messages' text to messages icon */
				$text = $item->getText();
				$item->setText($text . "&nbsp;" . elgg_echo('messages'));
				break;
			case 'todo':
				/* Add dropdown class to todo menu */
				$item->addLinkClass('elgg-topbar-dropdown');
				break;
			case 'groups_topbar_hover_menu':
				/* Add dropdown class to groups menu */
				$item->addLinkClass('elgg-topbar-dropdown');
				break;
		}
	}

	// Add search item
	$search_item = ElggMenuItem::factory(array(
		'name' => 'search',
		'href' => false,
		'text' => elgg_view('search/search_box', array('class' => 'tgstheme-search-topbar')),
		'priority' => 100,
	));

	// Add login item to nav bar
	if (!elgg_is_logged_in()) {
		$login_item = ElggMenuItem::factory(array(
			'name' => 'login',
			'href' => false,
			'text' => elgg_view('core/account/login_dropdown'),
			'priority' => 200,
		));
		$login_item->setSection('alt');
		$items[] = $login_item;
	}

	$search_item->setSection('alt');

	$items[] = $search_item;

	// Add spot logo item
	$spot_logo_url = elgg_get_site_url() . "mod/tgstheme/_graphics/topbar_logo.png";
	$spot_logo_item = ElggMenuItem::factory(array(
		'name' => 'spot_logo',
		'href' => elgg_get_site_url(),
		'text' => "<img src=\"$spot_logo_url\" alt=\"THINK Spot\" />",
		'priority' => 1,
		'link_class' => 'spot-topbar-logo',
	));

	$items[] = $spot_logo_item;

	// Add 'explore' items
	global $CONFIG;

	$site_menu = $CONFIG->menus['site'];

	// Use ElggMenuBuilder to sort menu alphabetically
	$builder = new ElggMenuBuilder($site_menu);
	$site_menu = $builder->getMenu('text');

	$more = elgg_echo('tgstheme:label:explore');
	$more_link = "<a href=\"#\" class='elgg-topbar-dropdown elgg-topbar-dropdown-split'>$more</a>";

	$more_item = ElggMenuItem::factory(array(
		'name' => 'explore',
		'href' => false,
		'text' => $more_link . elgg_view('navigation/menu/elements/section', array(
			'class' => 'elgg-menu elgg-menu-topbar-dropdown elgg-child-menu', 
			'items' => $site_menu['default'],
		)), 
		'priority' => 99999,
	));

	$more_item->setSection('default');

	$items[] = $more_item;

	return $items;
}



/**
 * Customize tidypics (photos/albums) entity menu items
 */ 
function tgstheme_tidypics_entity_menu_handler($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'object', 'image') || elgg_instanceof($params['entity'], 'object', 'album')) {
		$info_items = array('album-info');
		$action_items = array('tagging', 'set_cover', 'sort', 'move_to_album');
		foreach ($return as $idx => $item) {
			if ($item->getSection() == 'default') {
				// Set info items
				if (in_array($item->getName(), $info_items)) {
					$item->setSection('info');
				}

				// Set actions items
				if (in_array($item->getName(), $action_items)) {
					$item->setSection('actions');
				}
			}
		}
	}

	return $return;
}

/**
 * Customize podcasts entity menu items
 */ 
function tgstheme_podcasts_entity_menu_handler($hook, $type, $return, $params) {
	if (elgg_instanceof($params['entity'], 'object', 'podcast')) {
		foreach ($return as $idx => $item) {

			if ($item->getName() == 'podcast_link') {
				$item->setSection('info');
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
 * Modify widget menus for role widgets
 */
function tgstheme_widget_menu_setup($hook, $type, $return, $params) {
	if (get_input('custom_widget_controls')) {
		$widget = $params['entity'];

		if ($widget->handler == 'tgstheme_extra') {

			$popup_label = elgg_echo('tgstheme:label:whatisthis');
			$popup_info = elgg_echo(elgg_get_plugin_setting('module_description', 'tgstheme'));
			$popup_info = "<div id='info' class='home-popup' style='display: none;'>$popup_info</div>";


			$options = array(
				'name' => 'extra_tooltip',
				'text' => $popup_label . $popup_info,
				'title' => 'extra_tooltip',
				'href' => '#info',
				'rel' => 'popup',
				'link_class' => 'home-small'
			);

			$return[] = ElggMenuItem::factory($options);
		} else if ($widget->handler == 'tgstheme_groups') {
			$options = array(
				'name' => 'groups_view_all',
				'text' => elgg_echo('tgstheme:label:allmygroups'),
				'title' => 'groups_view_all',
				'href' => elgg_get_site_url() . 'groups/member/' . elgg_get_logged_in_user_entity()->username,
				'link_class' => 'home-small'
			);

			$return[] = ElggMenuItem::factory($options);
		}

		return $return;
	}

	return $return;
}

/**
 * Set up the social menu
 */
function tgstheme_social_menu_setup($hook, $type, $return, $params) {
	$options = array(
		'name' => 'facebook',
		'href' => 'https://www.facebook.com/THINKGlobalSchool',
		'text' => '<span class="sociocon-facebook"></span>',
		'item_class' => 'elgg-menu-social-menu-item',
		'title' => elgg_echo('tgstheme:label:followfacebook'),
		'target' => '_blank',
		'priority' => 100,
	);

	$return[] = ElggMenuItem::factory($options);

	$options = array(
		'name' => 'twitter',
		'href' => 'http://twitter.com/tgsthinkglobal',
		'text' => '<span class="sociocon-twitter"></span>',
		'item_class' => 'elgg-menu-social-menu-item',
		'title' => elgg_echo('tgstheme:label:followtwitter'),
		'target' => '_blank',
		'priority' => 200,
	);

	$return[] = ElggMenuItem::factory($options);

	$options = array(
		'name' => 'youtube',
		'href' => 'http://www.youtube.com/user/ThinkGlobalSchool',
		'text' => '<span class="sociocon-youtube"></span>',
		'item_class' => 'elgg-menu-social-menu-item',
		'title' => elgg_echo('tgstheme:label:followyoutube'),
		'target' => '_blank',
		'priority' => 300,
	);

	$return[] = ElggMenuItem::factory($options);

	$options = array(
		'name' => 'flickr',
		'href' => 'http://www.flickr.com/photos/thinkglobalschool/',
		'text' => '<span class="sociocon-flickr"></span>',
		'item_class' => 'elgg-menu-social-menu-item',
		'title' => elgg_echo('tgstheme:label:followflickr'),
		'target' => '_blank',
		'priority' => 400,
	);

	$return[] = ElggMenuItem::factory($options);

	$options = array(
		'name' => 'rss',
		'href' => 'http://thinkglobalschool.org/feed/',
		'text' => '<span class="sociocon-rss"></span>',
		'item_class' => 'elgg-menu-social-menu-item',
		'title' => elgg_echo('tgstheme:label:followblog'),
		'target' => '_blank',
		'priority' => 500,
	);

	$return[] = ElggMenuItem::factory($options);

	$options = array(
		'name' => 'instagram',
		'href' => 'http://instagram.com/thinkglobalschool',
		'text' => '<span class="sociocon-instagram"></span>',
		'item_class' => 'elgg-menu-social-menu-item',
		'title' => elgg_echo('tgstheme:label:followinstagram'),
		'target' => '_blank',
		'priority' => 600,
	);

	$return[] = ElggMenuItem::factory($options);

	$options = array(
		'name' => 'tagboard',
		'href' => 'https://tagboard.com/tgslife/search',
		'text' => '<span class="sociocon-tagboard"></span>',
		'item_class' => 'elgg-menu-social-menu-item',
		'title' => elgg_echo('tgstheme:label:followtagboard'),
		'target' => '_blank',
		'priority' => 700,
	);

	$return[] = ElggMenuItem::factory($options);

	return $return;
}

/**
 * Modify the elgg footer menu
 */
function tgstheme_footer_menu_setup($hook, $type, $return, $params) {
	// Remove 'powered by', we'll include this later
	foreach ($return as $idx => $item) {
		if ($item->getName() == 'powered') {
			unset($return[$idx]);
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

/**
 * Handler for iframe forwards
 */
function tgstheme_iframe_forward_handler($hook, $type, $value, $params) {
	// Check if the referer was an iframe
	$referer = preg_replace('/\?.*/', '', $_SERVER['HTTP_REFERER']);
	$forward_url = preg_replace('/\?.*/', '', $params['forward_url']);

	if (strpos($referer, 'iframe')) {
		// Don't mess around with photo forwards
		if (strpos($forward_url, 'photos')) {
			return $value;
		}

		if ($forward_url == $referer) {
			if (!strpos($forward_url, 'thewire')) {				
				return $params['forward_url'];
			} else {
				// Check for groups
				$group = get_entity(get_input('container_guid', FALSE));
				if (elgg_instanceof($group, 'group')) {
					$params['forward_url'] = $group->getURL();
				} else {
					$params['forward_url'] = elgg_normalize_url('home');
				}
			}
		}

		$forward_url = $params['forward_url'];

		return elgg_normalize_url("iframe/forward?forward_to={$forward_url}");
		
	}
	return $value;
}

/**
 * Handler for layout output
 */
function tgstheme_layout_output_handler($hook, $type, $value, $params) {
	if (get_input('conditional_sidebars_core_overrides')) {
		set_input('conditional_sidebars_core_overrides', false);
		switch (elgg_get_context()) {
			case 'pages':
				// This is so bloody gross..
				$location = str_replace(elgg_get_site_url() . 'pages', '', current_page_url());
				if (strpos($location, "/all") === 0) {
					$value['sidebar_alt'] = $value['sidebar'];
					$value['sidebar'] = null;
				} else if (strpos($location, "/owner") === 0) {
					$value['sidebar_alt'] = elgg_view('pages/sidebar');
					$value['sidebar'] = elgg_view('pages/sidebar/navigation');
				}
				break;
			// wtf pages..? lets push a widgets context globally..
			case 'widgets':
				$location = str_replace(elgg_get_site_url() . 'pages', '', current_page_url());
				if (strpos($location, "/revision") === 0) {
					$value['sidebar'] = null;
					$id = get_input('id');
					$annotation = elgg_get_annotation_from_id($id);
					if (!$annotation) {
						forward();
					}
					$page = get_entity($annotation->entity_guid);
					if (!$page) {
						forward();
					}
					$value['sidebar_alt'] = elgg_view('pages/sidebar/history', array('page' => $page));
				}
				break;
			case 'blog':
			case 'bookmarks':
			case 'file':
			case 'podcasts':
			case 'simplekaltura':
			case 'groups':
				$value['sidebar_alt'] = $value['sidebar'];
				$value['sidebar'] = null;
				break;
			default: 
				break;
		}
	}

	return $value;
}

/**
 * Handler for typeahead tags 'default' tags exceptions
 */
function tgstheme_tags_exceptions_handler($hook, $type, $value, $params) {
	$value[] = 'activity_tag_filter';
	return $value;
}

/**
 * Set up the profile content/groups filter menu
 */
function tgstheme_content_groups_profile_menu_setup($hook, $type, $return, $params) {
	$options = array(
		'name' => 'user_content',
		'text' => elgg_echo('tgstheme:label:usercontent'),
		'href' => '#user-content',
		'priority' => 1,
		'link_class' => 'profile-content-groups-menu-item',
		'selected' => TRUE,
	);
	$return[] = ElggMenuItem::factory($options);

	$options = array(
		'name' => 'user_groups',
		'text' => elgg_echo('tgstheme:label:usergroups'),
		'href' => '#user-groups',
		'priority' => 2,
		'link_class' => 'profile-content-groups-menu-item',
	);
	
	$return[] = ElggMenuItem::factory($options);
	
	return $return;
}

function tgstheme_picker_add_user($user_id) {
	$user = get_entity($user_id);
	if (!$user || !($user instanceof ElggUser)) {
		return false;
	}
	
	$icon = elgg_view_entity_icon($user, 'tiny', array('use_hover' => false));

	// this html must be synced with the userpicker.js library
	$code = '<li><div class="elgg-image-block">';
	$code .= "<div class='elgg-image'>$icon</div>";
	$code .= "<div class='elgg-image-alt'><a href='#' class='elgg-userpicker-remove'>X</a></div>";
	$code .= "<div class='elgg-body'>" . $user->name . "</div>";
	$code .= "</div>";
	$code .= "<input type=\"hidden\" name=\"members[]\" value=\"$user_id\">";
	$code .= '</li>';
	
	return $code;
}

/**
 * Register items for the html head
 *
 * @param string $hook Hook name ('head')
 * @param string $type Hook type ('page')
 * @param array  $data Array of items for head
 * @return array
 */
function tgstheme_setup_head($hook, $type, $data) {	
	$data['links'][] = array(
		'rel' => 'SHORTCUT ICON',
		'href' => elgg_normalize_url("mod/tgstheme/_graphics/favicon.ico"),
	);

	return $data;
}