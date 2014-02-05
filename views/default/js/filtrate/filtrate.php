<?php
/**
 * Filtrate JS Lib
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */
?>
//<script>
elgg.provide('elgg.filtrate');

// Define vars (need to be defined by menu views)
elgg.filtrate.ajaxListUrl;
elgg.filtrate.defaultParams;
elgg.filtrate.enableInfinite;
elgg.filtrate.disableHistory;
elgg.filtrate.lastURL;

/**
 * Chosen init handler
 */
elgg.filtrate.chosenInterrupt = function(hook, type, params, options) {
	// If element is in the hidden advanced dashboard menu, short circuit the chosen init
	// we'll need to init these later
	$element = $('#' + params.id);
	if ($element.closest('.filtrate-menu-advanced').length) {
		// Register the handler to init the inputs later
		elgg.register_hook_handler('late_init', 'chosen.js', elgg.filtrate.lateChosenInit);
		return function(){};
	}

	return options;
}

/**
 * Late chosen init handler
 */
elgg.filtrate.lateChosenInit = function(hook, type, params, options) {
	$('.filtrate-menu-advanced select').each(function(idx) {
		// Check if the element has chosen enabled on it yet
		if (!$(this).data('chosen_enabled')) {
			// If not, set the flag and chosen-ify
			$(this).data('chosen_enabled', true);

			// Use the default chosen init function, need it's magic
			elgg.tgstheme.defaultChosenInit($(this));
		}
	});
}

/**
 * Init dashboard filter/nav
 */
elgg.filtrate.init = function() {
	// If infinite scroll is enabled, init!
	if (elgg.filtrate.enableInfinite) {
		elgg.filtrate.initInifiniteScroll();
	}

	// Set up autocompletes
	$('#filtrate-menu-container input.elgg-input-autocomplete').each(function(idx) {

		// Nuke original
		$(this).autocomplete({source: []});

		// Re-init
		var source_url = elgg.get_site_url() + 'livesearch?match_on=' + $(this).data('match_on');
		$(this).autocomplete({
			source: source_url,
			minLength: 2,
			html: "html",
			select: function(event, ui) {
				var username = ui.item.value;

				$(this).val(username);

				// Disable elements
				elgg.filtrate.setEnabledState($(this), false);

				// Populate, push state
	
				elgg.filtrate.listHandler(true);
			},
		});
	});

	// Set up date picker inputs
	$('#filtrate-menu-container input.elgg-input-date').each(function(idx) {
		// Nuke original
		$(this).datepicker('destroy');

		// Set up from scratch
		$(this).datepicker({
			dateFormat: 'yy-mm-dd',
			onSelect: function(dateText) {
				// convert to unix timestamp
				var dateParts = dateText.split("-");
				var timestamp = Date.UTC(dateParts[0], dateParts[1] - 1, dateParts[2]);
				timestamp = timestamp / 1000;

				var id = $(this).attr('id');
				$(this).data('timestamp', timestamp);

				// Disable elements
				elgg.filtrate.setEnabledState($(this), false);

				// Populate, push state
	
				elgg.filtrate.listHandler(true);

				// Make sure change is triggered
				$(this).trigger('datepicker:change');
			}
		});
	});

	// Init clearable text inputs
	$('input.filtrate-clearable').live('change datepicker:change paste keyup', function(event) {
		var $span = $(this).next('span');

		if ($(this).val()) {
			$span.show();
		} else {
			$span.hide();
		}
		
	}).wrap('<span class="filtrate-clear-icon" />').after($('<span/>').click(function() {
		var $element = $(this).prev('input');

		$element.val('').focus();

		$element.next('span').hide();

		// Try to enable elements
		elgg.filtrate.setEnabledState($element, true);

		// Populate, push state
		elgg.filtrate.listHandler(true);
	}));

	// Init typeahead tags inputs
	$('.elgg-input-tags').parent().find('.as-values').attr('data-param', 'tag');

	// Handle advanced click
	$('.filtrate-show-advanced').live('click', function(event) {
		$(this).toggleClass('advanced-off').toggleClass('advanced-on');

		// Get nav container
		$(this).closest('#filtrate-menu-container').find('.filtrate-menu-advanced').toggle();

		elgg.trigger_hook('late_init', 'chosen.js');

		event.preventDefault();
	});

	// Handle sort order clicks
	$('.filtrate-sort').live('click', function(event) {
		$(this).toggleClass('descending').toggleClass('ascending');

		if ($(this).hasClass('descending')) {
			$(this).html(elgg.echo('filtrate:label:sortdesc'));
			$(this).val('ASC');
		} else if ($(this).hasClass('ascending')) {
			$(this).html(elgg.echo('filtrate:label:sortasc'));
			$(this).val('DESC');
		}

		// Use the list handler
		elgg.filtrate.listHandler(true);

		event.preventDefault();
	});

	// Init pagination
	$('#filtrate-content-container .elgg-pagination a').live('click', function(event) {
		// Get link params
		var link_params = deParam($(this).attr('href').slice($(this).attr('href').indexOf('?') + 1));

		// Set data attribute and value of offset
		$(this).attr('data-param', 'offset').data('param', 'offset');
		$(this).val(link_params['offset']);

		// Use the trusty list handler with this element
		elgg.filtrate.listHandler(true);

		event.preventDefault();
	});

	// If the content container is empty (first load, populate it from params)
	if ($('#filtrate-content-container').is(':empty')) {
		elgg.filtrate.listHandler(false);
	}

	// If we're allowing history
	if (!elgg.filtrate.disableHistory) {
		// Add popstate event listener
		window.addEventListener("popstate", function(event) {
			if (elgg.trigger_hook('popstate', 'filtrate', event)) {
				elgg.filtrate.listHandler(false);
			}
		});
	}
}

/**
 * Hook handler for chosen.js change event
 */
elgg.filtrate.handleChange = function(hook, type, params, handler) {
	// Check if we're dealing with a filtrate filter
	if (params.element.hasClass('filtrate-filter')) {	
		return function() {
			if (params.element.val() == 0) {
				// Try to enable elements
				elgg.filtrate.setEnabledState(params.element, true);
			} else {
				// Disable elements as required
				elgg.filtrate.setEnabledState(params.element, false);
			}
			// Use the filtrate list handler
			elgg.filtrate.listHandler(true);
		}
	} else {
		return handler;
	}
}

/**
 * Disable/enable elements in another elements disables list
 *
 * @param $element The element triggering the disable/enable
 * @param state    Enable/Disable (true/false)
 */
elgg.filtrate.setEnabledState = function($element, state) {
	// Enable
	if ($element.data('disables')) {
		if (state) {
			// Determine if we can enable elements
			var do_enable = true;

			// Get all disableable elements matching this elements disable list
			$('[data-disables="' + $element.attr('data-disables') + '"]').each(function(i) {
				// Check if element is empty or not
				if ($(this).val() && $(this).val() !== '0') {
					// Not empty, keep this element disabled!
					do_enable = false;
				}
			});

			// If we're clear to enable..
			if (do_enable) {
				// Re-enable the necessary elements
				$.each($element.data('disables'), function(idx,item) {
					if ($(item).is(':disabled')) {
						$(item).attr('disabled', false).trigger("chosen:updated");
					}
				});
			}


		} else { // Disable
			$.each($element.data('disables'), function(idx,item){
				if ($(item).is(':enabled')) {
					$(item).attr('disabled', true).trigger("chosen:updated");
				}
			});
		}
	}
}

/**
 * Perform extra tasks for elements populated by popstate
 */
elgg.filtrate.valuePopulatedHandler = function(hook, type, params, value) {
	var $element = params['element'];

	// Handle clearable elements
	if ($element.is('.filtrate-clearable')) {
		$element.next('span').show();
	}

	// Handler datepicker elements
	if ($element.is('.elgg-input-date')) {
		timestamp = $element.val();
		date = new Date(timestamp * 1000);
	
    	string = date.getUTCFullYear() + '-' + ('0' + (date.getUTCMonth()+1)).slice(-2) + '-' + ('0' + date.getUTCDate()).slice(-2);

    	$element.val(string);
    	$element.data('timestamp', timestamp);
	}

	// Handle sort order
	if ($element.is('a.filtrate-sort')) {
		if ($element.val() == 'ASC') {
			$element.addClass('descending').removeClass('ascending');
			$element.html(elgg.echo('filtrate:label:sortdesc'));
		} else if ($element.val() == 'DESC') {
			$element.addClass('ascending').removeClass('descending');
			$element.html(elgg.echo('filtrate:label:sortasc'));
		}
	}

	// If element is in the 'advanced' menu, make sure the menu is open
	if ($element.closest('.filtrate-menu-advanced').length && $element.val() != 0) {
		$('.filtrate-menu-advanced').show();
		$('.filtrate-show-advanced').toggleClass('advanced-off').toggleClass('advanced-on');
		elgg.filtrate.lateChosenInit();
	}
}

/**
 * Handle inputs that have an alternative value (ie date pickers)
 */
elgg.filtrate.valueAltHandler = function(hook, type, params, value) {
	// Handle elements with a timestamp (ie date pickers)
	if (params.element.is('.elgg-input-date') && params.element.data('timestamp')) {
		//return params.element.data('timestamp');
		return params.element.data('timestamp');
	}

	// Handle values for typeahead tags inputs
	if (params.element.is('[data-param="tag"]')) {
		// Get value
		var tags = params.element.parent().find('.as-values').val();
		
		// Trim whitespace and trailing/leading commas (for purdyness)
		tags = tags.replace(/(^\s*,)|(,\s*$)/g, '');

		return tags;
	}

	return value;
}

/**
 * Handle elements that get twisted by other jquery plugins (ie typeahead tags)
 */
elgg.filtrate.elementAltHandler = function(hook, type, params, value) {
	if (params.param == 'tag' && $('[data-param="tag"]').length) {
		// Clear the element value, will be reconstructed when adding tags back in below
		params.element.val('');
		
		// Get tags
		tags =  params.value.split(',');

		// Clear tag elements (items) first
		$('[data-param="tag"]').closest('.elgg-input-tags-parent').find('.as-selection-item:not(.typeaheadtags-help-button)').remove();

		// Add items back to typeahead tag input
		$.each(tags, function(idx, item) {
			// Don't trigger the added hook for these items
			$('[data-param="tag"]').data('ignoreAdded', true);
			elgg.typeaheadtags.addTag(item, $('[data-param="tag"]'));
		});
	}
}

/**
 * Handler element clearing for inputs twisted by other jquery plugins (typeahead tags)
 */
elgg.filtrate.elementAltClearHandler = function (hook, type, params, value) {
	if (params.element.is('[data-param="tag"]')) {
		params.element.closest('.elgg-input-tags-parent').find('.as-selection-item:not(.typeaheadtags-help-button)').remove();
	}

	// Make sure chosen inputs are cleared
	if (params.element.is('.filtrate-filter[multiple="MULTIPLE"]')) {
		params.element.val('').trigger('chosen:updated');
	}

	return value;
}

/**
 * Filtrate list handler, responsible for populating the dashboard with content
 * and pushing/popping state
 *
 * Usage:
 * 
 * Call this function with doPushState = true if you want to push a new state.
 * Pass false to respond to popState events
 *
 * Elements in the dashboard have a data-param attribute, the value of the element is 
 * used for the paramter
 * ie: param = context, context = value
 * 
 * Elements can also supply data-disables, any matching elements/inputs will be disabled
 * upon change/selection
 * 
 * @TODO: doPushState is a bit confusing in scenarios where we're not actually pushing state
 * ie: history is disabled, we're still updating content
 *
 * @param  bool doPushState  Wether or not to push a new state (pass false for popState)
 * @return void
 */
elgg.filtrate.listHandler = function (doPushState) {

	// Get querystring, if available
	var query_index = window.location.href.indexOf('?');

	if (query_index != -1) {
		var params = deParam(window.location.href.slice(query_index + 1));
		var base_url = window.location.href.slice(0, query_index);
	} else {
		// Use defaults
		var localParams = elgg.filtrate.getLocalParams();
		if (localParams && elgg.filtrate.disableHistory) {
			var params = localParams;
		} else {
			var params = deParam(elgg.filtrate.defaultParams);
		}
		var base_url = window.location.href;
	}

	// If we're not pushing state
	if (!doPushState) {
		var bound_params = new Array();

		// Loop over available params
		$.each(params, function(idx, val) {
			// Get elements matching this param
			var $element = $("[data-param='" + idx + "']");

			// Push updated element to bound params list
			bound_params.push(idx);
			
			// Set elements value
			$element.val(val);

			// Trigger hook here to perform additional tasks when setting an element value
			elgg.trigger_hook('element_alt', 'filtrate', {'param': idx, 'value': val, 'element': $element});

			// Trigger a hook for populated value
			elgg.trigger_hook('value_populated', 'filtrate', {'element' : $element});

			// Update chosen
			$element.trigger('chosen:updated');

			// Disable elements
			elgg.filtrate.setEnabledState($element, false);
		});

		// Check for unbound params
		$('[data-param]').each(function(idx) {

			var $_this = $(this);

			// If not bound above
			if ($.inArray($_this.data('param'), bound_params) == -1) {
				var hook_params = {
					'bound_params': bound_params,
					'element': $_this
				}

				if (elgg.trigger_hook('element_alt_clear', 'filtrate', hook_params, true)) {
					// Clear the value
					$_this.val('');
				}

				// Re-enable if element previously disabled an element
				elgg.filtrate.setEnabledState($_this, true);
			}
		}); 
	} else {
		// We're pushing state (or updating)
		$('[data-param]').each(function(idx) {
			// If this element has a value, and is enabled (or an anchor element)
			if ($(this).val() && ($(this).is(':enabled') || $(this).is('a'))) {
				// Trigger a hook here to see if the element has an alternate value
				var alt_params = {'element' : $(this)};
				var value = elgg.trigger_hook('value_alt', 'filtrate', alt_params, $(this).val());
				params[$(this).data('param')] = value;
			} else {
				// Clear it out
				delete params[$(this).data('param')];
			}
		});

		// If history isn't disabled
		if (!elgg.filtrate.disableHistory) {
			// Push that state
			var stateUrl = base_url + "?" + $.param(params)
			history.pushState({'url': stateUrl, 'type': 'filtrate_list_state'}, elgg.echo('filtrate:title:dashboard'), stateUrl);
		} else {
			// Set local params (if possible)
			elgg.filtrate.setLocalParams(params);
		}
	}

	// Include any hidden inputs (ie page owner)
	$('.filtrate-hidden-filter:enabled').each(function(idx) {
		params[$(this).attr('name')] = $(this).val();
	});

	// Show loader
	$('#filtrate-content-container').html("<div class='elgg-ajax-loader'></div>");

	// Load data
	elgg.get(elgg.filtrate.ajaxListUrl, {
		data: params,
		success: function(data) {
			// Load data
			$("#filtrate-content-container").html(data);

			// Trigger a hook indicating that content has been loaded
			elgg.trigger_hook('content_loaded', 'filtrate', {'data': data, 'container': $("#filtrate-content-container")});

			// If infinite scroll is enabled, hide the pagination
			if (elgg.filtrate.enableInfinite) {
				$('.elgg-pagination').hide();
			}
		},
		error: function() {
			// Show error on failure
			$("#filtrate-content-container").html(elgg.echo('filtrate:error:content'));
		}
	});

	elgg.filtrate.lastURL = window.location.href;
}

/**
 * Init Infinite Scroll
 */
elgg.filtrate.initInifiniteScroll = function() {
	var loadingStarted = false;

	// Set up infinite scroll
	$(window).scroll(function(){
		if  (($(window).scrollTop() + 100) >= ($(document).height() - 100) - $(window).height()){

			// Get the last pagination item on the page
			var $last_pagination = $('.elgg-pagination li').last();

			// Hard code the container for now.. (the first ul)
			var $container = $('#filtrate-content-container > ul:first-child');

			// Get classes
			var container_class = $container.attr('class');

			if ($last_pagination.length && !$last_pagination.hasClass('elgg-state-disabled')) {
			

				if (!loadingStarted) {
					loadingStarted = true;

					setTimeout(function() {
						var $loader = $(document.createElement('div')).addClass('elgg-ajax-loader').hide();
						$container.append($loader);
						$loader.fadeIn();

						loadingStarted  = false;

						// Load data
						elgg.get($last_pagination.find('a').attr('href'), {
							data: {},
							success: function(data) {
								$loader.fadeOut().remove();

								$data = $(data);

								//$items = $data.filter('ul[class*="' + $container.attr('class') + '"]').children('li').hide();

								$items = $data.filter(function() {
									var $_this = $(this);
									return container_class.indexOf($_this.attr('class')) >= 0;
								}).children('li').hide();

								$pagination = $data.filter('.elgg-pagination');
								
								$container.parent().find('.elgg-pagination').replaceWith($pagination);

								$container.append($items);

								$items.fadeIn();

								// Trigger a hook for further action after new items are loaded
								elgg.trigger_hook('infinite_loaded', 'filtrate', {'items': $items, 'container': $container});

								$('.elgg-pagination').hide();
							},
							error: function() {
								// Show error on failure
								elgg.register_error(elgg.echo('filtrate:error:content'));
								$loader.fadeOut().remove();
							}
						});
					}, 1000);

				}
			}
		}
	});
}

/**
 * Typeahead tags change handler
 */ 
elgg.filtrate.typeaheadChange = function(hook, type, params, value) {
	// Check if we're adding an item and intending to skip reloading content
	if (hook == "selection_added" && params.input.data('ignoreAdded')) {
		params.input.data('ignoreAdded', false);
		return;
	}

	if (hook == 'selection_removed') {
		// Clone the value element to parse out the tag
		var copy = $(value).clone();
		copy.find('a').remove();

		// Remove the tag from the input value
		var new_val = params.input.val().replace(copy.html(), '').replace(/(^\s*,)|(,\s*$)/g, '');
		params.input.val(new_val + ',');
	}

	// If we're setting a prefill value, don't push a state
	if (value.data('isprefill')) {
		elgg.filtrate.listHandler(false);
		value.data('isprefill', false);
	} else {
		elgg.filtrate.listHandler(true);
	}
}

/**
 * Check if html5 storage is supported
 */
elgg.filtrate.isLocalStorage = function() {
	try {
		return 'localStorage' in window && window['localStorage'] !== null;
	} catch (e) {
		return false;
	}
}

/** 
 * Helper function to grab local params
 */
elgg.filtrate.getLocalParams = function() {
	if (elgg.filtrate.isLocalStorage()) {
		var params = localStorage.getItem("filtrate_params");
		
		// Make sure we have a params array
		if (params) {
			params = deParam(params);

			var current_timestamp = new Date().getTime();

			// Check timestamp, we'll consider the stored params expired after 5 minutes
			if (current_timestamp > (parseFloat(params.timestamp) + (5 * 60000))) {
				return false;
			} else {
				return params;
			}
		} else {
			return false;
		}
	}
	return false;
}

/** 
 * Helper function set local params
 */
elgg.filtrate.setLocalParams = function(params) {
	if (elgg.filtrate.isLocalStorage()) {
		params.timestamp = new Date().getTime();
		localStorage.setItem("filtrate_params", $.param(params));
		return true;
	}
	return false;
}

// Filtrate value hooks
elgg.register_hook_handler('value_populated', 'filtrate', elgg.filtrate.valuePopulatedHandler);
elgg.register_hook_handler('value_alt', 'filtrate', elgg.filtrate.valueAltHandler);

// Chosen hooks
elgg.register_hook_handler('change', 'chosen.js', elgg.filtrate.handleChange);
elgg.register_hook_handler('init', 'chosen.js', elgg.filtrate.chosenInterrupt);

// Other hooks
elgg.register_hook_handler('element_alt', 'filtrate', elgg.filtrate.elementAltHandler);
elgg.register_hook_handler('element_alt_clear', 'filtrate', elgg.filtrate.elementAltClearHandler);
elgg.register_hook_handler('selection_added', 'typeaheadtags', elgg.filtrate.typeaheadChange);
elgg.register_hook_handler('selection_removed', 'typeaheadtags', elgg.filtrate.typeaheadChange);