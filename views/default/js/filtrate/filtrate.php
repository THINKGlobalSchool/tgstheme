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

	// Add popstate event listener
	window.addEventListener("popstate", function(event) {
	    elgg.filtrate.listHandler(false)
	});
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
	if (params.element.data('timestamp')) {
		return params.element.data('timestamp');
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
		var params = deParam(elgg.filtrate.defaultParams);
		var base_url = window.location.href;
	}

	// If we're not pushing state
	if (!doPushState) {
		var bound_params = new Array();

		// Loop over available params
		$.each(params, function(idx, val) {
			// Get elements matching this param
			var $element = $(".filtrate-filter[data-param='" + idx + "']");

			// Push updated element to bound params list
			bound_params.push(idx);
			
			// Set elements value
			$element.val(val);

			// Trigger a hook for populated value
			elgg.trigger_hook('value_populated', 'filtrate', {'element' : $element});

			// Update chosen
			$element.trigger('chosen:updated');

			// Disable elements
			elgg.filtrate.setEnabledState($element, false);
		});

		// Check for unbound params
		$('.filtrate-filter[data-param]').each(function(idx) {
			// If not bound above
			if ($.inArray($(this).data('param'), bound_params) == -1) {
				// Clear the value
				$(this).val('');

				// Re-enable if element previously disabled an element
				elgg.filtrate.setEnabledState($(this), true);
			}
		}); 
	} else {
		// We're pushing state
		$('[data-param]').each(function(idx) {
			// If this element has a value, and is enabled (or an anchor element)
			if ($(this).val() && ($(this).is(':enabled') || $(this).is('a'))) {
				var alt_params = {'element' : $(this)};
				var value = elgg.trigger_hook('value_alt', 'filtrate', alt_params, $(this).val());
				params[$(this).data('param')] = value;
				//params[$(this).data('param')] = $(this).val();
			} else {
				// Clear it out
				delete params[$(this).data('param')];
			}
		});

		// Push it real good
		history.pushState({}, elgg.echo('filtrate:title:dashboard'), base_url + "?" + $.param(params));
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
		},
		error: function() {
			// Show error on failure
			$("#filtrate-content-container").html(elgg.echo('filtrate:error:content'));
		}
	});
}

// Filtrate value hooks
elgg.register_hook_handler('value_populated', 'filtrate', elgg.filtrate.valuePopulatedHandler);
elgg.register_hook_handler('value_alt', 'filtrate', elgg.filtrate.valueAltHandler);

// Chosen hooks
elgg.register_hook_handler('change', 'chosen.js', elgg.filtrate.handleChange);
elgg.register_hook_handler('init', 'chosen.js', elgg.filtrate.chosenInterrupt);