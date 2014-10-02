<?php

echo elgg_view('footer/analytics');

$js = elgg_get_loaded_js('footer');

/* Uber JS */
$encoding = ubercache_get_compression_method();
$js_linkhash = ubercache_get_etag_hash($js);
$js_filename = ubercache_get_cache_filename('uberjs.', $js_linkhash, $encoding);
$js_url = elgg_get_site_url() . "uber/{$js_filename}.js?location=footer";
$_SESSION['uberjsfooter'] = $js;
?>
<script type="text/javascript" src="<?php echo $js_url; ?>"></script>
