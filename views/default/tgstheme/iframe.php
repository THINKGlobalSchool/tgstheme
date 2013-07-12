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
	<div id='elgg-bookmarklet-wrapper'>
		<div style='display: none;'>
			<div id='elgg-bookmarklet-content' style='min-width: 590px'>
				$header<br />
				$content
			</div>
		</div>
	</div>
	<a href='#elgg-bookmarklet-content' class='bookmarklet-lightbox'></a>
HTML;

echo <<<JAVASCRIPT
	<script type='text/javascript'>
		$(document).ready(function() {
			// Close the bookmarklet
			var destroy = function() {
				window.parent.postMessage("destroy_bookmarklet","*");
			};

			var resizeFancyBox = function() {

			}

			// Init bookmarklet lightbox, and trigger immediately
			$(".bookmarklet-lightbox").fancybox({
				scrolling: 'no',
				onStart: function() {
					//$(window).bind('resize', resizeFancyBox);
				},
				onClosed: function() {
					//$(window).unbind('resize', resizeFancyBox);
					destroy();
				}
			}).trigger('click');

			// Ajax submit the bookmark form
			$('form.elgg-form-bookmarks-save').submit(function(event) {
				event.preventDefault();

				// Make sure we grab tinymce content
				if (typeof(tinyMCE) != 'undefined') {
					tinyMCE.triggerSave();
				}

				$('#elgg-bookmarklet-content').addClass('elgg-ajax-loader');

				elgg.action($(this).attr('action'), {
					data: $(this).serialize(),
					success: function(json) {
						$('#fancybox-close').hide();
						$('#elgg-bookmarklet-content').removeClass('elgg-ajax-loader');
						$('#elgg-bookmarklet-content').html("<h2 style='text-align: center;'>" + elgg.echo('bookmarklet:saved') + "</h2>");
						setTimeout(function() {
							$.fancybox.close();
							destroy();
						}, 1500);
					}
				});
			});

			// Grab bookmarklet element
			bookmarklet = $('#elgg-bookmarklet-content');

			// Get the initial, full height
			initial_height = bookmarklet.height();

			// Force the lightbox to resize
			setInterval(function(){
				// Move lightbox
				$.fancybox.resize();

				

			},300);

			// Open any other links in login form in a new tab
			$('form.elgg-form-login a').click(function(event) {
				destroy(); // Kill the bookmarklet first
				$(this).attr('target', '_blank');
			});
		});
	</script>
JAVASCRIPT;
?>