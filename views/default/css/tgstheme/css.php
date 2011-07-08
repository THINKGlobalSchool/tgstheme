<?php
/**
 * TGS Theme 2 CSS
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */
?>

.elgg-right-sidebar {
	position: relative;
	padding: 10px 10px;
	float: left;
	width: 400px;
	margin: 0 0 10px 0;
}

.elgg-layout-one-sidebar-right {
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sidebar_background.gif) repeat-y left top;
}

.tgs-footer {
	background: #aaa;
	width: 100%;
	padding: 5px;
	color: #222222;
	font-size: 10px;
}

table.tgstheme-profile {
	width: 100%;
}

table.tgstheme-profile .profile-left {
	width: 100px;
}

table.tgstheme-profile .profile-right {
	padding-left: 10px;
}

.tgstheme-profile-icon {
	margin-bottom: 5px;
	border: 5px solid #FFF;
	-moz-box-shadow: 0 0 4px #000;
	-webkit-box-shadow: 0 0 4px #000;
	box-shadow: 0 0 4px #000;
}

table#tgstheme-profile-stats td {
	font-weight: bold;
}

table#tgstheme-profile-stats td.label {
	color: #333333;
}

table#tgstheme-profile-stats td.stat {
	color: #800518;
}