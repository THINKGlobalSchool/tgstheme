<?php
/**
 * Main content area layout
 * 
 * OVERRIDE
 *
 * @uses $vars['content']        HTML of main content area
 * @uses $vars['sidebar']        HTML of the sidebar
 * @uses $vars['header']         HTML of the content area header (override)
 * @uses $vars['nav']            HTML of the content area nav (override)
 * @uses $vars['footer']         HTML of the content area footer
 * @uses $vars['filter']         HTML of the content area filter (override)
 * @uses $vars['title']          Title text (override)
 * @uses $vars['context']        Page context (override)
 * @uses $vars['filter_context'] Filter context: everyone, friends, mine
 * @uses $vars['class']          Additional class to apply to layout
 */

// give plugins an opportunity to add to content sidebars
$sidebar_content = elgg_extract('sidebar', $vars, '');
$sidebar_alt_content = elgg_extract('sidebar_alt', $vars, '');

$params = $vars;
$params['content'] = $sidebar_content;
$sidebar = elgg_view('page/layouts/content/sidebar', $params);

$params['content'] = $sidebar_alt_content;
$sidebar_alt = elgg_view('page/layouts/content/sidebar', $params);

// allow page handlers to override the default header
if (isset($vars['header'])) {
	$vars['header_override'] = $vars['header'];
}
$header = elgg_view('page/layouts/content/header', $vars);

// allow page handlers to override the default filter
if (isset($vars['filter'])) {
	$vars['filter_override'] = $vars['filter'];
}
$filter = elgg_view('page/layouts/content/filter', $vars);

// the all important content
$content = elgg_extract('content', $vars, '');

// optional footer for main content area
$footer_content = elgg_extract('footer', $vars, '');
$params = $vars;
$params['content'] = $footer_content;
$footer = elgg_view('page/layouts/content/footer', $params);

$body = $header . $filter . $content . $footer;

$params = array(
	'content' => $body,
	'sidebar' => $sidebar,
	'sidebar_alt' => $sidebar_alt
);

if (isset($vars['class'])) {
	$params['class'] = $vars['class'];
}
set_input('conditional_sidebars_core_overrides', true);
echo elgg_view_layout('conditional_sidebars', $params);
