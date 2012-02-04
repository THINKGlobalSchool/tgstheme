<?php
/**
 * TGS Theme 2 Custom Entity Menu
 * - Wraps the 'default' view that is used by entities
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */

//  Make sure this is an entity (not a user/group)
if (!elgg_instanceof($vars['entity'], 'object')) {
	$type = $vars['entity']->getType();

	// Display the correct view by type
	if (elgg_view_exists("navigation/menu/$type")) {
		echo elgg_view("navigation/menu/$type", $vars);
	} else {
		echo elgg_view("navigation/menu/default", $vars);
	}
	return;
}

$entity_menu = $vars['menu'];

// Count actions and other menu items
$count = (int)(count($entity_menu['actions']) + count($entity_menu['other']));

// Add the actions button to the info menu if we have actions/other
if ($count > 0) {
	$options = array(
		'name' => 'entity-actions',
		'text' => "<span class='actions-text'>" . elgg_echo('tgstheme:label:actions') . "</span><span class='actions-caret'>▾</span>",
		'href' => '#entity-actions-' . $vars['entity']->guid,
		'class' => 'entity-action-toggler elgg-button elgg-button-action',
		'rel' => 'popup',
		'priority' => 9000,
	);

	$entity_menu['info'][9000] = ElggMenuItem::factory($options);
}

// we want css classes to use dashes
$vars['name'] = preg_replace('/[^a-z0-9\-]/i', '-', $vars['name']);
$item_class = elgg_extract('item_class', $vars, '');

$class = "elgg-menu elgg-menu-{$vars['name']}";
if (isset($vars['class'])) {
	$class .= " {$vars['class']}";
}

// Info Menu
if ($entity_menu['info']) {
	$info = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['info'],
		'class' => "$class elgg-menu-{$vars['name']}-info",
		'section' => 'info',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

// Actions menu
if ($entity_menu['actions']) {
	$actions = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['actions'],
		'class' => "$class elgg-menu-{$vars['name']}-actions clearfix",
		'section' => 'actions',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

// Other menu (Catch all)
if ($entity_menu['other']) {
	$other = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['other'],
		'class' => "$class elgg-menu-{$vars['name']}-other clearfix",
		'section' => 'other',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

// Hidden menu, for hidden items
if ($entity_menu['hidden']) {
	$hidden = elgg_view('navigation/menu/elements/section', array(
		'items' => $entity_menu['hidden'],
		'class' => "$class elgg-menu-{$vars['name']}-hidden clearfix",
		'section' => 'hidden',
		'name' => $vars['name'],
		'show_section_headers' => FALSE,
		'item_class' => $item_class,
	));
}

$content = <<<HTML
	<div class='tgstheme-entity-menu'>	
		$info
		<div id='entity-actions-{$vars['entity']->guid}' class='tgstheme-entity-menu-actions'>
			$actions
			$other
			$hidden
			<b class='border-notch notch'></b>
			<b class='notch'></b>
		</div>
		$icon
	</div>	
HTML;

echo $content;