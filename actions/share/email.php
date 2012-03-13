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
$from = get_input('from', FALSE);
$subject = get_input('subject', FALSE);
$body = get_input('body', FALSE);

if (empty($to) || empty($from) || empty($subject) || empty($body)) {
	register_error(elgg_echo('tgstheme:error:requiredfields'));
	forward(REFERER);
}

// Could be multiple email addresses
$emails = explode(',', $to);
if (is_array($emails)) {
	$success = TRUE;
	foreach ($emails as $email) {
		$trimmed_email = trim($email);
		
		// Validate each one
		if (!is_email_address($trimmed_email)) {
			register_error(elgg_echo('tgstheme:error:invalidemail', array($trimmed_email)));
			forward(REFERER);
		}
		
		// Send!
		$success &= elgg_send_email($from, $trimmed_email, $subject, $body);
	}
	if ($success) {
		system_message(elgg_echo('tgstheme:success:emailshare'));
		forward(REFERER);
	}
}

register_error(elgg_echo('tgstheme:error:emailerror'));
forward(REFERER);