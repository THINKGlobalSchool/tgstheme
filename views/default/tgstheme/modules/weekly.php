<?php
/**
 * TGS Theme 2 'Extra' Module
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

// Use modules' simpleicon view here
set_input('ajaxmodule_listing_type', 'simpleicon');

$options = array(
	'type' => 'object',
	'subtype' => 'tagdashboard',
	'limit' => 2,
	'full_view' => FALSE,
	'metadata_name' => 'tags',
	'metadata_value' => 'tgsweekly',
	'default_view' => 'media'
);

echo elgg_list_entities_from_metadata($options);
