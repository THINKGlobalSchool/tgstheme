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
elgg.provide('elgg.tgstheme');

// Init
elgg.tgstheme.init = function() {
	// Fix broken youtube embed
	$('iframe').each(function() {
		var url = $(this).attr("src");
		if (url.indexOf('youtube.com') >= 0) {
			// See: http://stackoverflow.com/questions/821359/reload-an-iframe-without-adding-to-the-history
			// Clone the iframe in question
			var iframe = $(this).clone();

			// Find it's parent
			var parent = $(this).parent();

			// Remove original
			$(this).remove();

			// Modify src attribute
			iframe.attr("src",url+"?wmode=opaque");

			// Append new iframe to parent
			parent.append(iframe);
		}
	});

	// Init publish module
	elgg.tgstheme.initPublish();

	// Manually init the role dropdown on the activity filter
	var role_filter = $('#activity-role-filter');
	role_filter.find('option[value=0]').html('');
	elgg.trigger_hook('init', 'chosen.js', {'id' : role_filter.attr('id')}, elgg.tgstheme.defaultChosenInit).call(undefined, role_filter);
}

elgg.tgstheme.initPublish = function() {
	// Init publish links
	$('.tgstheme-publish-item.clickable, .tgstheme-publish-more-menu li.clickable').each(function(){
		// Get iframe url	
		var href = elgg.get_site_url() + "iframe/" + $(this).data('type');
		$(this).fancybox({
			'href': href,
			'type': 'iframe',
			'scrolling': 'auto',
			'autoSize': true,
			'width': 760,
			'onComplete' : function(){
				$('#fancybox-content').addClass('elgg-ajax-loader');
				$('#fancybox-frame').load(function(){
					$('#fancybox-content').removeClass('elgg-ajax-loader');
				});
        	}
		});
	});

	// Init 'more' toggle
	$('.elgg-module-publish .publish-more').live('click', function() {
		if ($(this).hasClass('publish-more-closed')) {
			$(this).html('less');
			$(this).removeClass('publish-more-closed');
			$(this).addClass('publish-more-open');
		} else {
			$(this).html('more');
			$(this).removeClass('publish-more-open');
			$(this).addClass('publish-more-closed');
		}

		$('.tgstheme-publish-more-menu').slideToggle('fast');
	});

	// Hack links in the iframe, need them to target the parent window
	$('#elgg-iframe-body .ui-dialog-content a').live('click', elgg.tgstheme.parentLocation);
	$('#elgg-iframe-body .tidypics-lightbox').live('click', elgg.tgstheme.parentLocation);
}

/**
 * Helper function to redirect links to a parent window
 */
elgg.tgstheme.parentLocation = function(event) {
	if ($(this).attr('href').length) {
		window.parent.location = $(this).attr('href');
		return false;
	};
}

/**
 * Repositions the login popup
 *
 * @param {String} hook    'getOptions'
 * @param {String} type    'ui.popup'
 * @param {Object} params  An array of info about the target and source.
 * @param {Object} options Options to pass to
 *
 * @return {Object}
 */
elgg.tgstheme.loginHandler = function(hook, type, params, options) {
	if (params.target.attr('id') == 'login-dropdown-box') {
		options.my = 'right top';
		options.at = 'right bottom';
		options.offset = '15px';
		return options;
	}
	return options;
};

// Default init function for chosen dropdowns - plugins can completely override
elgg.tgstheme.defaultChosenInit = function(element) {
	var multi = element.attr('multiple');

	// Default options
	var options = {
		'placeholder_text_multiple': 'Select items..'
	};

	// Trigger a hook for options
	var options = elgg.trigger_hook('getOptions', 'chosen.js', {'id' : element.attr('id')}, options);

	// Init and bind change
	element.chosen(options).change(elgg.trigger_hook('change', 'chosen.js', {'id' : element.attr('id'), 'element' : element}, function(){}));

	// Hacky fix for chosen containers truncating text
	var sibling = element.siblings('.chosen-container-single');
	sibling.css({
		'min-width': sibling.width(),
		'width' : ''
	});

}

/**
 * Chosen setup handler for todo dashboard inputs
 */
elgg.tgstheme.setupActivityInputs = function (hook, type, params, options) {
	
	// Set up the activity type filter
	if (params.id == "activity-type-filter") {
		//options.placeholder_text_multiple = 'hisadasd';
	}

	// // Disable search for these inputs
	// var disable_search_ids = new Array(
	// );

	// // Disable search for above inputs
	// if ($.inArray(params.id, disable_search_ids) != -1) {
	// 	options.disable_search = true;
	// }

	// Allow deselect for these ids
	var allow_deselect_ids = new Array(
		'activity-group-filter',
		'activity-role-filter'
	);

	// Set deselect for dashboard inputs
	if ($.inArray(params.id, allow_deselect_ids) != -1) {
		options.width = "135px";
		options.allow_single_deselect = true;
	}

	return options;
}

elgg.register_hook_handler('init', 'system', elgg.tgstheme.init);
elgg.register_hook_handler('getOptions', 'ui.popup', elgg.tgstheme.loginHandler);
elgg.register_hook_handler('getOptions', 'chosen.js', elgg.tgstheme.setupActivityInputs);