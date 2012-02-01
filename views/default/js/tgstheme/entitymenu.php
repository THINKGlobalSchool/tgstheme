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
	// Hover handler for icon (action/settings/whatev..)
	// LIVE IS DEPRECATED :( but delegate works better :) (actually so is delegate in pre jQuery 1.7)
	$(document).delegate('span.toggle-actions', 'hover', elgg.entitymenu.actionsHover);

	// Hide multi-todo's when clicking outside box
	$('body').live('click', function(event) {
		// Note: this is the best way yet I've discovered...
		if ($(event.target).closest('.tgstheme-entity-menu-actions').get(0) == null) { // Not *inside* the div 
			$(".tgstheme-entity-menu-actions").fadeOut();
		}
	});
}

// Destroy function
elgg.entitymenu.destroy = function() {
	// Unbind all events
	$('a.toggle-actions').die();
}

elgg.entitymenu.actionsHover = function(event) {	
	// Get the special menu container
	$container = $(this).closest('.tgstheme-entity-menu');
	
	// Get the actions menu
	$menu = $container.find('div.tgstheme-entity-menu-actions');

	$menu.fadeIn();

	if (!$menu.data('positioned')) {
		// This is hacky... but its the only way I can get a consitent div
		$clone = $menu.clone();
		var width = $clone.appendTo('body').outerWidth();
		$clone.remove()

		$menu.css('width', width-10).position({
			my: "right top",
			at: "right bottom",
			of: $container,
			offset: "0 6",
		});
		
		$menu.data('positioned', 1);
	}

	// Hide all other action divs
	$('.tgstheme-entity-menu-actions').each(function() {
		if (!$(this).is($menu)) {
			$(this).fadeOut();
		}
	});

	event.preventDefault();
}

elgg.register_hook_handler('init', 'system', elgg.entitymenu.init);