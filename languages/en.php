<?php
/**
 * TGS Theme 2 English language file
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 * Composer code borrowed from Evan Winslow's Elgg Facebook Theme:
 * https://github.com/ewinslow/elgg-facebook_theme
 */

$english = array(
	// Generic
	'home' => 'Home',

	// Page titles 
	'tgstheme:title:home' => 'Home',

	// Labels
	'tgstheme:label:welcome' => 'Welcome, %s',
	'tgstheme:label:updated' => 'Updated:',
	'tgstheme:label:allgroups' => 'All Groups',
	'tgstheme:label:allmygroups' => 'All My Groups',
	'tgstheme:label:latestactivity' => 'Latest Activity',
	'tgstheme:label:viewprofile' => 'View profile',
	'tgstheme:label:spotstats' => 'Spot Stats',
	'tgstheme:label:terms' => 'Terms of Use',
	'tgstheme:label:policysuppliment' => 'Privacy Policy Suppliment',

	// Stats
	'tgstheme:stats:blog' => 'Blog Posts',
	'tgstheme:stats:photo' => 'Photos',
	'tgstheme:stats:todo' => 'Complete To Do\'s',
	'tgstheme:stats:bookmark' => 'Bookmarks',

	// Composer
	'composer:object:thewire' => "Mini Post",
	'composer:object:bookmarks' => "Bookmark",
	'composer:object:blog' => "Blog",
	'composer:annotation:messageboard' => "Post",
	'composer:object:file' => 'File',

	// River

	// Messages
	'mentions:notification_types:object:thewire' => 'a mini post',

	// Other content

	// Avatar overrides
	'avatar' => 'Profile Picture',
	'avatar:create' => 'Create your profile picture',
	'avatar:edit' => 'Edit profile picture',
	'avatar:preview' => 'Preview',
	'avatar:upload' => 'Upload a new profile picture',
	'avatar:current' => 'Current profile picture',
	'avatar:crop:title' => 'Profile picture cropping tool',
	'avatar:upload:instructions' => "Your profile picture is displayed throughout the site. You can change it as often as you'd like. (File formats accepted: GIF, JPG or PNG)",
	'avatar:create:instructions' => 'Click and drag a square below to match how you want your profile picture cropped. A preview will appear in the box on the right. When you are happy with the preview, click \'Create your profile picture\'. This cropped version will be used throughout the site as your profile picture.',
	'avatar:upload:success' => 'Profile picture successfully uploaded',
	'avatar:upload:fail' => 'Profile picture upload failed',
	'avatar:resize:fail' => 'Resize of the profile picture failed',
	'avatar:crop:success' => 'Cropping the profile picture succeeded',
	'avatar:crop:fail' => 'Profile picture cropping failed',
	'river:update:user:avatar' => '%s has a new profile picture',
);

add_translation('en',$english);
