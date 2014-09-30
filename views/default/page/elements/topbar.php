<?php
/**
 * Elgg topbar override
 * The standard elgg top toolbar
 */

$context = elgg_get_context();

$js = <<<JAVASCRIPT
	<script type='text/javascript'>
		// Check for local storage
		function isLS() {
			try {
				return 'localStorage' in window && window['localStorage'] !== null;
			} catch (e) {
				return false;
			}
		}

		// Check for local storage
		if (isLS()) {
			// Check if we've got the topbar cached
			var cache_data = localStorage.getItem('topbarCache');
			if (cache_data) {
				// Parse it out and set the topbar content to the cached content
				var topbar_content = JSON.parse(cache_data);
				document.getElementById("tgstheme-cacheabe-topbar").innerHTML = topbar_content;
				document.getElementById("tgstheme-cacheabe-topbar").style.display = 'block';
			}
		}

		$(document).ready(function() {
			var init_topbar = function() {
				elgg.get(elgg.get_site_url() + 'ajax/view/page/elements/topbar_ajax', {
					data: {
						page_context: "$context"
					},
					success: function(data) {
						// If we've got localstorage
						if (isLS()) {
							// Cache that topbar for the next reload
							var cache_data = JSON.stringify(data);
							localStorage.setItem('topbarCache', cache_data);
						}
						
						$('.elgg-page-topbar > .elgg-inner').html(data).fadeIn('fast');
						elgg.trigger_hook('loaded', 'topbar_ajax');
					}, 
					error: function(xhr, ajaxOptions, thrownError) {
						//..
					}
				});
			}

			elgg.register_hook_handler('ready', 'system', init_topbar);
		});
	</script>
JAVASCRIPT;

echo $js;