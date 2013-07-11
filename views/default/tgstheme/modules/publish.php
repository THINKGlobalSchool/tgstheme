<?php
/**
 * TGS Theme 2 Profile Module
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 */

$img_path = elgg_normalize_url('mod/tgstheme/_graphics/publish_icons');

$user_guid = elgg_get_logged_in_user_guid();

// Primary items
$blog_add_url = elgg_normalize_url("blog/add/{$user_guid}");
$photo_add_url = elgg_normalize_url("photos/all");
$file_add_url = elgg_normalize_url("file/add/{$user_guid}");
$bookmark_add_url = elgg_normalize_url("bookmarks/add/{$user_guid}");
$video_add_url = elgg_normalize_url("video/add/{$user_guid}");

// Secondary items
$page_add_url = elgg_normalize_url("pages/add/{$user_guid}");
$google_doc_add_url = elgg_normalize_url("googapps/docs/add/{$user_guid}");

$publish_header = "Add New<span class='home-small right publish-more publish-more-closed'>More</span>";

$publish_more_menu = <<<HTML
	<ul>
		<li><a target="_blank" href="$page_add_url">Page</a></li>
		<li><a target="_blank" href="$google_doc_add_url">Google Doc</a></li>
	</ul>
HTML;

$publish_content = <<<HTML
	<div class="tgstheme-publish-item" data-href="$blog_add_url">
		<img src="$img_path/blog-icon.png">
		<span>Blog</span>
	</div>
	<div class="tgstheme-publish-item" data-href="$photo_add_url">
		<img src="$img_path/photo-icon.png">
		<span>Photo</span>
	</div>
	<div class="tgstheme-publish-item" data-href="$file_add_url">
		<img src="$img_path/file-icon.png">
		<span>File</span>
	</div>
	<div class="tgstheme-publish-item" data-href="$bookmark_add_url">
		<img src="$img_path/bookmark-icon.png">
		<span>Bookmark</span>
	</div>
	<div class="tgstheme-publish-item" data-href="$video_add_url">
		<img src="$img_path/video-icon.png">
		<span>Video</span>
	</div>
	<div class='clearfix'></div>
	<div class="tgstheme-publish-more-menu">
		$publish_more_menu
	</div>
HTML;

echo elgg_view_module('publish', $publish_header, $publish_content);