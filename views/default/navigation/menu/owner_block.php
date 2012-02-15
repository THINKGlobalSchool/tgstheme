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
	/*
	// New short menu items array
	$short_menu_items = array();

	// Count items in menu 
	$menu_count = count($vars['menu']['default']);
	
	// We're showing the top 3 items, so if we have less.. show less
	$count = $menu_count < 3 ? $menu_count : 3;

	// Grab the first 3 menu items, and remove from the main menu
	for ($i = 0; $i < $count; $i++) {
		if ($vars['selected_item'] && $vars['selected_item']->getName() == $vars['menu']['default'][$i]->getName()) {
			$selected_in_list = TRUE;
		}
		$short_menu_items[] = $vars['menu']['default'][$i];
		unset($vars['menu']['default'][$i]);
	}

	// If the selected item wasn't one of the first 3 items
	if ($vars['selected_item'] && !$selected_in_list) {
		// Add it to the short list
		$short_menu_items[] = $vars['selected_item'];

		// Remove it from the long list
		foreach($vars['menu']['default'] as $idx => $item) {
			if ($vars['selected_item'] && $item->getName() == $vars['selected_item']->getName()) {
				unset($vars['menu']['default'][$idx]);
			}
		}
	}

	// Create show more item as needed
	if ($menu_count > $count) {
		$options = array(
			'name' => 'more-ownerblock',
			'text' => elgg_echo('tgstheme:label:more'),
			'href' => '#',
			'class' => 'ownerblock-show-more',
			'priority' => 9000,
		);
		$short_menu_items[] = ElggMenuItem::factory($options);
	}

	// These are the remaining items
	$long_menu_items = $vars['menu']['default'];

	// Add a show less item
	$options = array(
		'name' => 'more-ownerblock',
		'text' => elgg_echo('tgstheme:label:less'),
		'href' => '#',
		'class' => 'ownerblock-show-less',
		'priority' => 9000,
	);
	$long_menu_items[] = ElggMenuItem::factory($options);

	// Set short menu, and grab content
	$vars['menu']['default'] = $short_menu_items;
	$short_menu = elgg_view("navigation/menu/default", $vars);

	// Set long menu, and grab content
	$vars['menu']['default'] = $long_menu_items;
	$long_menu = elgg_view("navigation/menu/default", $vars);

	$content = <<<HTML
		<div id='tgstheme-ownerblock-sidebar-menu' class='clearfix'>
			$short_menu
			<div id='tgstheme-ownerblock-sidebar-menu-full'>
				$long_menu
			</div>
		</div>
HTML;
	*/
	
	$menu = elgg_view("navigation/menu/default", $vars);
	
	$content = <<<HTML
		<div id='tgstheme-ownerblock-sidebar-menu' class='clearfix'>
			$menu
		</div>
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