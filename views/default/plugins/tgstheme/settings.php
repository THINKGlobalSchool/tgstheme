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

$analytics_label = elgg_echo('tgstheme:label:analytics_enable');

$analytics_input = elgg_view('input/dropdown', array(
	'name' => 'params[analytics_enable]', 
	'value' => $vars['entity']->analytics_enable, 
	'options_values' => array(
		0 => elgg_echo('No'), 
		1 => elgg_echo('Yes')
	))
);

$module_enable_label = elgg_echo('tgstheme:label:module_enable');
$module_enable_input = elgg_view('input/dropdown', array(
	'name' => 'params[module_enable]', 
	'value' => $vars['entity']->module_enable, 
	'options_values' => array(
		0 => elgg_echo('No'), 
		1 => elgg_echo('Yes')
	))
);

$module_title_label = elgg_echo('tgstheme:label:module_title');
$module_title_input = elgg_view('input/text', array(
	'name' => 'params[module_title]', 
	'value' => $vars['entity']->module_title)
);

$module_tag_label = elgg_echo('tgstheme:label:module_tag');
$module_tag_input = elgg_view('input/text', array(
	'name' => 'params[module_tag]', 
	'value' => $vars['entity']->module_tag)
);

$module_subtype_label = elgg_echo('tgstheme:label:module_subtype');
$module_subtype_input = elgg_view('input/text', array(
	'name' => 'params[module_subtype]', 
	'value' => $vars['entity']->module_subtype)
);

$module_description_label = elgg_echo('tgstheme:label:module_description');
$module_description_input = elgg_view('input/text', array(
	'name' => 'params[module_description]', 
	'value' => $vars['entity']->module_description)
);


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
	<div>
		<label>$analytics_label</label><br />
		$analytics_input
	</div>
	<div>
		<label>$module_enable_label</label><br />
		$module_enable_input
	</div>
	<div>
		<label>$module_title_label</label><br />
		$module_title_input
	</div>
	<div>
		<label>$module_tag_label</label><br />
		$module_tag_input
	</div>
	<div>
		<label>$module_subtype_label</label><br />
		$module_subtype_input
	</div>
	<div>
		<label>$module_description_label</label><br />
		$module_description_input
	</div>
HTML;

echo $content;