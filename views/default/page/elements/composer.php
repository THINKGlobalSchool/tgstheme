<?php
/**
 * @author Evan Winslow
 * @link https://github.com/ewinslow/elgg-facebook_theme
 */
?>
<div class="elgg-composer">
	<?php 
		echo elgg_view_menu('composer', array(
			'entity' => $vars['entity'],
			'class' => 'elgg-menu-hz',
			'sort_by' => 'priority',
		));
	?>
</div>
<script>
$('.elgg-composer').tabs({
	spinner: '',
	panelTemplate: '<div><div class="elgg-ajax-loader"></div></div>'
});
</script>