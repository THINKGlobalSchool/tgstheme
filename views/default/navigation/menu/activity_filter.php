<?php
/**
 * Activity Filtrate menu
 * 
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 * @uses $vars Menu vars
 */

// Pass vars on to to filtrate
$menu = elgg_view('navigation/menu/filtrate', $vars);

$js = <<<JAVASCRIPT
	<script type='text/javascript'>
		elgg.filtrate.ajaxListUrl= elgg.get_site_url() + 'ajax/view/tgstheme/activity_list';
		elgg.filtrate.defaultParams	= $.param({
			'type': 0,
		});
	</script>
JAVASCRIPT;

echo $js . $menu;