<?php
/**
 * TGS Theme 2 Old Bookmarklet View
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 */

$page_owner_guid = elgg_get_page_owner_guid();

if (!$page_owner_guid) {
	$page_owner_guid = elgg_get_logged_in_user_guid();
}


$url = elgg_get_site_url() . "bookmarks/bookmarklet/{$page_owner_guid}";

echo "<h3><span style='color: red;'>*</span> " . elgg_echo('bookmarklet:oldversion', array($url)) . "</h3><br />";