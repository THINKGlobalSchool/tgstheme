<?php
/**
 * Layout for main column with one sidebar
 *
 * OVERRIDE:
 * - Added extras menu
 * - Conditional sidebar (will remove sidebar if empty)
 * 
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content HTML for the main column
 * @uses $vars['sidebar'] Optional content that is displayed in the sidebar
 * @uses $vars['title']   Optional title for main content area
 * @uses $vars['class']   Additional class to apply to layout
 * @uses $vars['nav']     HTML of the page nav (override) (default: breadcrumbs)
 */

$sidebar = elgg_view('page/elements/sidebar', $vars);

// Switch class if sidebar is empty
if ($sidebar) {
	$class = 'elgg-layout elgg-layout-one-sidebar clearfix';
} else {
	$class = 'elgg-layout elgg-layout-one-column clearfix';
}

if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

$extras = elgg_view_menu('extras', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

?>

<div class="<?php echo $class; ?>">
	<?php 
		if ($sidebar) {
	?>
	<div class="elgg-sidebar">
		<?php
			echo $sidebar;
		?>
	</div>
	<?php
		}
	?>
	<div class="elgg-main elgg-body">
		<?php
			echo $nav;
			echo $extras;
			
			if (isset($vars['title'])) {
				echo elgg_view_title($vars['title']);
			}
			// @todo deprecated so remove in Elgg 2.0
			if (isset($vars['area1'])) {
				echo $vars['area1'];
			}
			if (isset($vars['content'])) {
				echo $vars['content'];
			}
		?>
	</div>
</div>
