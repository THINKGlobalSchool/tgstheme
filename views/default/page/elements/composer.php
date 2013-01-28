<?php
/**
 * @author Evan Winslow
 * @link https://github.com/ewinslow/elgg-facebook_theme
 */
$entity = get_entity($vars['entity_guid']);
?>
<div class="elgg-composer">
	<?php 
		echo elgg_view_menu('composer', array(
			'entity' => $entity,
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