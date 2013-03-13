<?php
/**
 * TGS Theme 2 Groups Module
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 * This is the query to grab groups ordered by the last updated item
 * 
 * SELECT DISTINCT e.*, r.*, ec.time_updated
 *	FROM elgg_entities e  
 * 	JOIN elgg_entity_relationships r on r.guid_two = e.guid  
 * 	JOIN (
 * 		SELECT DISTINCT xyz.container_guid, xyz.time_updated
 * 		FROM elgg_entities xyz
 * 		ORDER BY xyz.time_updated DESC
 * 	) ec on ec.container_guid = e.guid
 * WHERE  (r.relationship = 'member' AND r.guid_one = '32') 
 * AND  ((e.type = 'group')) 
 * AND  (e.site_guid IN (1)) 
 * AND ( (1 = 1)  and e.enabled='yes') 
 * group by ec.container_guid
 * ORDER BY ec.time_updated DESC;
 */

$user = elgg_get_logged_in_user_entity();

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
	'limit' => $limit,
	'offset' => $offset,
);

// Need to throw in a new select as well
$params['selects'][] = 'ec.time_updated';

// This is the magic join that grabs the entities of a group ordered by time_updated
$params['joins'][] = "JOIN (
	SELECT DISTINCT xyz.container_guid, xyz.time_updated
	FROM {$db_prefix}entities xyz
	ORDER BY xyz.time_updated DESC
) ec on ec.container_guid = e.guid";


$params['count'] = TRUE;

$groups_count = elgg_get_entities_from_relationship($params);

$params['count'] = FALSE;

$groups = elgg_get_entities_from_relationship($params);

foreach($groups as $group) {
	$content .= elgg_view('tgstheme/group_listing', array('group' => $group));
}

if (!$content) {
	$content = "<h3 class='center'>" . elgg_echo('tgstheme:label:noresults') . "</h3>";
}

if ($groups_count > $limit || $groups_count == 0) {
	$content .= "<span class='groups-widget-viewall'>" . elgg_view('output/url', array(
		'text' => elgg_echo('tgstheme:label:allmygroups'),
		'value' => elgg_get_site_url() . 'groups/member/' . elgg_get_logged_in_user_entity()->username,
	)) . "</span>";
}

$options = array(
	'class' => 'tgstheme-module tgstheme-groups-module',
);

echo elgg_view_module('featured', elgg_echo('groups'), $content, $options);