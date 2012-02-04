<?php
/**
 * TGS Theme 2 Entity Menu JS Library
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
elgg.provide('elgg.entitymenu');

// Init function
elgg.entitymenu.init = function() {
	// Extra click handler for the toggle button
	$(document).delegate('a.entity-action-toggler', 'click', elgg.entitymenu.toggleClick);
}

// Click handler for toggler
elgg.entitymenu.toggleClick = function(event) {
	var id = $(this).attr('href');
	
	// Hide all other popups, except this one
	$('.tgstheme-entity-menu-actions').each(function() {
		if (!$(this).is($(id))) {
			$(this).fadeOut();
		}
	});
}

/**
 * Repositions the entity menu popup
 *
 * @param {String} hook    'getOptions'
 * @param {String} type    'ui.popup'
 * @param {Object} params  An array of info about the target and source.
 * @param {Object} options Options to pass to
 *
 * @return {Object}
 */
elgg.portfolio.entityMenuHandler = function(hook, type, params, options) {	
	// Interesting way to check if string starts with (see below)
	if (params.target.attr('id').lastIndexOf("entity-actions-", 0) === 0) {
		options.my = 'right top';
		options.at = 'right bottom';
		options.offset = "0 15";
		return options;
	}
	return null;
};

elgg.register_hook_handler('getOptions', 'ui.popup', elgg.portfolio.entityMenuHandler);
elgg.register_hook_handler('init', 'system', elgg.entitymenu.init);