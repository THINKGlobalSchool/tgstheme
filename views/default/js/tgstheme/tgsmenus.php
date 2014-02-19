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
elgg.provide('elgg.tgsmenus');

// Init function
elgg.tgsmenus.init = function() {
	// Extra click handler for the toggle button
	$(document).delegate('a.entity-action-toggler', 'click', elgg.tgsmenus.toggleClick);

	// Owner block show more click handler
	$(document).delegate('a.ownerblock-browse-content-closed, a.ownerblock-browse-content-open', 'click', elgg.tgsmenus.ownerblockShowMoreClick);
}

// Click handler for toggler
elgg.tgsmenus.toggleClick = function(event) {
	var id = $(this).attr('href');
	// Hide all other popups, except this one
	$('.tgstheme-entity-menu-actions').each(function() {
		if (!$(this).is($(id))) {
			$(this).fadeOut();
		}
	});
}

// Click handler for show more
elgg.tgsmenus.ownerblockShowMoreClick = function(event) {
	var $_this = $(this);
	// Toggle more button off
	$('#tgstheme-collapsable-ownerblock-full').slideToggle(function() {
		$_this.toggleClass('ownerblock-browse-content-closed').toggleClass('ownerblock-browse-content-open');
	});

	event.preventDefault();
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
elgg.tgsmenus.entityMenuHandler = function(hook, type, params, options) {
	// Interesting way to check if string starts with (see below)
	if (params.target.attr('id') && params.target.attr('id').lastIndexOf("entity-actions-", 0) === 0) {
		options.my = 'right top';
		options.at = 'right bottom';
		options.offset = "0 15";
		return options;
	}
	return null;
};

/**
 * Repositions the owner_block popup
 *
 * @param {String} hook    'getOptions'
 * @param {String} type    'ui.popup'
 * @param {Object} params  An array of info about the target and source.
 * @param {Object} options Options to pass to
 *
 * @return {Object}
 */
elgg.tgsmenus.ownerblockMenuHandler = function(hook, type, params, options) {
	if (params.target.attr('id') == 'tgstheme-ownerblock-menu') {
		options.my = 'right top';
		options.at = 'right bottom';
		return options;
	}
	return null;
};

// Convenience function to hide all menus
elgg.tgsmenus.hideMenus = function() {
	$('.tgstheme-entity-menu-actions').fadeOut();
}

elgg.register_hook_handler('getOptions', 'ui.popup', elgg.tgsmenus.entityMenuHandler);
elgg.register_hook_handler('getOptions', 'ui.popup', elgg.tgsmenus.ownerblockMenuHandler);
elgg.register_hook_handler('init', 'system', elgg.tgsmenus.init);
elgg.register_hook_handler('peopleTagStarted', 'tidypics', elgg.tgsmenus.hideMenus);
elgg.register_hook_handler('photoLightboxLikeClick', 'tidypics', elgg.tgsmenus.hideMenus);
elgg.register_hook_handler('photoLightboxBeforeShow', 'tidypics', elgg.tgsmenus.hideMenus);
elgg.register_hook_handler('photoLightboxBeforeClose', 'tidypics', elgg.tgsmenus.hideMenus);
elgg.register_hook_handler('popState', 'tidypics', elgg.tgsmenus.hideMenus);
elgg.register_hook_handler('moveToAlbumOpened', 'tidypics', elgg.tgsmenus.hideMenus);