<?php
/**
 * TGS Theme 2 Share by email view
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */

$address = get_input('address');

$title = elgg_echo('tgstheme:title:emailshare');

$body = elgg_view_form('share/email', array('class' => 'elgg-form-alt', 'id' => 'tgstheme-share-email-form'), array('address' => $address));

$module = elgg_view_module('info', $title, $body, array('class' => 'tgstheme-share-email-module'));

echo $module;

