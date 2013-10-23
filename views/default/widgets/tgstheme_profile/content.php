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

// Load jquery-file-upload libs
elgg_load_js('jquery.ui.widget');
elgg_load_js('jquery-file-upload');
elgg_load_js('jquery.iframe-transport');

elgg_load_js('tidypics');
elgg_load_js('tidypics:upload');


echo elgg_view('tgstheme/modules/profile');