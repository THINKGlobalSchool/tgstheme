<?php
/**
 * Elgg one-column layout
 *
 * OVERRIDE:
 * - Added extras menu
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content string
 * @uses $vars['class']   Additional class to apply to layout
 */

$class = 'elgg-layout elgg-layout-one-column clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

?>
<div class="<?php echo $class; ?>">
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
</div>