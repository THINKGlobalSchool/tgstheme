<?php
/**
 * Elgg topbar override
 * The standard elgg top toolbar
 */

$context = elgg_get_context();

$js = <<<JAVASCRIPT
	<script type='text/javascript'>
		$(document).ready(function() {
			var init_topbar = function() {
				elgg.get(elgg.get_site_url() + 'ajax/view/page/elements/topbar_ajax', {
					data: {
						page_context: "$context"
					},
					success: function(data) {
						$('.elgg-page-topbar > .elgg-inner').prepend(data).fadeIn('fast');
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