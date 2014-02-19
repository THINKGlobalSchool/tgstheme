<?php
/**
 * Filtrate dashboard
 * 
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 * 
 * @uses $vars['menu_name']
 * @uses $vars['infinite_scroll']  Enable infinite scrolling
 * @uses $vars['list_url']         List endpoint URL
 * @uses $vars['default_params']   Initial/default params
 * @uses $vars['disable_advanced'] Disable the advanced menu: true/false
 * @uses $vars['disable_extras']   Disable the extras menu: true/false
 * @uses $vars['disable_history']  Disable HTML5 history (push/popstate)
 * @uses $vars['content_header']   Optional header content (between menu and output)
 * @uses $vars['page_context']     Page context
 */

elgg_load_js('elgg.filtrate');
elgg_load_js('elgg.filtrate.utilities');

$infinite_scroll = elgg_extract('infinite_scroll', $vars);
$list_url = elgg_extract('list_url', $vars);
$default_params = json_encode(elgg_extract('default_params' , $vars));
$disable_history = elgg_extract('disable_history', $vars);
$context = elgg_extract('page_context', $vars, elgg_get_context());

if (!$infinite_scroll) {
	$infinite_scroll = 0;
}

if (!$disable_history) {
	$disable_history = 0;
}

$js = <<<JAVASCRIPT
	<script type='text/javascript'>
		elgg.filtrate.defaultParams = $.param($.parseJSON('$default_params'));
		elgg.filtrate.ajaxListUrl= '$list_url';
		elgg.filtrate.enableInfinite = $infinite_scroll;
		elgg.filtrate.disableHistory = $disable_history;
		elgg.filtrate.context = '$context';
	</script>
JAVASCRIPT;

echo $js;

$vars['sort_by'] = 'priority';

echo elgg_view_menu($vars['menu_name'], $vars);

if ($vars['content_header']) {
	echo $vars['content_header'];
}

echo "<div id='filtrate-content-container'></div>";