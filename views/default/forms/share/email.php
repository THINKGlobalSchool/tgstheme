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

$to_label = elgg_echo('tgstheme:label:to');
$from_label = elgg_echo('tgstheme:label:from');
$subject_label = elgg_echo('tgstheme:label:subject');
$body_label = elgg_echo('tgstheme:label:body');

$user = elgg_get_logged_in_user_entity();

/*
$to_input = elgg_view('input/text', array(
	'name' => 'to',
	'class' => 'tgstheme-share-email-to',
));
*/

$to_input = elgg_view('input/userpicker', array(
	'name' => 'members[]'
));

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
		<label>$to_label</label>
		$to_input
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
	<script type='text/javascript'>
		elgg.userpicker.init();
	</script>
HTML;

echo $content;