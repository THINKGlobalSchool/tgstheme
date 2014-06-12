<?php
/**
 * Barebones pageshell for iframes
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 */

// Set the content type
header("Content-type: text/html; charset=UTF-8");

$lang = get_current_language();

$content = $vars['body'];

$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));

// Need to include this for AMD deps
$foot = elgg_view('page/elements/foot', $vars);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
<head>
<?php echo elgg_view('page/elements/head', $vars); ?>
</head>
<body id='elgg-iframe-body'>
	<div class="elgg-page elgg-page-default">
		<div class="elgg-page-messages">
			<?php echo $messages; ?>
		</div>
		<div class='elgg-page-body'>
			<div class='elgg-inner'>
				<?php echo $content; ?>
				<?php 
					echo $foot;
				?>
			</div>
		</div>
	</div>
	<script type='text/javascript'>
		$(document).ready(function() {
			elgg.tgstheme.publishIframeReady();

				// Close the bookmarklet
				var destroy = function() {
					window.parent.postMessage("destroy_bookmarklet","*");
				};

				//Customize colorbox dimensions
				var colorboxResize = function() {
					height = window.innerHeight - 250;
					$.colorbox.resize({
						'height': height,
					});
				}

				$(".publish-lightbox").colorbox({
					'inline': true,
					'top': 75,
					'innerWidth': '620px',
					'onClosed': function(event) {
						destroy();
					},
					'onComplete': function(event) {
						colorboxResize();
					}
				}).trigger('click');
		});
	</script>
</body>
</html>