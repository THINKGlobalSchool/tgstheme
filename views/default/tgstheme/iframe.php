<?php
/**
 * TGS Theme 2 Generic IFRAME View
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 * 
 * @uses $vars['title']
 * @uses $vars['content']
 */

// Show the form for logged in users
if (elgg_is_logged_in()) {
	$header = elgg_view_title(elgg_extract('title', $vars));
	$content = elgg_extract('content', $vars);
}

echo "<div id='elgg-iframe-content'>
	$header
	<hr />
	$content
</div>";

echo <<<JAVASCRIPT
	<script type='text/javascript'>
		$(document).ready(function() {
			// Force the lightbox to resize
			setInterval(function(){
				var new_h = $("#elgg-iframe-content").get(0).scrollHeight;
				parent.$('#fancybox-content').css('height', new_h - 1);
				parent.$.fancybox.center();
			}, 300);
		});
	</script>
JAVASCRIPT;
?>