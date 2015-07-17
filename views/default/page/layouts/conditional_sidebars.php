<?php
/**
 * TGS Theme 2 Conditional sidebar wrapper view
 *
 * For compatibility with the build in elgg two_sidebar view, we'll have two sidebars:
 * - The main (LHS) sidebar, is called 'sidebar'
 * - The second aka alt (RHS) sidebar, is called 'sidebar_alt'
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 * @uses $vars['sidebar'] Optional content that is displayed in the sidebar
 * @uses $vars['sidebar_alt'] Optional content that is displayed in the alt sidebar
 */

$sidebar = elgg_view('page/elements/sidebar', $vars);
$sidebar_alt = elgg_view('page/elements/sidebar_alt', $vars);

// Temporary during transition
if ($sidebar == $sidebar_alt) {
	$sidebar = null;
}

// allow page handlers to override the default header
if (isset($vars['header'])) {
	$vars['header_override'] = $vars['header'];
}

// Check for main sidebar (LHS) content
if ($sidebar && $sidebar_alt) {
	echo elgg_view_layout('two_sidebar', $vars);
} else if ($sidebar && !$sidebar_alt) {
	echo elgg_view_layout('one_sidebar', $vars);
} else if (!$sidebar && $sidebar_alt) {
	$vars['sidebar'] = $sidebar_alt;
	echo elgg_view_layout('one_sidebar_alt', $vars);
} else {
	echo elgg_view_layout('one_column', $vars);
}