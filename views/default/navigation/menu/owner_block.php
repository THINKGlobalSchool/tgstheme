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

if (elgg_instanceof($entity, 'group') || elgg_instanceof($entity, 'user')) {
	// Create a dropdown for entity content
	$options = array(
		'name' => 'entity-ownerblock-content',
		'text' => elgg_echo('tgstheme:label:content', array($entity->name)),
		'href' => '#tgstheme-ownerblock-menu',
		'class' => 'entity-ownerblock-dropdown-button elgg-button elgg-button-dropdown',
		'rel' => 'popup',
		'priority' => 1,
	);

	
	$content_menu = "<ul class=''>" . elgg_view('navigation/menu/elements/item', array(
		'item' => ElggMenuItem::factory($options),
	)) . "</ul>";
	

	$default_menu = elgg_view("navigation/menu/default", $vars);
	
	$menu_module = elgg_view_module('info', '', '$default_menu', array(
		'id' => 'tgstheme-ownerblock-menu',
	));
	
	$content = <<<HTML
		$content_menu
		$msenu_module
		<div id='tgstheme-ownerblock-menu'>
			$default_menu
		</div>
		<script type='text/javascript'>
			$(document).ready(function() {
				// Simple jQuery multicolumn
				$("#tgstheme-ownerblock-menu ul").attr('id', 'list1').after($("#tgstheme-ownerblock-menu ul").clone().attr("id","list2"));
				$("#tgstheme-ownerblock-menu ul#list1 li:even").remove();
				$("#tgstheme-ownerblock-menu ul#list2 li:odd").remove();
			});
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