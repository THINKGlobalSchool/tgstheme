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
			$(this).attr("src",url+"?wmode=opaque");
		}
	});
}

elgg.register_hook_handler('init', 'system', elgg.tgstheme.init);