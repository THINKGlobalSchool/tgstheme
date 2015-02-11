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

			// Add wmode param to url
			url = elgg.tgstheme.addParameter(url, 'wmode', 'opaque', false);

			// Modify src attribute
			iframe.attr("src",url);

			// Append new iframe to parent
			parent.append(iframe);
		}
	});

	// Delegate profile content/groups menu items click handler
	$(document).delegate('.profile-content-groups-menu-item', 'click', elgg.tgstheme.profileContentGroupsClick);

	// Init publish module
	elgg.tgstheme.initPublish();
}

/** 
 *  Init profile module 'publish' links
 */
elgg.tgstheme.initPublish = function() {
	// Init publish links
	$(document).on('click', '.tgstheme-publish-item.clickable, .tgstheme-publish-more-menu li.clickable', function(event) {	
		// Get link source for iframe
		var src = elgg.get_site_url() + "iframe/" + $(this).data('type');

		// Build overlay
		var $overlay = $(document.createElement('div'));
		$overlay.addClass('elgg-ajax-loader');
		$overlay.attr('id', 'publish-overlay');

		// Build iframe
		var $iframe = $(document.createElement('iframe'));
		$iframe.attr({
			'id': 'publish-iframe',
			'src': src
		});
		$iframe.css({
			'visibility': 'hidden'
		});

		// Shared CSS for overlay/iframe
		var common_styles = {
			'position': 'fixed', 
			'top': '0',
			'left': '0', 
			'height': '100%',
			'width': '100%',
			'z-index': '16777270',
		}

		// Set CSS
		var $elements = $([$overlay[0], $iframe[0]]);
		$elements.css(common_styles);

		// Add to body
		$('body').append($elements);
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
 * Perform post load tasks for the publish iframe
 */
elgg.tgstheme.publishIframeReady = function() {
	// Modify overlay CSS and make the iframe visible
	window.parent.$('#publish-overlay').css({'z-index': '16777269'}).removeClass('elgg-ajax-loader');	
	window.parent.$('#publish-iframe').css({'visibility': 'visible'});

	// Create a 'cancel' button
	var $button = $(document.createElement('a'));
	$button.attr({
		'class': 'elgg-button elgg-button-delete'
	})
	.html(elgg.echo('cancel'))
	.on('click', elgg.tgstheme.closePublishIframe);

	// Append button to the form footer
	$('.elgg-foot').append($button);

	// Bind 'esc' keyup
	$(document).keyup(function(event) {
		// Make sure a lightbox isn't visible (prevent cancelling everything accidentally)
		if (event.keyCode == 27 && !$('#cboxContent').is(':visible')) {
			elgg.tgstheme.closePublishIframe(event);
		}
	});

	// Initial size check
	setTimeout(function() {
		var scrollHeight = $("#elgg-iframe-content")[0].scrollHeight;
		var height = $(window).height();
		if (scrollHeight > (height - 150)) {
			console.log('tweaking');
			$("#elgg-iframe-content").height(height - 250);
		}
	}, 1000);

	// Resize the content on window resize
	$(window).resize(function() {
		var scrollHeight = $("#elgg-iframe-content")[0].scrollHeight;
		var height = $(window).height();

		if (scrollHeight > (height - 150)) {
			$("#elgg-iframe-content").height(height - 250);
		} else {
			$("#elgg-iframe-content").height('auto');
		}

	});
}

/**
 *  Close the publish iframe
 */
elgg.tgstheme.closePublishIframe = function(event) {
	window.parent.$('#publish-overlay').remove();
	window.parent.$('#publish-iframe').remove();
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
		options.at = 'right+15px bottom+15px';
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
	element.chosen(options).change(elgg.trigger_hook('change', 'chosen.js', {'id' : element.attr('id'), 'element' : element}, function(){return;}));

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

/**
 * Add a parameter to a url
 */
elgg.tgstheme.addParameter = function(url, parameterName, parameterValue, atStart) { /*Add param before others*/
    replaceDuplicates = true;
    if(url.indexOf('#') > 0){
        var cl = url.indexOf('#');
        urlhash = url.substring(url.indexOf('#'),url.length);
    } else {
        urlhash = '';
        cl = url.length;
    }
    sourceUrl = url.substring(0,cl);

    var urlParts = sourceUrl.split("?");
    var newQueryString = "";

    if (urlParts.length > 1)
    {
        var parameters = urlParts[1].split("&");
        for (var i=0; (i < parameters.length); i++)
        {
            var parameterParts = parameters[i].split("=");
            if (!(replaceDuplicates && parameterParts[0] == parameterName))
            {
                if (newQueryString == "")
                    newQueryString = "?";
                else
                    newQueryString += "&";
                newQueryString += parameterParts[0] + "=" + (parameterParts[1]?parameterParts[1]:'');
            }
        }
    }
    if (newQueryString == "")
        newQueryString = "?";

    if(atStart){
        newQueryString = '?'+ parameterName + "=" + parameterValue + (newQueryString.length>1?'&'+newQueryString.substring(1):'');
    } else {
        if (newQueryString !== "" && newQueryString != '?')
            newQueryString += "&";
        newQueryString += parameterName + "=" + (parameterValue?parameterValue:'');
    }
    return urlParts[0] + newQueryString + urlhash;
};

// Register click handler for profile content/groups click event
elgg.tgstheme.profileContentGroupsClick = function(event) {
	$('.profile-content-groups-menu-item').parent().removeClass('elgg-state-selected');
	$(this).parent().addClass('elgg-state-selected');

	$('.profile-content-groups-filter-container').hide();
	
	$($(this).attr('href')).show();
	
	event.preventDefault();
}

elgg.register_hook_handler('init', 'system', elgg.tgstheme.init);