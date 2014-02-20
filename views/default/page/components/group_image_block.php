<?php
/**
 * Group image block 
 * 
 * ------------
 * |          |
 * |  Header  |
 * |          | 
 * ------------
 * |          |
 * |  image   |
 * |  block   |
 * |          |
 * ------------
 * |          |
 * |  footer  |
 * |          |
 * ------------
 *
 * @uses $vars['header']      HTML content of the body block
 * @uses $vars['image']       HTML content of the image block
 * @uses $vars['footer']      Footer
 * @uses $vars['class']       Optional additional class for media element
 * @uses $vars['id']          Optional id for the media element
 */

$header = elgg_extract('header', $vars, '');
$image = elgg_extract('image', $vars, '');
$footer = elgg_extract('footer', $vars, '');

$class = 'elgg-image-block elgg-group-image-block';
$additional_class = elgg_extract('class', $vars, '');
if ($additional_class) {
	$class = "$class $additional_class";
}

$id = '';
if (isset($vars['id'])) {
	$id = "id=\"{$vars['id']}\"";
}


$header = "<div class=\"elgg-body\">$header</div>";

if ($image) {
	$image = "<div class=\"elgg-image\">$image</div>";
}

if ($footer) {
	$footer = "<div class=\"elgg-body\">$footer</div>";
}

echo <<<HTML
<div class="$class clearfix" $id>
	$header$image$footer
</div>
HTML;
