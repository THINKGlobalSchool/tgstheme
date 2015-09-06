<?php
/**
 * TGS Theme 2 Content/Groups Module
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.com/
 *
 * @uses $vars['guid'] User guid
 */

$guid = elgg_extract('guid', $vars);

$user = get_entity($guid);

// Get db prefix for custom joins
$db_prefix = elgg_get_config('dbprefix');

$limit = elgg_extract('limit', $vars, 10);
$offset = elgg_extract('offset', $vars, 0);

$params = array(
	'type' => 'group',
	'relationship' => 'member',
	'relationship_guid' => $user->guid,
	'inverse_relationship' => FALSE,
	'full_view' => FALSE,
	'group_by' => 'ec.container_guid',
	'order_by' => 'ec.time_updated DESC',
	'limit' => 2,
	'offset' => $offset,
	'base_url' => "ajax/view/tgstheme/modules/profile_groups?t=1&guid={$guid}"
);

// Need to throw in a new select as well
$params['selects'][] = 'ec.time_updated';

// This is the magic join that grabs the entities of a group ordered by time_updated
$params['joins'][] = "JOIN (
	SELECT DISTINCT xyz.container_guid, xyz.time_updated
	FROM {$db_prefix}entities xyz
	ORDER BY xyz.time_updated DESC
) ec on ec.container_guid = e.guid";

$groups_content = elgg_list_entities_from_relationship($params);

// No results content
$no_results = "<h3 class='center'>" . elgg_echo('tgstheme:label:noresults') . "</h3>"; 

if (!$groups_content) {
	$groups_content = $no_results;
}

echo $groups_content;