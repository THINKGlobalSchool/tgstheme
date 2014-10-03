<?php
/**
 * TGS Theme 2 Ubercombiner view
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 *
 * I'm only making use of the compression/encoding and cache handling from the original script.
 */

$cache = true; 

// Get type and validate
$type = elgg_extract('type', $vars, null);
if ($type != 'css' && $type != 'js') {
    header ("HTTP/1.0 503 Not Implemented"); 
    exit;
}

$cache_prefix = "uber{$type}.";

// Build Etag hash
$files = elgg_extract('files', $vars);
$hash = ubercache_get_etag_hash($files);
header ("Etag: \"" . $hash . "\"");

if (isset($_SERVER['HTTP_IF_NONE_MATCH']) &&  
    stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) == '"' . $hash . '"') { 
    // Return visit and no modifications, so do not send anything 
    header ("HTTP/1.0 304 Not Modified"); 
    header ('Content-Length: 0'); 
} else {
    if (elgg_is_simplecache_enabled()) {
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', strtotime("+6 months")), true);
        header("Pragma: public", true);
        header("Cache-Control: public", true);
    } else {
        $cache = false;
    }

    // First time visit or files were modified 
    if ($cache) { 
        // Determine used compression method
        $encoding = ubercache_get_compression_method();

        // Try the cache first to see if the combined files were already generated 
        $cache_filename = ubercache_get_cache_filename($cache_prefix, $hash, $encoding);
        $cache_file = elgg_load_system_cache($cache_filename);

        if ($cache_file) { 
                if ($encoding != 'none') {
                    header ("Content-Encoding: " . $encoding);
                }

                $size = strlen($cache_file);

                header ("Content-Type: text/" . $type); 
                header ("Content-Length: " . $size);

                echo $cache_file;
                exit;
        } 
    }

    // Get contents of the files 
    $contents = ''; 
    foreach ($files as $link) {
        $contents .=  ($type == 'js' ? "\r\n;\r\n" : "\n\n") . file_get_contents($link);
    } 

    // Send Content-Type 
    header ("Content-Type: text/" . $type); 
     
    if (isset($encoding) && $encoding != 'none') { 
        // Send compressed contents 
        $contents = gzencode($contents, 9, $encoding == 'gzip' ? FORCE_GZIP : FORCE_DEFLATE); 
        header ("Content-Encoding: " . $encoding); 
        header ('Content-Length: ' . strlen($contents)); 
        echo $contents; 
    } else  { 
        // Send regular contents 
        header ('Content-Length: ' . strlen($contents)); 
        echo $contents; 
    }

    // Store cache 
    if ($cache) { 
        elgg_save_system_cache($cache_filename, $contents);
    } 
}     
