<?php
/**
 * The standard HTML head
 *
 * OVERRIDE 
 *
 * @uses $vars['title'] The page title
 */

// Set title
if (empty($vars['title'])) {
	$title = elgg_get_config('sitename');
} else {
	$title = elgg_get_config('sitename') . ": " . $vars['title'];
}

global $autofeed;
if (isset($autofeed) && $autofeed == true) {
	$url = full_url();
	if (substr_count($url,'?')) {
		$url .= "&view=rss";
	} else {
		$url .= "?view=rss";
	}
	$url = elgg_format_url($url);
	$feedref = <<<END

	<link rel="alternate" type="application/rss+xml" title="RSS" href="{$url}" />

END;
} else {
	$feedref = "";
}

/** UBER CSS/JS **/
$css = elgg_get_loaded_css();
$js = elgg_get_loaded_js('head');

$encoding = ubercache_get_compression_method();

$css_linkhash = ubercache_get_etag_hash($css);
$css_filename = ubercache_get_cache_filename('ubercss.', $css_linkhash, $encoding);
$css_url = elgg_get_site_url() . "uber/{$css_filename}.css";

$js_linkhash = ubercache_get_etag_hash($js);
$js_filename = ubercache_get_cache_filename('uberjs.', $js_linkhash, $encoding);
$js_url = elgg_get_site_url() . "uber/{$js_filename}.js?location=head";

// Exclude
$filtered_css = ubercache_filter_css($css);
$filtered_js = ubercache_filter_js($js);

$_SESSION['ubercss'] = $filtered_css['cache'];
$_SESSION['uberjshead'] = $filtered_js['cache'];

/** END UBER CSS/JS **/

$version = get_version();
$release = get_version(true);
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="ElggRelease" content="<?php echo $release; ?>" />
	<meta name="ElggVersion" content="<?php echo $version; ?>" />
	<title><?php echo $title; ?></title>
	<?php echo elgg_view('page/elements/shortcut_icon', $vars); ?>

	<!-- UBER CSS -->
	<link rel="stylesheet" href="<?php echo $css_url; ?>" type="text/css" />
	<!-- END UBER CSS -->

	<?php foreach ($filtered_css['exclude'] as $link) { ?>
	<link rel="stylesheet" href="<?php echo $link; ?>" type="text/css" />
<?php } ?>

<?php
	$ie_url = elgg_get_simplecache_url('css', 'ie');
	$ie7_url = elgg_get_simplecache_url('css', 'ie7');
	$ie6_url = elgg_get_simplecache_url('css', 'ie6');
?>
	<!--[if gt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie_url; ?>" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie7_url; ?>" />
	<![endif]-->
	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie6_url; ?>" />
	<![endif]-->


	<script type="text/javascript" src="<?php echo $js_url; ?>"></script>

	<?php foreach ($filtered_js['exclude'] as $link) { ?>
	<script type="text/javascript" src="<?php echo $link; ?>"></script>
	<?php } ?>

<script type="text/javascript">
// <![CDATA[
	<?php echo elgg_view('js/initialize_elgg'); ?>
// ]]>
</script>

<?php
echo $feedref;

$metatags = elgg_view('metatags', $vars);
if ($metatags) {
	elgg_deprecated_notice("The metatags view has been deprecated. Extend page/elements/head instead", 1.8);
	echo $metatags;
}
