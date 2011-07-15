<?php
/**
 * @author Evan Winslow
 * @link https://github.com/ewinslow/elgg-facebook_theme
 */
elgg_load_library('elgg:bookmarks');
echo elgg_view_form('bookmarks/save', array(), $vars);