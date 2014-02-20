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

if (elgg_instanceof($entity, 'group')) {

	$menu = elgg_view("navigation/menu/default", $vars);

	$class = 'ownerblock-browse-content-closed';

	foreach ($vars['menu']['default'] as $item) {
		if ($item->getSelected()) {
			$selected = 'style="display:block"';
			$class = 'ownerblock-browse-content-open';
			break;
		}
	}

	// Create browse content link
	$browse_content = elgg_view('output/url', array(
		'text' => elgg_echo('tgstheme:label:browsecontent'),
		'href' => '#',
		'class' => $class
	));

	$content = <<<HTML
		<div id='tgstheme-collapsable-ownerblock' class='clearfix'>
			$browse_content
			<div id='tgstheme-collapsable-ownerblock-full' $selected>
				$menu
			</div>
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