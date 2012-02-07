<?php
/**
 * TGS Theme 2 Custom Owner Block
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */

$entity = elgg_extract('entity', $vars);

if (!elgg_in_context('profile') && (elgg_instanceof($entity, 'group') || elgg_instanceof($entity, 'user'))) {
	$default_menu = elgg_view("navigation/menu/default", $vars);
	$content = <<<HTML
		<div id='tgstheme-ownerblock-sidebar-menu' class='clearfix'>
			$default_menu
		</div>
		<script type='text/javascript'>
			// Simple jQuery multicolumn
			$("#tgstheme-ownerblock-sidebar-menu ul")
				.attr('id', 'list1')
				.removeClass('profile-content-menu')
				.after(
					$("#tgstheme-ownerblock-sidebar-menu ul")
						.clone()
						.attr("id","list2")
				);
			$("#tgstheme-ownerblock-sidebar-menu ul#list1 li:odd").remove();
			$("#tgstheme-ownerblock-sidebar-menu ul#list2 li:even").remove();
		</script>
HTML;
	echo $content;

} else {
	$type = $entity->getType();

	// Display the correct view by type
	if (elgg_view_exists("navigation/menu/$type")) {
		echo elgg_view("navigation/menu/$type", $vars);
	} else {
		echo elgg_view("navigation/menu/default", $vars);
	}
}