<?php
/**
 * TGS Theme 2 JS Library
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
}

elgg.activityping.activityUpdateChecker = function(interval) {
	this.intervalID = null;
	this.interval = interval;
	this.url = '<?php echo elgg_get_site_url(); ?>activity_ping';
	this.seconds_passed = 0;

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
					//console.log(json_response);
					//console.log(data);
					$('#activity-updates').html(json_response.link).slideDown();

					var pageTitleSubstring;
					var stringStartPosition = document.title.indexOf("]");

					if (stringStartPosition == -1) { // we haven't already altered page title
						pageTitleSubstring = document.title;
					} else { // we previously prepended to page title, need to remove it first
						pageTitleSubstring = document.title.substring( (stringStartPosition+2) );
					}

					document.title = json_response.page_title + pageTitleSubstring;
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
}

elgg.register_hook_handler('init', 'system', elgg.activityping.init);
//</script>