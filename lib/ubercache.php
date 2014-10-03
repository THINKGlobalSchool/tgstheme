<?php
/**
 * TGS Theme 2 Ubercache lib
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 *
 * Note: Ubercache uses some code from the 'combine' library
 * http://rakaz.nl/code/combine 
 * See below for the original copyright notice.
 *
 * /************************************************************************ 
 * CSS and Javascript Combinator 0.5
 * Copyright 2006 by Niels Leenheer 
 * 
 * Permission is hereby granted, free of charge, to any person obtaining 
 * a copy of this software and associated documentation files (the 
 * "Software"), to deal in the Software without restriction, including 
 * without limitation the rights to use, copy, modify, merge, publish, 
 * distribute, sublicense, and/or sell copies of the Software, and to 
 * permit persons to whom the Software is furnished to do so, subject to 
 * the following conditions: 
 *  
 * The above copyright notice and this permission notice shall be 
 * included in all copies or substantial portions of the Software. 
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, 
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF 
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND 
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE 
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION 
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION 
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. 
 */ 

/** Ubercache Helpers **/

/**
 * Generate etag hash from given files
 * 
 * @param array $files  Array of filenames/locations
 * @return string
 */
function ubercache_get_etag_hash($files = array()) {
	$lastcache = elgg_get_config('lastcache');

	foreach ($files as $link) {
		$links .= $link;
	}

	$linkhash = md5($links);

	return "{$lastcache}-{$linkhash}";
}

/**
 * Generate cache filename
 *
 * @return string
 */
function ubercache_get_cache_filename($prefix, $hash, $encoding) {
	return "{$prefix}{$hash}" . ($encoding != 'none' ? '.' . $encoding : '');
}

/**
 * Determine and return available compression method
 * 
 * @return string compression method
 */
function ubercache_get_compression_method() {
	// Determine supported compression method
	$gzip = strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip');
	$deflate = strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'deflate');

	// Determine used compression method
	$encoding = $gzip ? 'gzip' : ($deflate ? 'deflate' : 'none');

	// Check for buggy versions of Internet Explorer
	if (!strstr($_SERVER['HTTP_USER_AGENT'], 'Opera') && 
		preg_match('/^Mozilla\/4\.0 \(compatible; MSIE ([0-9]\.[0-9])/i', $_SERVER['HTTP_USER_AGENT'], $matches)) {
	$version = floatval($matches[1]);

	if ($version < 6) {
		$encoding = 'none';
	}

	if ($version == 6 && !strstr($_SERVER['HTTP_USER_AGENT'], 'EV1')) 
		$encoding = 'none';
	}

	return $encoding;
}

/**
 * Hack: remove certain CSS urls from the ubercache
 *
 * @param array $css Array of CSS links to filter
 */
function ubercache_filter_css($css) {
	$search = array('ajax/view');
	$exclude_css_cache_keys = array_keys(array_filter($css, function($var) use ($search){
		foreach ($search as $s) {
			return strpos($var, $s) !== false;	
		}
	}));

	$exclude = array();

	foreach ($exclude_css_cache_keys as $key) {
		$exclude[$key] = $css[$key];
		unset($css[$key]);
	}

	return array(
		'cache' => $css,
		'exclude' => $exclude
	);
}

/**
 * Hack: remove certain JS urls from the ubercache
 *
 * @param array $js Array of JS links to filter
 */
function ubercache_filter_js($js) {
	$search = array('tinymce');
	$exclude_js_cache_keys = array_keys(array_filter($js, function($var) use ($search){
		foreach ($search as $s) {
			return strpos($var, $s) !== false;	
		}
	}));

	$exclude = array();

	foreach ($exclude_js_cache_keys as $key) {
		$exclude[$key] = $js[$key];
		unset($js[$key]);
	}

	return array(
		'cache' => $js,
		'exclude' => $exclude
	);
}