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
	$('.tgstheme-publish-item.clickable').live('click', elgg.tgstheme.publishItemClick);

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
}

elgg.tgstheme.publishItemClick = function(event) {
	var url = elgg.get_site_url() + "iframe/" + $(this).data('type');
	(function(e,t) {
		var n=e.document;
		setTimeout(function() {
			function a(e) {
				if(e.data==="destroy_bookmarklet") {
					var r=n.getElementById(t);
					if(r) {
						n.body.removeChild(r);
						r=null;
					}
				}
			}
			var t="elgg-bookmarklet-iframe",r=n.getElementById(t);
			if(r){
				return
			}
			var i = url, s = n.createElement("iframe");
			s.id=t;
			s.src=i;
			s.style.position="fixed";
			s.style.top = "0";
			s.style.left = "0";
			s.style.height = "100%";
			s.style.width = "100%";
			s.style.zIndex = "16777270";
			s.style.border = "none";
			s.style.visibility = "hidden";
			s.onload = function() {
				this.style.visibility="visible";
			};
			n.body.appendChild(s);
			var o=e.addEventListener?"addEventListener":"attachEvent";
			var u=o=="attachEvent"?"onmessage":"message";
			e[o](u,a,false);
		},1);
	})(window);
}

elgg.register_hook_handler('init', 'system', elgg.tgstheme.init);