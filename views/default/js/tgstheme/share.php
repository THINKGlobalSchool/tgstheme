<?php
/**
 * TGS Theme 2 Share Library
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */
?>
//<script>
elgg.provide('elgg.share');

// Init function
elgg.share.init = function() {
	// Email send handler
	$(document).delegate('#tgstheme-share-email-send', 'click', elgg.share.emailSendClick);
}

// Email send handler
elgg.share.emailSendClick = function(event) {
	$(this).attr('disabled', 'DISABLED');
	var $_this = $(this);
	
	var $inputs = $("#tgstheme-share-email-form :input");

	var values = {};
	$inputs.each(function() {
		values[this.name] = $(this).val();
	});
	
	// Get 'members' from userpicker
	var members = [];
	$("#tgstheme-share-email-form input[name='members[]']").each(function() {
		members.push($(this).val());
	});
	
	// Get any text entered into the userpicker input
	var text_to = $("#tgstheme-share-email-form .elgg-input-user-picker").val();
	
	text_to = text_to ? text_to : 0;

	// Check for existing book by title
	elgg.action('share/email', {
		data: {
			//to: values['to'],
			to: members,
			text_to: text_to,
			from: values['from'],
			subject: values['subject'],
			body: values['body'],
		},
		success: function(data) {
			if (data.status != -1) {
				$.fancybox.close();
			} else {
				$_this.removeAttr('disabled');
			}
		}
	});

	event.preventDefault();
}

elgg.register_hook_handler('init', 'system', elgg.share.init);