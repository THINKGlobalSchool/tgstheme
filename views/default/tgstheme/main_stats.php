<?php
/**
 * TGS Theme 2 Main Stats
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 */

// Need to ignore access
$ia = elgg_get_ignore_access();
elgg_set_ignore_access(true);

$blog_label = elgg_echo('publicdashboard:stats:blog');
$blog_count = elgg_get_entities(array('type' => 'object', 'subtype' => 'blog', 'count' => true));

$photo_label = elgg_echo('publicdashboard:stats:photo');
$photo_count = elgg_get_entities(array('type' => 'object', 'subtype' => 'image', 'count' => true));

$videos_label = elgg_echo('publicdashboard:stats:spotvideos');
$videos_count = elgg_get_entities(array('type' => 'object', 'subtype' => 'simplekaltura_video', 'count' => true));

$bookmark_label = elgg_echo('publicdashboard:stats:bookmark');
$bookmark_count = elgg_get_entities(array('type' => 'object', 'subtype' => 'bookmarks', 'count' => true));

$rubric_label = elgg_echo('publicdashboard:stats:rubric');
$rubric_count = elgg_get_entities(array('type' => 'object', 'subtype' => 'rubric', 'count' => true));

$group_label = elgg_echo('publicdashboard:stats:group');
$group_count = elgg_get_entities(array('type' => 'group', 'count' => true));

// This actually counts submissions instead of todos
$todo_label = elgg_echo('publicdashboard:stats:todo');
$todo_count = elgg_get_entities(array('type' => 'object', 'subtype' => 'todosubmission', 'count' => true)); 

elgg_set_ignore_access($ia);

$content = <<<HTML
	<table class='elgg-table' id='stats-table'>
		<tbody>
			<tr class='odd'>
				<td class='label'>$blog_label</td>
				<td class='stat'>$blog_count</td>
			</tr>
			<tr class='even'>
				<td class='label'>$photo_label</td>
				<td class='stat'>$photo_count</td>
			</tr>
			<tr class='odd'>
				<td class='label'>$videos_label</td>
				<td class='stat'>$videos_count</td>
			</tr>
			<tr class='even'>
				<td class='label'>$bookmark_label</td>
				<td class='stat'>$bookmark_count</td>
			</tr>
			<tr class='odd'>
				<td class='label'>$rubric_label</td>
				<td class='stat'>$rubric_count</td>
			</tr>
			<tr class='even'>
				<td class='label'>$group_label</td>
				<td class='stat'>$group_count</td>
			</tr>
			<tr class='odd'>
				<td class='label'>$todo_label</td>
				<td class='stat'>$todo_count</td>
			</tr>
		</tbody>
	</table>
HTML;

echo elgg_view_module('aside', elgg_echo('tgstheme:label:spotstats'), $content);
