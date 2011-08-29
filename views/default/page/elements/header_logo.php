<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();
?>
<!-- 
<h1>
	<a class="elgg-heading-site" href="<?php // echo $site_url; ?>">
		<?php // echo $site_name; ?>
	</a>
</h1>
-->
 
 
 	<a href="<?php echo $site_url; ?>"><img src="<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/logo.jpg" border="0" alt="Think Spot Logo"></img></a>
  