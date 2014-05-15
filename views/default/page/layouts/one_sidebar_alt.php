<?php
/**
 * Layout for main column with one alt sidebar
 * - Almost identical to the one_sidebar layout, except the bar is in the 'alt'
 * position
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

$class = 'elgg-layout elgg-layout-one-sidebar-alt clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

?>

<div class="<?php echo $class; ?>">
	<div class="elgg-sidebar-alt">
		<?php
			echo elgg_view('page/elements/sidebar', $vars);
		?>
	</div>

	<div class="elgg-main elgg-body">
		<?php		
			echo elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));
			echo elgg_view_menu('extras', array(
				'sort_by' => 'priority',
				'class' => 'elgg-menu-hz',
			));

			echo elgg_view('page/layouts/elements/header', $vars);

			// @todo deprecated so remove in Elgg 2.0
			if (isset($vars['area1'])) {
				echo $vars['area1'];
			}
			if (isset($vars['content'])) {
				echo $vars['content'];
			}

			echo elgg_view('page/layouts/elements/footer', $vars);
		?>
	</div>
</div>