<?php
/**
 * @author Evan Winslow
 * @link https://github.com/ewinslow/elgg-facebook_theme
 */
elgg_load_library('elgg:file');
elgg_load_js('elgg.fileextender');
elgg_load_js('jQuery-File-Upload');
elgg_load_css('elgg.fileextender');
$form_vars = array(
	'enctype' => 'multipart/form-data', 
);
$body_vars = file_prepare_form_vars();

echo elgg_view_form('file/upload', $form_vars, array_merge($body_vars, $vars));
echo elgg_view('composer/extend');