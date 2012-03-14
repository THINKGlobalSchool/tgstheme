<?php
/**
 * TGS Theme 2 Share Email Action
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */

$to = get_input('to', FALSE);
$text_to = get_input('text_to', FALSE);
$from = get_input('from', FALSE);
$subject = get_input('subject', FALSE);
$body = get_input('body', FALSE);

// Check empty (to: can be either members or text, need at least one)
if ((empty($to) && empty($text_to)) || empty($from) || empty($subject) || empty($body)) {
	register_error(elgg_echo('tgstheme:error:requiredfields'));
	forward(REFERER);
}

$text_emails = array();

if ($text_to) {
	// Parse text entered emails
	$text_emails = explode(',', $text_to);

	// Validate text emails
	if (is_array($text_emails) && count($text_emails) >= 1) {
		foreach ($text_emails as $idx => $email) {
			$trimmed_email = trim($email);

			// Validate each one
			if (!is_email_address($trimmed_email)) {
				register_error(elgg_echo('tgstheme:error:invalidemail', array($trimmed_email)));
				forward(REFERER);
			} else {
				$text_emails[$idx] = $trimmed_email;
			}
		}
	}
}

// Parse users supplied from userpicker
$member_emails = array();
foreach ($to as $guid) {
	$user = get_entity($guid);
	if (elgg_instanceof($user, 'user')) {
		$member_emails[] = $user->email;
	}
}

// Merge text/user emails
$emails = array_merge($text_emails, $member_emails);

// Try to send
if (is_array($emails) && count($emails) > 0) {
	$success = TRUE;
	foreach ($emails as $email) {		
		// Send!
		$success &= elgg_send_email($from, $email, $subject, $body);
	}
	if ($success) {
		system_message(elgg_echo('tgstheme:success:emailshare'));
		forward(REFERER);
	}
}

register_error(elgg_echo('tgstheme:error:emailerror'));
forward(REFERER);