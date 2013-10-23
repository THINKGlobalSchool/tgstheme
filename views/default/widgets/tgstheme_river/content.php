<?php
/**
 * TGS Theme 2 River Widget
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

echo elgg_view('output/url', array(
	'text' => elgg_echo('link:view:all'),
	'href' => elgg_get_site_url() . 'activity',
	'class' => 'home-small right'
));

echo elgg_view('modules/riverajaxmodule', array(
	'limit' => 10,
));