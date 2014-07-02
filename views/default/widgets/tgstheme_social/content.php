<?php
/**
 * TGS Theme 2 Social Widget
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

elgg_load_js('jquery.tiptip');

$menu = elgg_view_menu('social-menu', array(
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz'
));

echo "<div class='tgstheme-social-menu-center'>$menu</div>";

$js = <<<JAVASCRIPT
	 <script type='text/javascript'>
	 	// Init tiptips
		$('.elgg-menu-social-menu-item a').each(function() {
			$(this).tipTip({
				delay           : 0,
				defaultPosition : 'top',
				fadeIn          : 25,
				fadeOut         : 300,
				edgeOffset      : -5
			});
		});
	 </script>
JAVASCRIPT;

echo $js;