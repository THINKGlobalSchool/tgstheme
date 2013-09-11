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

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

$extras = elgg_view_menu('extras', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

?>
<div class="<?php echo $class; ?>">
	<div class="elgg-body elgg-main">
	<?php
		echo $nav;
		echo $extras;

		if ($vars['title']) {
			echo elgg_view_title($vars['title'], array('class' => 'elgg-heading-main'));
		}

		echo $vars['content'];
		
		// @deprecated 1.8
		if (isset($vars['area1'])) {
			echo $vars['area1'];
		}
	?>
	</div>
</div>