<?php
/**
 * TGS Theme 2 Generic IFRAME View
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 * 
 * @uses $vars['title']
 * @uses $vars['content']
 */

// Show the form for logged in users
if (elgg_is_logged_in()) {
	$header = elgg_view_title(elgg_extract('title', $vars));
	$content = elgg_extract('content', $vars);
}

echo <<<HTML
	<div id='elgg-iframe-wrapper'>
		<div style='display: none;'>
			<div id='elgg-iframe-content' style='min-width: 590px'>
				$header<br />
				$content
			</div>
		</div>
	</div>
	<a href='#elgg-iframe-content' class='iframe-lightbox'></a>
HTML;

echo <<<JAVASCRIPT
	<script type='text/javascript'>
		$(document).ready(function() {
			// Close the iframe
			var destroy = function() {
				window.parent.postMessage("destroy_iframe","*");
			};

			var resizeFancyBox = function() {

			}

			// Init bookmarklet lightbox, and trigger immediately
			$(".iframe-lightbox").fancybox({
				scrolling: 'no',
				onStart: function() {
					//$(window).bind('resize', resizeFancyBox);
				},
				onClosed: function() {
					//$(window).unbind('resize', resizeFancyBox);
					destroy();
				}
			}).trigger('click');

			// Grab bookmarklet element
			iframe = $('#elgg-iframe-content');

			// Get the initial, full height
			initial_height = iframe.height();

			// Force the lightbox to resize
			setInterval(function(){
				// Move lightbox
				$.fancybox.resize();

				// Get new window height
				window_height = $(window).height();

				// Shrink bookmarklet div and set overflow
				if (iframe.height() > (window_height - 60)) {
					iframe.height(window_height - 50);
					iframe.css('overflow-y', 'scroll');
				} else { // Reset iframe height, unset overflow
					iframe.height(initial_height + 50);
					iframe.css('overflow-y', 'hidden');
				}	

			},300);

			// Open any other links in login form in a new tab
			$('form.elgg-form-login a').click(function(event) {
				destroy(); // Kill the iframe first
				$(this).attr('target', '_blank');
			});
		});
	</script>
JAVASCRIPT;
?>