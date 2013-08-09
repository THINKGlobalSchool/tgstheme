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

			// Modify src attribute
			iframe.attr("src",url+"?wmode=opaque");

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
			'width': 600,
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

	// Hack dialog links in the iframe, need them to target the parent window
	$('#elgg-iframe-body .ui-dialog-content a').live('click', function() {
		if ($(this).attr('href').length) {
			window.parent.location = $(this).attr('href');
			return false;
		};
	})
}

elgg.register_hook_handler('init', 'system', elgg.tgstheme.init);