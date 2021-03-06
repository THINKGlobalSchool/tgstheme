<?php
/**
 * TGS Theme 2
 * Custom Layout for home page with main content on the right and a wide sidebar on the left
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 * @uses $vars['content'] Content HTML for the main column
 * @uses $vars['sidebar'] Optional content that is displayed in the sidebar
 * @uses $vars['title']   Optional title for main content area
 * @uses $vars['class']   Additional class to apply to layout
 * @uses $vars['nav']     HTML of the page nav (override) (default: breadcrumbs)
 */

$class = 'elgg-layout elgg-layout-one-sidebar-home clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

?>

<div class="<?php echo $class; ?>">
	<div class="elgg-home-sidebar">
		<?php
			echo elgg_view('page/elements/right_sidebar', $vars);
		?>
	</div>

	<div class="elgg-main elgg-body elgg-home-right">
		<?php
			echo $nav;
			
			if (isset($vars['title'])) {
				echo elgg_view_title($vars['title']);
			}
			if (isset($vars['content'])) {
				echo $vars['content'];
			}
		?>
	</div>
</div>
