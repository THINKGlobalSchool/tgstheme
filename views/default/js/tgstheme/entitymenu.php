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
	// Click handler for icon (action/settings/whatev..)
	$('a.toggle-actions').live('click', elgg.entitymenu.actionsClick);
	
	// Hide multi-todo's when clicking outside box
	$('body').live('click', function(event) {
		// Note this is the best way yet I've discovered...
		if ($(event.target).closest('.tgstheme-entity-menu-actions').get(0) == null // Not *inside* the div
			&& !$(event.target).hasClass('elgg-icon-settings-menu')) // Not the button that triggers the div
		{ 
			$(".tgstheme-entity-menu-actions").fadeOut();
		}
	});
}

// Destroy function
elgg.entitymenu.destroy = function() {
	// Unbind all events
	$('a.toggle-actions').die();
}

elgg.entitymenu.actionsClick = function(event) {	
	// Get the special menu container
	$container = $(this).closest('.tgstheme-entity-menu');
	
	// Get the actions menu
	$menu = $container.find('div.tgstheme-entity-menu-actions');
	
	// If we found a menu in this container, append it to the body and toggle
	if ($menu.length != 0) {
		$menu.fadeToggle();
		$menu.appendTo('body').position({
			my: "right top",
			at: "right bottom",
			of: $container,
			offset: "0 5",
		});
	} else {
		$menu = $($(this).attr('href') + ".tgstheme-entity-menu-actions");
		$menu.fadeToggle();
	}
	
	var $id = $(this).attr('href');
	
	// Hide all other action divs
	$('.tgstheme-entity-menu-actions').each(function() {
		if (!$(this).is($id)) {
			$(this).fadeOut();
		}
	});

	event.preventDefault();
}

elgg.register_hook_handler('init', 'system', elgg.entitymenu.init);