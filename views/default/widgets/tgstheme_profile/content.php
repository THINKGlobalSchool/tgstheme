<?php
/**
 * TGS Theme 2 Profile Widget
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

/** Tidypics Required Libs **/
// @TODO AMD loading?
if (elgg_is_active_plugin('tidypics')) {
	elgg_load_js('tidypics');
	elgg_load_js('tidypics:upload');
}

echo elgg_view('tgstheme/modules/profile');