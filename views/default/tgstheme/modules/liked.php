<?php
/**
 * TGS Theme 2 Liked Module Content
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 */

// Use modules' simpleicon view here
set_input('ajaxmodule_listing_type', 'simpleicon');

$user_guid = elgg_extract('guid', $vars);

$subtype_id = get_subtype_id('object', 'tidypics_batch');

$options = array(
	'type' => 'object',
	'annotation_name' => 'likes',
	'annotation_owner_guid' => $user_guid,
	'limit' => 15,
	'full_view' => FALSE,
	'wheres' => array(
		"e.subtype != $subtype_id"
	)
);

echo elgg_list_entities_from_annotations($options);