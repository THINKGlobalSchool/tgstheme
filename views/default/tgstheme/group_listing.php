<?php
/**
 * TGS Theme Custom Group Listing
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */

$group = elgg_extract('group', $vars);

if (!elgg_instanceof($group, 'group')) {
	return;
}

$linked_title = elgg_view('output/url', array(
	'value' => $group->getURL(),
	'text' => $group->name
));

$briefdescription = $group->briefdescription;
$icon = elgg_view_entity_icon($group, 'small', array('href' => $group->getURL()));

$last_entity = elgg_get_entities(array(
	'type' => 'object',
	'container_guid' => $group->guid,
	'order_by' => 'e.time_updated DESC',
	'limit' => 1
));

if (!$last_entity[0]) {
	$time = $group->time_updated;
} else {
	$time = $last_entity[0]->time_updated;
}

$group_guid = $group->guid;

$updated_label = elgg_echo('tgstheme:label:updated');
$updated = elgg_view_friendly_time($time);
$activity_link = elgg_view('output/url', array(
	'text' => elgg_echo('tgstheme:label:latestactivity'),
	'href' => "#toggle-activity-{$group_guid}",
	'rel' => 'toggle',
));



elgg_push_context('widgets');
$db_prefix = elgg_get_config('dbprefix');
$activity = elgg_list_river(array(
	'limit' => 3,
	'pagination' => false,
	'joins' => array("JOIN {$db_prefix}entities e1 ON e1.guid = rv.object_guid"),
	'wheres' => array("(e1.container_guid = $group_guid)"),
));
elgg_pop_context();


$content = <<<HTML
	<div class='tgstheme-group-listing'>
		<div class="tgstheme-group-icon groups-profile-icon">
			$icon
		</div>
		<div class='tgstheme-group-info'>
			<h4>$linked_title</h4>
			<span class='elgg-subtext'>$briefdescription</span>
		</div>
		<div class='tgstheme-group-updated'>
			<span class='elgg-subtext'>$updated_label</span><br />
			<span class='time-updated'>$updated</span><br />
			<span class='elgg-subtext activity-link'>$activity_link</span>
		</div>
		<div style='clear: both;'></div>
		<div id='toggle-activity-$group_guid' style='display: none;'>$activity</div>
	</div>
HTML;

echo $content;