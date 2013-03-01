<?php
/**
 * TGS Theme 2 Bookmarklet View
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 */

// Show the form for logged in users
if (elgg_is_logged_in()) {
	$vars = bookmarks_prepare_form_vars();
	$header = elgg_view_title(elgg_echo('bookmarklet:bookmarkthis', array(elgg_get_site_entity()->name)));
	$content = elgg_view_form('bookmarks/save', array(), $vars);
} else { // Show login form
	$login_url = elgg_get_site_url();
	if (elgg_get_config('https_login')) {
		$login_url = str_replace("http:", "https:", elgg_get_site_url());
	}
	$header = elgg_view_title(elgg_echo('bookmarklet:login'));
	$content = elgg_view_form('login', array('action' => "{$login_url}action/login"));
}

echo <<<HTML
	<div id='elgg-bookmarklet-wrapper'>
		<div style='display: none;'>
			<div id='elgg-bookmarklet-content'>
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

			// Init bookmarklet lightbox, and trigger immediately
			$(".bookmarklet-lightbox").fancybox({
				scrolling: 'no',
				onClosed: function() {
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

				elgg.action($(this).attr('action'), {
					data: $(this).serialize(),
					success: function(json) {
						$.fancybox.close();
						destroy();
					}
				});
			});

			// Force the lightbox to resize
			setInterval(function(){
				$.fancybox.resize();
			},100);

			// Ajax submit login form
			$('form.elgg-form-login').submit(function(event) {
				event.preventDefault();
				console.log($(this).attr('action'));

				elgg.action($(this).attr('action'), {
					data: $(this).serialize(),
					success: function(json) {
						console.log('what the fuck??');
						$.fancybox.close();
						window.location.reload();
					}
				});
			});

			// Open any other links in login form in a new tab
			$('form.elgg-form-login a').click(function(event) {
				destroy(); // Kill the bookmarklet first
				$(this).attr('target', '_blank');
			});
		});
	</script>
JAVASCRIPT;
?>