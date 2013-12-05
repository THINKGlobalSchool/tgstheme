<?php
/**
 * Filtrate menu
 * 
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 * @uses $vars['menu']        Array of menu items
 * @uses $vars['item_class']  Additional CSS class for each menu item
 */

$content = "<div id='filtrate-menu-container'>";

$item_class = elgg_extract('item_class', $vars, '');

// Main section
$content .= elgg_view('navigation/menu/elements/filtrate_section', array(
	'items' => $vars['menu']['main'],
	'class' => "filtrate-menu-main",
	'section' => 'main',
	'name' => 'dashboard',
	'item_class' => $item_class
));

// Advanced section (only display if there are registered items)
if (count($vars['menu']['advanced'])) {
	$content .= elgg_view('navigation/menu/elements/filtrate_section', array(
		'items' => $vars['menu']['advanced'],
		'class' => "filtrate-menu-advanced",
		'section' => 'advanced',
		'name' => 'dashboard',
		'item_class' => $item_class
	));

	// Show advanced link
	$options = array(
		'name' => 'advanced',
		'href' => '#',
		'text' => elgg_echo('todo:label:showadvanced'),
		'link_class' => 'menu-sort filtrate-show-advanced advanced-off',
		'encode_text' => false,
		'section' => 'extras',
		'priority' => 0,
	);

	$vars['menu']['extras'][] = ElggMenuItem::factory($options);
}


// Extras section
$content .= elgg_view('navigation/menu/elements/filtrate_section', array(
	'items' => $vars['menu']['extras'],
	'class' => "filtrate-menu-extras",
	'section' => 'extras',
	'name' => 'dashboard',
	'item_class' => $item_class
));

echo $content . "</div>";

$script = <<<JAVASCRIPT
	<script type='text/javascript'>
		$(document).ready(function(event) {
			// Register filtrate init on system init
			elgg.register_hook_handler('init', 'system', elgg.filtrate.init);
		});
	</script>
JAVASCRIPT;

echo $script;