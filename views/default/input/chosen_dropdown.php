<?php
/**
 * TGS Theme 2 - Chosen dropdown
 * 
 * - Wraps regular dropdown and chosen-ifies it
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 * @uses $vars['class']
 * @uses $vars['id']
 */

// Make sure input has an id
if (!$vars['id']) {
	$vars['id'] = uniqid() . "-chosen-select";
}

$id = $vars['id'];

$vars['class'] = $vars['class'] . " tgstheme-chosen-select";

echo elgg_view('input/dropdown', $vars);

// Echoing js inline here to compatibility with ajax loads.. wish there was a better way
echo <<<JAVASCRIPT
	<script type="text/javascript">
		$(document).ready(function() {
			// elgg.register_hook_handler('init', 'chosen.js', function(a, b, c, d) {
			// 	return {'width': '100%'};
			// });	

			var id = "$id";

			// Default options
			var options = {
				'placeholder_text_multiple': 'Select items..'
			};

			// Trigger a hook for options
			var options = elgg.trigger_hook('init', 'chosen.js', {'id' : "$id"}, options);

			// Init dropdown
			$("#$id").chosen(options).change(function() {
				
			});
		});
	</script>
JAVASCRIPT;
?>