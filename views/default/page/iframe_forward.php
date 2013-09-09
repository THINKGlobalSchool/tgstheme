<?php
/**
 * Special pageshell for iframe forwards
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
$forward_url = get_input('forward_to');

// Re-register system messages
if ($vars['sysmessages']) {
	foreach($vars['sysmessages'] as $type => $messages) {
		foreach ($messages as $message) {
			if ($type == 'success') {
				system_message($message);
			} else if ($type == 'error') {
				// Shouldn't be any errors.. but check anyway
				register_error($message);
			}
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
<head>
	<style type='text/css'>
		body {
			margin-top: 50%;
			overflow: hidden;
			position: absolute;
			width: 100%;
			height: 100%;
		}
		div#loader {
			background: white url(<?php echo elgg_get_site_url(); ?>_graphics/ajax_loader_bw.gif) no-repeat center center;
			min-height: 33px;
			min-width: 33px;
		}
	</style>
	<script type='text/javascript'>
		// Forward to parent!
		setTimeout(function() {
			window.parent.location = "<?php echo $forward_url; ?>";
		}, 300);
	</script>
</head>
<body>
	<div id='loader'></div>
</body>
</html>