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

// Primary items (plugin conditional)
if (elgg_is_active_plugin('tidypics')) {
	$photos = "<div class=\"tgstheme-publish-item _tp-uploader\" data-context=\"addphotos\">
		<img src=\"$img_path/photo-icon.png\">
		<span>Photo</span>
	</div>";
}
if (elgg_is_active_plugin('simplekaltura')) {
	$simplekaltura = "<div class=\"tgstheme-publish-item clickable\" data-type=\"video\">
		<img src=\"$img_path/video-icon.png\">
		<span>Video</span>
	</div>";
}


$user_guid = elgg_get_logged_in_user_guid();

// Secondary items
if (elgg_is_active_plugin('googleapps')) {
	$googledoc = "<li class='clickable' data-type='googledoc'>Google Doc</li>";
}

if (elgg_is_active_plugin('readinglist')) {
	$book = "<li class='clickable' data-type='book'>Book</li>";
}

if (elgg_is_active_plugin('podcasts')) {
	$podcast = "<li class='clickable' data-type='podcast'>Podcast</li>";	
}

if (elgg_is_active_plugin('polls')) {
	$poll = "<li class='clickable' data-type='poll'>Poll</li>";		
}

if (elgg_is_active_plugin('rss')) {
	$rss = "<li class='clickable' data-type='rss'>RSS Feed</li>";			
}

if (elgg_is_active_plugin('tagdashboards')) {
	$tagdashboard = "<li class='clickable' data-type='tagdashboard'>Tag Dashboard</li>";				
}

if (elgg_is_active_plugin('webvideos')) {
	$webvideo = "<li class='clickable' data-type='webvideo'>Web Video</li>";				
}

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
	$photos
	<div class="tgstheme-publish-item clickable" data-type='file'>
		<img src="$img_path/file-icon.png">
		<span>File</span>
	</div>
	<div class="tgstheme-publish-item clickable" data-type='bookmark'>
		<img src="$img_path/bookmark-icon.png">
		<span>Bookmark</span>
	</div>
	$simplekaltura
	<div class='clearfix'></div>
	<span class='publish-more publish-more-closed'>more</span>
	<div class='clearfix'></div>
	<div class="tgstheme-publish-more-menu">
		<ul>
			$book
			$googledoc
			<li class='clickable' data-type='page'>Page</li>
			$podcast
			$poll
			$rss
			$tagdashboard
			$webvideo
		</ul>
	</div>
HTML;

echo elgg_view_module('publish', '', $publish_content);
?>