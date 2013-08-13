<?php
/**
 * Elgg topbar ajax view
 */

// Elgg topbar menu
echo elgg_view_menu('topbar', array('sort_by' => 'priority', array('elgg-menu-hz')));
echo <<<JAVASCRIPT
	<script type='text/javascript'>
		$(document).ready(function() {

			// Split any topbar dropdown lists
			$(".elgg-menu-topbar .elgg-menu-topbar-dropdown").each(function() {
				var parent = $(this).parent();

				// Only split menus if there are more than 6 items
				if ($(this).children().length <= 6) {
					return true;
				}

				var split = Math.ceil($(this).children().length / 2) - 1;

				$(this).wrap($("<div>").attr("class", "dropdown-split split-first"));

				$("<div><ul>")
					.attr("class", "dropdown-split split-second")
					.insertAfter($(this).parent())
					.children().append($(this).find("li:gt(" + split + ")"))
					.attr('class', $(this).attr('class'));


				parent.find('div.dropdown-split').wrapAll($("<div>").attr('class', 'dropdown-wrapper'));
			});	
		});
	</script>
JAVASCRIPT;
?>