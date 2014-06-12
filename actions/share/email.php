<?php
/**
 * TGS Theme 2 Share Email Action
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 *
 */

$to_users = get_input('to_users', FALSE);
$to_text = get_input('to_text', FALSE);
$from = get_input('from', FALSE);
$subject = get_input('subject', FALSE);
$body = get_input('body', FALSE);

// Check empty (to: can be either members or text)
if ((empty($to_users) && empty($to_text)) || empty($from) || empty($subject) || empty($body)) {
	register_error(elgg_echo('tgstheme:error:requiredfields'));
	forward(REFERER);
}

$emails = array();

if ($to_text) {
	// Parse text entered emails
	$text_emails = explode(',', $to_text);

	// Validate text emails
	if (is_array($text_emails) && count($text_emails) >= 1) {
		foreach ($text_emails as $email) {
			$trimmed_email = trim($email);

			// Validate each one
			if (!is_email_address($trimmed_email)) {
				register_error(elgg_echo('tgstheme:error:invalidemail', array($trimmed_email)));
				forward(REFERER);
			} else {
				$emails[] = $trimmed_email;
			}
		}
	}
} else if ($to_users) {
	// Parse users supplied from userpicker
	$member_emails = array();
	foreach ($to_users as $guid) {
		$user = get_entity($guid);
		if (elgg_instanceof($user, 'user')) {
			$emails[] = $user->email;
		}
	}
	
}

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