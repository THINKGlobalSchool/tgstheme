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

.tgstheme-profile-links {
	text-align: right;
	font-size: 11px;
	margin-top: 4px;
}

.tgstheme-module {
	background: #FFF;
}

.tgstheme-group-listing {
	clear: both;
	border-bottom: 1px solid #ccc;
	padding: 5px;
}

.tgstheme-group-icon {
	float: left;
	margin-right: 10px;
}

.tgstheme-group-info {
	float: left;
	width: 50%;
}

.tgstheme-group-updated {
	float: right;
	text-align: right;
}

.tgstheme-group-updated .time-updated {
	font-weight: bold;
	color: #888;
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

/* ***************************************
    COMPOSER
*************************************** */

/* These menus always make room for icons: */
.elgg-menu-composer li > a > .elgg-icon {
	margin-left: -20px;
	margin-right: 4px;
	vertial-align: middle;
}

.elgg-menu-composer {
	display:inline-block;
	height: 22px;
}

.elgg-menu-composer > li {
	font-weight:bold;
	margin-left: 10px;
}

.elgg-menu-composer > li > a {
	line-height: 16px;
	padding-left: 20px;
}

.elgg-menu-composer > li > a:hover {
	text-decoration: underline;
}

.elgg-menu-composer > li.ui-state-active > a {
	cursor: default;
	color: black;
	text-decoration: none;
}

.elgg-menu-composer > .ui-state-active > a:before,
.elgg-menu-composer > .ui-state-active > a:after {
	position: absolute;
	display: block;
	border-width: 8px;
	border-style: solid;
	content: " ";
	height: 0;
	width: 0;
	left: 0;
}

.elgg-menu-composer > .ui-state-active > a:before {
	top: 11px;
	border-color: transparent transparent #B4BBCD transparent;
}

.elgg-menu-composer > .ui-state-active > a:after {
	top: 12px;
	border-color: transparent transparent white transparent;
}

/* NEW PAGE COMPONENT: COMPOSER */

.ui-tabs-hide {
	display:none;
}

.elgg-composer {
}

.elgg-composer > .ui-tabs-panel {
	margin-top: 5px;
	border: 1px solid #B4BBCD;
	padding: 10px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
}
