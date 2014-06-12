<?php
/**
 * TGS Theme 2 Share Library
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 *
 */
?>
//<script>
elgg.provide('elgg.share');

// Init function
elgg.share.init = function() {
	// Email send handler
	$(document).on('click', '#tgstheme-share-email-send', elgg.share.emailSendClick);
	
	// Prevent form submit on enter
	$(document).on('keypress', '#tgstheme-share-email-form input', elgg.share.preventSubmit);

	// Share user/address menu click handler
	$(document).on('click', '.share-email-menu-item', elgg.share.shareMenuClick);
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

	// Check for existing book by title
	elgg.action('share/email', {
		data: {
			//to: values['to'],
			to_users: members,
			to_text: values['to'],
			from: values['from'],
			subject: values['subject'],
			body: values['body'],
		},
		success: function(data) {
			if (data.status != -1) {
				$.colorbox.close();
			} else {
				$_this.removeAttr('disabled');
			}
		}
	});

	event.preventDefault();
}

// Prevent submit helper
elgg.share.preventSubmit = function(event) {
	if (event.keyCode == 13) {
		return false;
	}
}

// Share user/address menu click handler
elgg.share.shareMenuClick = function(event) {
	$('.share-email-menu-item').parent().removeClass('elgg-state-selected');
	$(this).parent().addClass('elgg-state-selected');
	
	// Nuke inputs
	$('ul.elgg-user-picker-list li').each(function() {
		$(this).remove();
	})
	$('input[name="to"]').val('');
	
	$('.email-to-container').hide();
	$($(this).attr('href')).show();
	
	event.preventDefault();
}

elgg.register_hook_handler('init', 'system', elgg.share.init);