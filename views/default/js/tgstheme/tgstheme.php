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

	// Init publish module
	elgg.tgstheme.initPublish();
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

/**
 * Extra tasks after filtrate content is loaded
 */
elgg.tgstheme.filtrateLoaded = function(hook, type, params, options) {
	if (elgg.ui != undefined && elgg.ui.lightbox_init != undefined) {
		elgg.ui.lightbox_init();
	}
}

elgg.register_hook_handler('init', 'system', elgg.tgstheme.init);
elgg.register_hook_handler('getOptions', 'ui.popup', elgg.tgstheme.loginHandler);
elgg.register_hook_handler('getOptions', 'chosen.js', elgg.tgstheme.setupActivityInputs);
elgg.register_hook_handler('content_loaded', 'filtrate', elgg.tgstheme.filtrateLoaded);
elgg.register_hook_handler('infinite_loaded', 'filtrate', elgg.tgstheme.filtrateLoaded);