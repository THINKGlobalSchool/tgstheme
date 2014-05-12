<?php
/**
 * TGS Theme 2 Share by email form
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 * @uses $vars['address']
 */

$address = urldecode(elgg_extract('address', $vars));

$to_user_label = elgg_echo('tgstheme:label:tousers');
$to_address_label = elgg_echo('tgstheme:label:toaddress');
$from_label = elgg_echo('tgstheme:label:from');
$subject_label = elgg_echo('tgstheme:label:subject');
$body_label = elgg_echo('tgstheme:label:body');

$user = elgg_get_logged_in_user_entity();

// Simple tab interface for switching between users and text entry
elgg_register_menu_item('share-users-text-menu', array(
	'name' => 'share-users',
	'text' => elgg_echo('tgstheme:label:spotusers'),
	'href' => '#email-to-users',
	'priority' => 0,
	'item_class' => 'elgg-state-selected',
	'class' => 'share-email-menu-item',
));

elgg_register_menu_item('share-users-text-menu', array(
	'name' => 'share-text',
	'text' => elgg_echo('tgstheme:label:emails'),
	'href' => '#email-to-addresses',
	'priority' => 1,
	'class' => 'share-email-menu-item',
));

$menu = elgg_view_menu('share-users-text-menu', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz elgg-menu-filter elgg-menu-filter-default'
));

$to_address_input = elgg_view('input/text', array(
	'name' => 'to',
	'class' => 'tgstheme-share-email-text',
));

$to_user_input = elgg_view('input/userpicker');

$from_input = elgg_view('input/text', array(
	'name' => 'from',
	'value' => $user->email,
	'class' => 'tgstheme-share-email-from',
	'readonly' => 'READONLY',
));

$subject_input = elgg_view('input/text', array(
	'name' => 'subject',
	'class' => 'tgstheme-share-email-subject',
	'value' => elgg_echo('tgstheme:email:subject', array($user->name)),
));

$body_input = elgg_view('input/plaintext', array(
	'name' => 'body',
	'class' => 'tgstheme-share-email-body',
	'value' => elgg_echo('tgstheme:email:body', array($address)),
));

$submit_input = elgg_view('input/submit', array(
	'name' => 'submit',
	'id' => 'tgstheme-share-email-send',
	'value' => elgg_echo('send'),
));

$content = <<<HTML
	<div>
		$menu
	</div>
	<div class='email-to-container' id='email-to-users'>
		<label>$to_user_label</label>
		$to_user_input
	</div>
	<div class='email-to-container' id='email-to-addresses' style='display: none;'>
		<label>$to_address_label</label>
		$to_address_input
	</div>
	<div>
		<label>$from_label</label>
		$from_input
	</div>
	<div>
		<label>$subject_label</label>
		$subject_input
	</div>
	<div>
		<label>$body_label</label>
		$body_input
	</div>
	<div class='elgg-foot'>
		$submit_input
	</div>
HTML;

echo $content;