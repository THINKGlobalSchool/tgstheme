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

#activity-updates a.update_link {
	display: inline-table;
	color:white;
	font-weight: bold;
	padding:1px 8px 2px 24px;
	margin-top:9px;
	cursor: pointer;
	background: red url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/refresh.png") no-repeat 5px 3px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
}
#activity-updates a.update_link:hover {
	background: #4690D6 url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/refresh.png") no-repeat 5px -22px;
	color:white;
	text-decoration: none;
}

.elgg-right-sidebar {
	position: relative;
	padding: 20px 10px 10px 10px;
	float: left;
	width: 400px;
	margin: 0 0 10px 0;
	background:url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/logo-bottom.png") no-repeat;
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
	text-align:right;
	padding-right:10px;
}

table#tgstheme-profile-stats td.stat {
	color: #91131E;
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
	font-family: 'Shanti', sans-serif;
	text-transform:uppercase;
	font-size:1em;
	font-weight:normal;
}

.elgg-menu-composer > li {
	font-weight:normal;
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

/* STATS */

table#stats-table td.label {
	text-shadow: 1px 1px 1px #AAAAAA;
}

table#stats-table td.stat {
	font-weight: bold;
	color: #800518;
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

/* Remove icon padding for home menu */

.elgg-menu-item-home .elgg-icon {
	margin-right: 0px;
}

/* PROFILE TWEAK */

#profile-owner-block ul.elgg-menu {
	margin-top: 15px;
}

/* Parentportal */
.parentportal-header-two-column {
	background:url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/logo-bottom.png") no-repeat;
	padding-top: 10px;
}

/* Spot Logo */
.spot-logo {
	position: absolute;
	left: 0;
}

/* Likes Tweak */
.elgg-menu .elgg-menu-item-likes-count {
	margin-left: 15px !important; 
}

/* Custom menu tweaks */
#custommenu {
	margin-top: -4px;
}

#custommenu ul.elgg-menu {
	margin-top: -2px;
}

/* Entity Menu Improvements */

.tgstheme-entity-menu {
	float: right;
	height: 25px;
}

.tgstheme-entity-menu .tgstheme-entity-menu-actions {
	display: none;
}

.tgstheme-entity-menu-actions .elgg-menu-entity {
	margin-left: 0px;
}

.elgg-icon-settings-menu {
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/elgg_sprites.png) no-repeat left;
	width: 16px;
	height: 16px;
	background-position: 0 -738px;
	float: right;
	margin-left: 5px;
}

.elgg-menu-entity-hidden {
	display: none;
}

.elgg-menu-entity-actions {
	
}

.tgstheme-entity-menu-actions .notch {
    position: absolute;
    top: -10px;
    right: 3px;
    margin: 0;
    border-top: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #FFFFFF;
    padding: 0;
    width: 0;
    height: 0;
    /* ie6 height fix */
    font-size: 0;
    line-height: 0;
     /* ie6 transparent fix */
    _border-right-color: pink;
    _border-left-color: pink;
    _filter: chroma(color=pink);
}

.tgstheme-entity-menu-actions .border-notch { 
	border-bottom-color: #333333; top: -11px;
}

.tgstheme-entity-menu-actions {
	background-color: #FFFFFF;
	border: 1px solid #999999;
	box-shadow: 0 0 2px #BBBBBB;
	-webkit-box-shadow: 0 0 2px #BBBBBB;
	-moz-box-shadow: 0 0 2px #BBBBBB;
	min-height: 24px;
	padding-bottom: 4px;
	padding-right: 10px;
	padding-top: 8px;
	position: absolute;
	z-index: 9004;
}

span.actions-caret {
	position: relative;
	bottom: 1px;
	margin-left: 3px;
}

span.actions-text {
	border-right: 1px dotted #999999;
	padding-right: 3px;
}

.entity-action-toggler {
	font-size: 1em;
	padding: 3px 3px 3px 5px !important;
}

.entity-action-toggler span {
	color: #333333 !important;
	font-size: 11px !important;
	text-transform: uppercase !important;
}

.entity-action-toggler:hover span, 
.entity-action-toggler:focus span {
	color: #FFFFFF !important;
}

/* Owner Block Improvements */
#tgstheme-ownerblock-sidebar-menu {
	min-height: 24px;
}

#tgstheme-ownerblock-sidebar-menu-full {
	display: none;
}

.ownerblock-show-more, .ownerblock-show-less {
	background: #666666;
	color: white;
	text-align: right;
	font-size: 0.8em;
	border-radius: 10px 0 0 0;
	float: right;
	margin-top: 2px;
}

.ownerblock-show-more:after {
	font-size: smaller;
	content: "\25BC";
}

.ownerblock-show-less:after {
	font-size: smaller;
	content: "\25B2";
}

.ownerblock-show-more:hover, .ownerblock-show-less:hover {
	background: #444444 !important;
	color: white !important;
}

#tgstheme-ownerblock-sidebar-menu ul li.elgg-menu-item-more-ownerblock,
#tgstheme-ownerblock-sidebar-menu ul li.elgg-menu-item-less-ownerblock {
	position: inherit;
}
