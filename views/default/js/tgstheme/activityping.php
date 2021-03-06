<?php
/**
 * TGS Theme 2 Activity Ping JS Library
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
elgg.provide('elgg.activityping');

// Init function
elgg.activityping.init = function() {
	var updates = new elgg.activityping.activityUpdateChecker(10000);
	updates.start();

	// Reload activity 
	$(document).delegate('#activity-filtrate a.activity-update-link', 'click', function(event) {
		// If we've got filtrate, reload it!
		if (elgg.filtrate != undefined) {
			// Re-init here.. kind of gross :(
			$('#activity-filtrate').find('.filtrate-content-container').html('');
			$('#activity-filtrate').filtrate({
				defaultParams: $.param({'type': 0}),
				ajaxListUrl: elgg.get_site_url() + 'ajax/view/tgstheme/activity_list',
				enableInfinite: false,
				disableHistory: true,
				context: '$context'
			});

		} else {
			window.location.reload();
		}
		$(this).remove();
		// Reset the updater
		updates.seconds_passed = 0;
		updates.updateTitle('');
		event.preventDefault();
	});
}

elgg.activityping.activityUpdateChecker = function(interval) {
	this.intervalID = null;
	this.interval = interval;
	this.url = elgg.get_site_url() + 'activity_ping';
	this.seconds_passed = 0;
	var self = this;

	this.start = function() {
		// needed to complete closure scope.
		var self = this;

		this.intervalID = setInterval(function() { self.checkUpdates(); }, this.interval);
	}

	this.checkUpdates = function() {
		this.seconds_passed += this.interval / 1000;
		// more closure fun
		var self = this;
		$.ajax({
			'type': 'GET',
			'url': this.url,
			'data': {'seconds_passed': this.seconds_passed},
			'success': function(data) {
				if (data) {
					json_response = eval( "(" + data + ")" );

					elgg.trigger_hook('updates', 'activity', json_response);

					$('#activity-filtrate .filtrate-menu-main').find('a.activity-update-link').remove();

					$('#activity-filtrate .filtrate-menu-main').append(json_response.link).slideDown();

					self.updateTitle(json_response.page_title);
				}
			}
		})
	}

	this.stop = function() {
		clearInterval(this.interval);
	}

	this.changeInterval = function(interval) {
		this.stop();
		this.interval = interval;
		this.start();
	}

	this.updateTitle = function(title) {
		var pageTitleSubstring;
		var stringStartPosition = document.title.indexOf("]");

		if (stringStartPosition == -1) { // we haven't already altered page title
			pageTitleSubstring = document.title;
		} else { // we previously prepended to page title, need to remove it first
			pageTitleSubstring = document.title.substring( (stringStartPosition+2) );
		}

		document.title = title + pageTitleSubstring;
	}
}

elgg.register_hook_handler('init', 'system', elgg.activityping.init);