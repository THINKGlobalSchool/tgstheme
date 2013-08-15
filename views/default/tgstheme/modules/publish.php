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

// Secondary items
$page_add_url = elgg_normalize_url("pages/add/{$user_guid}");
$google_doc_add_url = elgg_normalize_url("googapps/docs/add/{$user_guid}");

$publish_header = "Add New";

$publish_content = <<<HTML
	<div class="tgstheme-publish-item clickable" data-type='thewire'>
		<img src="$img_path/wire-icon.png">
		<span>Mini Post</span>
	</div>
	<div class="tgstheme-publish-item clickable" data-type='blog'>
		<img src="$img_path/blog-icon.png">
		<span>Blog</span>
	</div>
	<div class="tgstheme-publish-item _tp-uploader" data-context='addphotos'>
		<img src="$img_path/photo-icon.png">
		<span>Photo</span>
	</div>
	<div class="tgstheme-publish-item clickable" data-type='file'>
		<img src="$img_path/file-icon.png">
		<span>File</span>
	</div>
	<div class="tgstheme-publish-item clickable" data-type='bookmark'>
		<img src="$img_path/bookmark-icon.png">
		<span>Bookmark</span>
	</div>
	<div class="tgstheme-publish-item clickable" data-type='video'>
		<img src="$img_path/video-icon.png">
		<span>Video</span>
	</div>
	<div class='clearfix'></div>
	<span class='publish-more publish-more-closed'>more</span>
	<div class='clearfix'></div>
	<div class="tgstheme-publish-more-menu">
		<ul>
			<li class='clickable' data-type='page'>Page</li>
			<li class='clickable' data-type='googledoc'>Google Doc</li>
		</ul>
	</div>
HTML;

echo elgg_view_module('publish', '', $publish_content);

echo <<<CSS
	<style type='text/css'>
		#fancybox-wrap {
			position: absolute;
			top: 100px !important;
		}
	</style>
CSS;
?>