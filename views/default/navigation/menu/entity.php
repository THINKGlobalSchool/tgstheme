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

/* 
 We're going to make all new sections here:
 - default will be broken up into 'info' and 'actions' (and maybe 'other')
   we can add items to these two sections manually as needed
*/

$entity_menu = array();

// Core 'info' menu items (as decided by me)
$core_info_items = array(
	'access',
	'published_status', // Blogs
);

// Core 'action' items 
$core_action_items = array(
	'edit',
	'delete',
	'likes',
);

elgg_dump($vars['menu']);

// Move sections around
foreach ($vars['menu'] as $section => $menu_items) {
	// Move default items into new sections (these will be mostly core registered, ie: likes, edit, delete, etc..)
	foreach ($menu_items as $item) {
		if ($section == 'default') {
			if (in_array($item->getName(), $core_info_items)) {
		        $entity_menu['info'][] = $item;
			} else if (in_array($item->getName(), $core_action_items)) {
		        $entity_menu['actions'][] = $item;
			} else {
		        $entity_menu['other'][] = $item;
			}
		} else {
			$entity_menu[$item->getSection()][] = $item;
		}
	}
}

// Re-sort menus
//ksort($entity_menu['info']);
//ksort($entity_menu['actions']);
//ksort($entity_menu['other']);

$uid = uniqid();

// Add the actions button to the info menu
$options = array(
	'name' => 'entity-actions',
	'text' => elgg_view_icon('settings-menu'),
	'href' => '#' . $uid,
	'link_class' => 'toggle-actions',
	'priority' => 9000,
);

$entity_menu['info'][9000] = ElggMenuItem::factory($options);

// we want css classes to use dashes
$vars['name'] = preg_replace('/[^a-z0-9\-]/i', '-', $vars['name']);
$item_class = elgg_extract('item_class', $vars, '');

$class = "elgg-menu elgg-menu-{$vars['name']}";
if (isset($vars['class'])) {
	$class .= " {$vars['class']}";
}

// Info Menu
$info = elgg_view('navigation/menu/elements/section', array(
	'items' => $entity_menu['info'],
	'class' => "$class elgg-menu-{$vars['name']}-info",
	'section' => 'info',
	'name' => $vars['name'],
	'show_section_headers' => FALSE,
	'item_class' => $item_class,
));

// Actions menu
$actions = elgg_view('navigation/menu/elements/section', array(
	'items' => $entity_menu['actions'],
	'class' => "$class elgg-menu-{$vars['name']}-actions clearfix",
	'section' => 'actions',
	'name' => $vars['name'],
	'show_section_headers' => FALSE,
	'item_class' => $item_class,
));

// Other menu (not sure what I'm doing with this yet)
$other = elgg_view('navigation/menu/elements/section', array(
	'items' => $entity_menu['other'],
	'class' => "$class elgg-menu-{$vars['name']}-other clearfix",
	'section' => 'other',
	'name' => $vars['name'],
	'show_section_headers' => FALSE,
	'item_class' => $item_class,
));

$content = <<<HTML
	<div class='tgstheme-entity-menu'>	
		$info
		<div id='$uid' class='tgstheme-entity-menu-actions'>
			<!--
			<div align='right'>
			<div class="callout-up">
				<div class="callout-up2">
				</div>
			</div>
			</div>-->
			<div align='left' class='callout-container'>
			$actions
			$other
			<div class='clearfix'></div>
			</div>
		</div>
		$icon
	</div>	
HTML;

echo $content;