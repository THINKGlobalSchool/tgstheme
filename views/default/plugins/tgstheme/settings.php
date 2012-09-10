<?php
/**
 * TGS Theme 2 Help Link Administration
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 */

$help_link_label = elgg_echo('tgstheme:label:helplink');

$help_link_input = elgg_view('input/text', array(
	'name' => 'params[help_label]', 
	'value' => $vars['entity']->help_label)
);

$groups_label = elgg_echo('tgstheme:label:helpgroup');

$groups = elgg_get_entities(array(
	'types' => 'group', 
	'limit' => 0
));
		
if (elgg_is_active_plugin('shared_access')) {
	$channels = elgg_get_entities(array('types' => 'object',
		'subtypes' => 'shared_access',
		'limit' => 0
 	));
	$groups = array_merge($groups, $channels);
}

$dropdown = array();
$dropdown[0] = 'Select..';

foreach ($groups as $group) {
	$dropdown[$group->getGUID()] = "Group: " . $group->name;
}

$groups_input = elgg_view('input/dropdown', array(
	'id' => 'group_picker',
	'name' => 'params[help_group]',
	'options_values' => $dropdown,
	'value' => $vars['entity']->help_group,
));

$content = <<<HTML
	<br />
	<div>
		<label>$help_link_label</label><br />
		$help_link_input
	</div>
	<div>
		<label>$groups_label</label><br />
		$groups_input
	</div>
HTML;

echo $content;