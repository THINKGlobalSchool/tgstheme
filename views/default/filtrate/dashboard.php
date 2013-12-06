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
 * @uses $vars['infinite_scroll'] Enable infinite scrolling
 * @uses $vars['list_url']        List endpoint URL
 * @uses $vars['default_params']  Initial/default params
 */


$infinite_scroll = elgg_extract('infinite_scroll', $vars);
$list_url = elgg_extract('list_url', $vars);
$default_params = json_encode(elgg_extract('default_params' , $vars));

if (!$infinite_scroll) {
	$infinite_scroll = 0;
}

$js = <<<JAVASCRIPT
	<script type='text/javascript'>
		elgg.filtrate.defaultParams = $.param($.parseJSON('$default_params'));
		elgg.filtrate.ajaxListUrl= '$list_url';
		elgg.filtrate.enableInfinite = $infinite_scroll;
	</script>
JAVASCRIPT;

echo $js;

echo elgg_view_menu($vars['menu_name'], array(
	'sort_by' => 'priority'
));

echo "<div id='filtrate-content-container'></div>";