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
			/** ------------ HOOK EXAMPLES ------------ **/
			/** Get options hook example **/
			// elgg.register_hook_handler('getOptions', 'chosen.js', functionhook, type, params, options) {
			// 	return {'width': '100%'};
			// });	

			/** Change hook example **/
			// elgg.register_hook_handler('change', 'chosen.js', function(hook, type, params, options) {
			// 	return function() {
			// 		console.log('test');
			// 	}
			// });

			/** Init override example **/
			// elgg.register_hook_handler('init', 'chosen.js', function(hook, type, params, options) {
			// 	if (params.id == 'some_id') {
			// 		return function() {
			// 			console.log('nope');
			// 		}
			// 	}
			// 	return options;
			// });

			// Get element, id and multiple attr
			var id = "$id",
			    element = $("#" + "$id"), 
			    multi = element.attr('multiple');

			// Default init function - plugins can completely override
			var defaultInit = function() {

				// Default options
				var options = {
					'placeholder_text_multiple': 'Select items..'
				};

				// Pass in a width if we're dealing with a multi select
				if (typeof multi !== 'undefined' && multi !== false) {
					options["width"] = "50%";
				}

				// Trigger a hook for options
				var options = elgg.trigger_hook('getOptions', 'chosen.js', {'id' : "$id"}, options);

				// Init and bind change
				$("#$id").chosen(options).change(elgg.trigger_hook('change', 'chosen.js', {'id' : "$id"}, function(){}));

			}

			// Init chosen dropdown
			elgg.trigger_hook('init', 'chosen.js', {'id' : "$id"}, defaultInit).call();

		});
	</script>
JAVASCRIPT;
?>