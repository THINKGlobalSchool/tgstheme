<?php
/**
 * Site navigation menu
 *
 * @uses $vars['menu']['default']
 * @uses $vars['menu']['more']
 */

echo '<ul class="elgg-menu elgg-menu-site elgg-menu-site-default clearfix">';
foreach ($vars['menu']['default'] as $menu_item) {
	echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
}
echo '</ul>';
echo '<ul class="elgg-menu elgg-menu-more-right elgg-menu-site elgg-menu-site-default clearfix">';
if (isset($vars['menu']['more'])) {
	echo '<li class="elgg-more">';

	$more = elgg_echo('Browse');
	echo "<a title=\"$more\">$more</a>";
	
	echo elgg_view('navigation/menu/elements/section', array(
		'class' => 'elgg-menu elgg-menu-site elgg-menu-site-more', 
		'items' => $vars['menu']['more'],
	));
	
	echo '</li>';
}

echo <<<JAVASCRIPT
	<script type='text/javascript'>
		var ios = (navigator.userAgent.match(/ipad|ipod|iphone/i));
		if (ios) {
			$('.elgg-more').bind('click', function(e) {
				$(this).addClass('ios-touchactive');
			});
		}
	</script>
JAVASCRIPT;

echo '</ul>';