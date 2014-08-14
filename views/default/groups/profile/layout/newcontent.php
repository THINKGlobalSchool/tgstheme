<?php
/**
 * TGS Theme 2 Groups new content widget
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 */

// Show new content for group owners only
if (elgg_get_page_owner_entity()->canEdit()) {
	$widget_content = elgg_view('widgets/tgstheme_newcontent/content');

	// Show groups module
	$options = array(
		'class' => 'tgstheme-group-profile-top-widget',
	);

	$module = elgg_view_module('widget', elgg_echo('tgstheme:label:postnew'), $widget_content, $options);

	echo $module;
}