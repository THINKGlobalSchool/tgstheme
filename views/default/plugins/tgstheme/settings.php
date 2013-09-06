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

$help_groups_label = elgg_echo('tgstheme:label:helpgroup');

$groups = elgg_get_entities(array(
	'types' => 'group', 
	'limit' => 0
));
		
$dropdown = array();
$dropdown[0] = 'Select..';

foreach ($groups as $group) {
	$dropdown[$group->getGUID()] = "Group: " . $group->name;
}

$help_groups_input = elgg_view('input/dropdown', array(
	'id' => 'group_picker',
	'name' => 'params[help_group]',
	'options_values' => $dropdown,
	'value' => $vars['entity']->help_group,
));

$library_link_label = elgg_echo('tgstheme:label:librarylink');

$library_link_input = elgg_view('input/text', array(
	'name' => 'params[library_label]', 
	'value' => $vars['entity']->library_label)
);

$library_groups_label = elgg_echo('tgstheme:label:librarygroup');

$library_groups_input = elgg_view('input/dropdown', array(
	'id' => 'group_picker',
	'name' => 'params[library_group]',
	'options_values' => $dropdown,
	'value' => $vars['entity']->library_group,
));

$wexplore_link_label = elgg_echo('tgstheme:label:wexplorelink');

$wexplore_link_input = elgg_view('input/text', array(
	'name' => 'params[wexplore_label]', 
	'value' => $vars['entity']->wexplore_label)
);

$wexplore_groups_label = elgg_echo('tgstheme:label:wexploregroup');

$wexplore_groups_input = elgg_view('input/dropdown', array(
	'id' => 'group_picker',
	'name' => 'params[wexplore_group]',
	'options_values' => $dropdown,
	'value' => $vars['entity']->wexplore_group,
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
		<label>$help_groups_label</label><br />
		$help_groups_input
	</div>
	<div>
		<label>$library_link_label</label><br />
		$library_link_input
	</div>
	<div>
		<label>$library_groups_label</label><br />
		$library_groups_input
	</div>
	<div>
		<label>$wexplore_link_label</label><br />
		$wexplore_link_input
	</div>
	<div>
		<label>$wexplore_groups_label</label><br />
		$wexplore_groups_input
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