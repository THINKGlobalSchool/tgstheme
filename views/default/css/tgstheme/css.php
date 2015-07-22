<?php
/**
 * TGS Theme CSS
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2015
 * @link http://www.thinkglobalschool.org/
 *
 **/

?>
/** <style> /**/

/** Float helpers **/
.float-right {
	float: right;
}

.float-left {
	float: left;
}

/** General topbar tweaks **/

.elgg-topbar-dropdown:after {
	content: "▼";
	font-size: 8px;
	margin-left: 4px;
	position: relative;
	bottom: 2px;
}

.elgg-topbar-avatar.elgg-topbar-dropdown:after {
	bottom: 6px;
	font-size: 10px;
}


.elgg-menu-item-spot-logo {
	margin-right: 12px;
}

.elgg-menu-item-explore > ul .elgg-menu-content,
.elgg-menu-item-explore > ul > li {
	width: 100%;
}

/** Custom sidebars **/
.elgg-home-sidebar {
	position: relative;
	padding: 20px 10px 10px 10px;
	float: left;
	width: 400px;
	margin: 0 0 10px 0;
}

.elgg-layout-one-sidebar-home,
.elgg-layout-one-sidebar-roles-home {
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sidebar_background.gif) repeat-y left top;
}

.elgg-layout-one-sidebar-home {
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sidebar_background.gif) repeat-y left top;
}

.elgg-layout-one-sidebar-alt {
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sidebar_background_right.gif) repeat-y left top;
}

/** End custom sidebars **/

/** Style roles homepage **/

.elgg-layout-one-sidebar-roles-home {
	padding: 0;
}
.elgg-layout-one-sidebar-roles-home #elgg-widget-col-2 {
	float: left;
	width: 420px;
	padding-top: 15px;
}

.elgg-layout-one-sidebar-roles-home #elgg-widget-col-1 {
	width: 570px;
	padding-top: 15px;
	float: right;
}

.elgg-layout-one-sidebar-roles-home .elgg-module-widget {
	margin: 0 10px 15px;
}

/** End roles homepage styles **/

/** TGSTheme profile **/

table.tgstheme-profile {
	width: 100%;
	-moz-box-shadow: 0 0 2px #000;
	-webkit-box-shadow: 0 0 2px #000;
	box-shadow: 0 0 2px #000;
	margin-bottom: 5px;
	border: 1px solid #AAA;
}

table.tgstheme-profile .profile-left {
	width: 100px;
}

table.tgstheme-profile .profile-right {
	
}

.tgstheme-profile-icon {
	border: 5px solid #FFF;
}

.tgstheme-profile-links {
	text-align: right;
	font-size: 11px;
	margin-top: 4px;
}

.tgstheme-module {
	background: #FFF;
}

.elgg-module.tgstheme-module {
	margin-bottom: 0;
}

table#tgstheme-profile-stats {
	height: 111px;
	border-top: none;
}

table#tgstheme-profile-stats tbody tr:first-child td {
	border-top: none;
}

table#tgstheme-profile-stats tbody tr:last-child td {
	border-bottom: none;
}

table#tgstheme-profile-stats tbody tr td:last-child {
	border-right: none;
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

/** End TGSTheme profile **/

/** Modules **/

/** By default, don't add a margin for modules within modules on homepage **/
.elgg-layout-one-sidebar-roles-home .elgg-module .elgg-module {
	margin-bottom: 0;
}

.elgg-layout-one-sidebar-roles-home .elgg-module .elgg-module {
	
}

.elgg-widget-instance-announcements.elgg-module .elgg-module {
	margin-bottom: 5px;
}

.tgstheme-profile-module {
	border: 0;
	border-radius: 0;
}

.tgstheme-groups-module {
	padding-bottom: 15px;
}

.tgstheme-profile-module .elgg-body {
	padding: 0px;
}

/** End Modules **/

/** Group listings **/

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

/** End group listings **/

/** Widget  menus **/
.elgg-menu-widget > li.elgg-menu-item-extra-tooltip,
.elgg-menu-widget > li.elgg-menu-item-river-view-all,
.elgg-menu-widget > li.elgg-menu-item-groups-view-all,
.elgg-menu-widget > li.elgg-menu-item-todo-view-all {
	float: left;
	position: relative;
	right: 6px;
	top: 2px;
	width: auto;
}

.elgg-menu-widget > li.elgg-menu-item-extra-tooltip a,
.elgg-menu-widget > li.elgg-menu-item-river-view-all a,
.elgg-menu-widget > li.elgg-menu-item-groups-view-all a,
.elgg-menu-widget > li.elgg-menu-item-groups-view-all a {
	display: block;
}

.elgg-widget-instance-tgstheme_extra ul.elgg-menu-widget,
.elgg-widget-instance-tgstheme_river ul.elgg-menu-widget,
.elgg-widget-instance-tgstheme_groups ul.elgg-menu-widget,
.elgg-widget-instance-todo ul.elgg-menu-widget {
	float: right;
}

/** End Widget menus **/

/** Stats **/

table#stats-table td.label {
	text-shadow: 1px 1px 1px #AAAAAA;
}

table#stats-table td.stat {
	font-weight: bold;
	color: #800518;
}

/** End Stats **/

/** Profile Tweaks **/

#profile-owner-block ul.elgg-menu {
	margin-top: 15px;
}

/** End Profile Tweaks **/

/** Parentportal **/
.parentportal-header-two-column {
	padding-top: 10px;
}

/** End Parentportal **/

/** Spot Logo **/
.spot-logo {
	position: absolute;
	left: 0;
}

/** End Spot Logo **/

/** Likes Tweaks **/
.elgg-menu .elgg-menu-item-likes-count {
	margin-left: 15px !important; 
}
/** End Likes Tweaks **/

/* Custom menu tweaks */
#custommenu {
	margin-top: -4px;
}

#custommenu ul.elgg-menu {
	margin-top: -2px;
}



/** Share form **/

.tgstheme-share-email-module {
	width: 500px;
}

.tgstheme-share-email-from {
	color: #999;
}

.tgstheme-share-email-from:focus {
	border: 1px solid #CCCCCC;
	box-shadow: none;
	-moz-box-shadow: none;
	-webkit-box-shadow: none;
	color: #999999;
}

#email-to-users  {
	width: 500px;
}

/** Fancybox Overrides **/

#fancybox-wrap {
	z-index: 9002 !important;
}

#fancybox-loading {
	z-index: 9003 !important;
}

/** Home page modules **/

.home-popup { 
	position: absolute;
	border: 1px solid #bbb;
    background-color: #fff;
    width: 200px;
	padding: 5px;
	height: auto;
	top: -2em;
	text-align: left;
	display: block;
}

.home-small {
	font-size: 85% !important; 
}

/** Publish module **/
.elgg-module-publish {
/*	border-radius: 6px;*/
	height: auto;
	overflow: visible;
	margin-bottom: 0px;
	margin-top: 4px;
}

.elgg-module-publish > .elgg-head {
	background: none repeat scroll 0 0 #E4E4E4;
	border-radius: 3px 3px 0 0;
	padding: 5px;
}

.elgg-module-publish .tgstheme-publish-more-menu {
	border-top: 2px solid #DDD;
	display: none;
}

.elgg-module-publish .tgstheme-publish-more-menu ul {
	padding: 12px;
	column-count: 2;
	-moz-column-count: 2;
	-webkit-column-count: 2;
	column-gap: 0px;
	-moz-column-gap: 0px;
	-webkit-column-gap: 0px;
}

.elgg-module-publish .tgstheme-publish-more-menu > ul > li {
/*	border-left: 2px solid #CCCCCC;*/
	color: #555555;
	display: block;
	font-weight: bold;
	padding-left: 8px;
	cursor: pointer;
}

.elgg-module-publish .tgstheme-publish-more-menu > ul > li:hover {
/*	border-left: 2px solid #888;*/
	background: #999;
	text-decoration: none;
	color: #FFF;
}

.elgg-module-publish .tgstheme-publish-item {
	float: left;
	/*padding: 0 15px 5px;*/
	cursor: pointer;
	/*margin-top: 3px;*/
	margin-bottom: 3px;
	text-align: center;
	width: 16.5%;

	/** Fade effect **/
	opacity: 0.8;
	transition: opacity .25s ease-in-out;
	-moz-transition: opacity .25s ease-in-out;
	-webkit-transition: opacity .25s ease-in-out;
}

.elgg-module-publish .tgstheme-publish-item img {
	width: 70%;
/*	height: 40px;*/
}

.elgg-module-publish .tgstheme-publish-item:hover {
	opacity: 1;
/*	border-top: 3px solid #888;*/
	border-bottom: 3px solid #888;
	margin: 0;
}

.elgg-module-publish .tgstheme-publish-item > span {
	display: block;
/*	font-weight: bold;*/
	text-align: center;
	font-size: 11.5px;
}

.elgg-module-publish .tgstheme-publish-item:hover > span {
	color: #111111;
}

.elgg-module-publish .publish-more {
	color: #555555;
	cursor: pointer;
	text-transform: uppercase;
	display: block;
	float: right;
	padding: 8px;
}

.elgg-module-publish .publish-more-closed:after {
	content: " \25BC";
	font-size: smaller;
}

.elgg-module-publish .publish-more-open:after {
	content: " \25B2";
	font-size: smaller;
}

/** End Publish Module **/

/** User name topbar style **/
.tgstheme-topbar-username {
	margin-left: 10px;
	float: right;
}

.elgg-menu-topbar .elgg-menu-topbar-dropdown > li > a {
	font-weight: normal;
	padding: 6px 10px;
	font-family: 'Shanti', sans-serif;
	text-transform:uppercase;
	font-size:1em;	
	
	background: white;
	color: #555;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
	
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}

/** Search tweaks **/
.elgg-menu-item-search {
	padding-right: 10px;
}

/** Topbar settings menu **/
.elgg-menu-item-profile {
	height: 35px;
}

.elgg-menu-item-profile .elgg-child-menu {
	display: none;
	position: absolute;
	right: -1px;
	top: 32px;
	width: auto;
	z-index: 1;
	min-width: 180px;
	border: 1px solid #999;
	border-top: 0;
	
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
	
	-webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
}

.elgg-menu-item-profile:hover > .elgg-child-menu {
	display: block;
}

.elgg-menu-item-profile .elgg-child-menu > li:last-child > a {
	border-bottom: none;
}

.elgg-menu-item-profile .elgg-child-menu > li > a {
	border-bottom: 1px dotted #CCCCCC;
	background: white;
	color: #555;
	font-family: 'Shanti',sans-serif;
	font-size: 1em;
	font-weight: normal;
	padding: 6px 10px;
	text-transform: uppercase;

	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;

	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}

.elgg-menu-item-profile .elgg-child-menu > li > a:hover {
	background: #2D3F46;
	color: white;
}

.elgg-menu-item-profile .elgg-child-menu > li > a > span.elgg-icon {
	vertical-align: top;
	margin-top: 0;
}

@-moz-document url-prefix() {
    .elgg-menu-item-profile .elgg-child-menu > li > a > span.elgg-icon {
       vertical-align: middle;
       margin-top: -2px;
    }
}

/** Tweaks for topbar settings icons **/
.elgg-menu-item-profile .elgg-child-menu .elgg-icon-settings {
	background-position: 0 -972px;
}

.elgg-menu-item-profile .elgg-child-menu > li:last-child > a,
.elgg-menu-item-profile .elgg-child-menu > li:last-child > a:hover {
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.elgg-menu-item-profile .elgg-child-menu > li > a:hover {
    text-decoration: none;
}

/** Messages Topbar **/
.elgg-menu-item-messages a {
	padding: 2px 8px 0 15px !important;
}

/** Ajax topbar **/
.elgg-page-topbar > .elgg-inner {
	display: none;
}

.parentportal-header .elgg-search-header {
	right: 15px;
}

.elgg-search.tgstheme-search-topbar .elgg-icon-search {
	top: 0px;
}

/** Experimental Topbar Layout **/
.elgg-page-topbar > .elgg-inner {
	height: 60px;
	padding: 0px;
}

.elgg-page-topbar > .elgg-inner > ul {
	height: 60px;
}

.elgg-page-topbar > .elgg-inner > ul > li {
	height: 44px;
	top: 16px;
}

.elgg-menu-topbar > li {
	height: 40px;
}

.elgg-menu-topbar > li > a.spot-topbar-logo {
	height: 40px;
	margin: 0;
	padding: 0;
	position: relative;
	top: -6px;
}

/** Wrangle in all the topbar menus **/
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown,
.elgg-menu-topbar > li > ul.elgg-child-menu,
.elgg-menu-topbar > li #todo-topbar-hover,
.elgg-menu-topbar > li #groups-topbar-hover,
.elgg-menu-topbar > li .dropdown-wrapper,
#login-dropdown-box {
	top: 40px;
	border: 2px solid #999;
	/*display: block !important;*/
/*	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;*/
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
	-webkit-box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);
	box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.25);
}
/** Start notch **/
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:after,
.elgg-menu-topbar > li > ul.elgg-child-menu:after,
.elgg-menu-topbar > li #todo-topbar-hover:after,
.elgg-menu-topbar > li #groups-topbar-hover:after,
.elgg-menu-topbar > li .dropdown-wrapper:after,
#login-dropdown-box:after,
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:before,
.elgg-menu-topbar > li > ul.elgg-child-menu:before,
.elgg-menu-topbar > li #todo-topbar-hover:before,
.elgg-menu-topbar > li #groups-topbar-hover:before,
.elgg-menu-topbar > li .dropdown-wrapper:before,
#login-dropdown-box:before {
	bottom: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:after,
.elgg-menu-topbar > li > ul.elgg-child-menu:after,
.elgg-menu-topbar > li #todo-topbar-hover:after,
.elgg-menu-topbar > li #groups-topbar-hover:after,
.elgg-menu-topbar > li .dropdown-wrapper:after,
#login-dropdown-box:after {
	border-color: rgba(255, 255, 255, 0);
	border-bottom-color: #FFF;
	border-width: 15px;
	left: 50%;
	margin-left: 51px;
}
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:before,
.elgg-menu-topbar > li > ul.elgg-child-menu:before,
.elgg-menu-topbar > li #todo-topbar-hover:before,
.elgg-menu-topbar > li #groups-topbar-hover:before,
.elgg-menu-topbar > li .dropdown-wrapper:before,
#login-dropdown-box:before {
	border-color: rgba(153, 153, 153, 0);
	border-bottom-color: #999;
	border-width: 18px;
}
/** Profile notch **/
.elgg-menu-topbar > li.elgg-menu-item-profile > ul.elgg-child-menu:before {
	left: 50%;
	margin-left: 45px;
}
.elgg-menu-topbar > li.elgg-menu-item-profile > ul.elgg-child-menu:after {
	left: 50%;
	margin-left: 48px;
}
/** Groups notch **/
.elgg-menu-topbar > li.elgg-menu-item-my-groups > ul.elgg-child-menu:before {
	left: 0;
	margin-left: 47px;
}
.elgg-menu-topbar > li.elgg-menu-item-my-groups > ul.elgg-child-menu:after {
	left: 0;
	margin-left: 50px;
}
/** Todo notch **/
.elgg-menu-topbar > li.elgg-menu-item-todo > ul.elgg-child-menu:before {
	left: 0;
	margin-left: 40px;
}
.elgg-menu-topbar > li.elgg-menu-item-todo > ul.elgg-child-menu:after {
	left: 0;
	margin-left: 43px;
}
/** Browse notch **/
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:before,
.elgg-menu-topbar > li > div.dropdown-wrapper:before {
	left: 0;
	margin-left: 20px;
}
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown:after,
.elgg-menu-topbar > li > div.dropdown-wrapper:after {
	left: 0;
	margin-left: 23px;
}
/** Login notch **/
#login-dropdown-box:before {
	left: 50%;
	margin-left: 48px;
}
#login-dropdown-box:after {
	left: 50%;
	margin-left: 51px;
}
#login-dropdown-box {
	overflow: visible;
	z-index: 9001;
}

/** End notch **/

.elgg-menu-topbar > li > ul.elgg-child-menu li:last-child > a,
.elgg-menu-topbar > li > ul.elgg-child-menu > li:last-child > a:hover,
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown > li:last-child > a,
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown > li:last-child > a:hover,
.elgg-menu-topbar > li #groups-topbar-hover ul li:last-child {
	border-radius: 0px;
}

/** Reset borders on menu items **/
.elgg-menu-topbar > li > a,
.elgg-menu-item-search,
.elgg-menu-item-home {
	border-left: none;
	border-right: none;
}

/** Set border right on topbar li's **/
.elgg-menu-topbar > li {
	/*border-right: 1px solid #DB1730;*/
}

.elgg-menu-topbar > li:last-child {
	border-right: none;
}

.elgg-page-topbar {
	/** Firefox v3.6+ **/
	background-image:-moz-linear-gradient(50% 0% -180deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%); 
	/** safari v4.0+ and by Chrome v3.0+ **/
	background-image:-webkit-gradient(linear,50% 0%,50% 100%,color-stop(0, rgb(171,51,45)),color-stop(1, rgb(127,19,25)));
	/** Chrome v10.0+ and by safari nightly build*/
	background-image:-webkit-linear-gradient(-90deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%);
	/** Opera v11.10+ **/
	background-image:-o-linear-gradient(-180deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%);
	/** IE v10+ **/
	background-image:-ms-linear-gradient(-180deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%);
	background-image:linear-gradient(-180deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%);
	height: 60px;
	-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffab332d,endColorstr=#ff7f1319,GradientType=0)";
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffab332d,endColorstr=#ff7f1319,GradientType=0);
}

/** END Experimental Topbar Layout **/

/** Tidypics **/
.elgg-menu-item-tagging {
	background-position: 0 -1260px !important;
}

div.tidypics-upload-image-element .tidypics-upload-image-progress .tidypics-upload-image-progress-bar {
	background: darkred !important;
}

/** iframe **/
body#elgg-iframe-body {
	background: transparent;
	overflow: hidden;
}

#publish-overlay {
	background-color: #FFFFFF;
	opacity: 0.9;
}

div#elgg-iframe-wrapper {
	width: 400px;
}

div#elgg-iframe-content {
	background: none repeat scroll 0 0 #FFFFFF;
	border: 1px solid #999999;
	box-shadow: 0 0 4px #666666;
	margin-left: auto;
	margin-right: auto;
	padding: 10px;
	position: relative;
	top: 100px;
	width: 750px;
	overflow-y: scroll;
	max-height: 80%;
}

div#elgg-iframe-content hr {
	background: none repeat scroll 0 0 #CCC;
	border: medium none;
	color: #CCC;
	height: 1px;	
}

/** Fix for: https://github.com/Elgg/Elgg/issues/5336 **/
span.message.warning {
	color: #777777;
	display: inline-block;
	font-weight: bold;
	margin-bottom: 7px;
}

/** iframe tweaks **/
body#elgg-iframe-body .ui-widget-overlay {
	background: none !important;
}

body#elgg-iframe-body .ui-dialog.ui-widget {
	z-index: 9010 !important;
}

/** Fix for simplekaltura flash object **/
body#elgg-iframe-body object#simplekaltura-uploader {
	width: 100%;
	height: 33px;
}

body#elgg-iframe-body #googleapps-docs-container {
	min-height: 450px;
}

/** Tabbed profile tweaks **/
.tabbed-profile .elgg-tabs {
	padding-left: 0px;
}

.profile-tab {
	width: auto;
	float: none;
}

/** Custom 'filter dropdown' input **/
.tgstheme-filter-dropdown {
	display: inline-block;
	margin-left: 8px;
}

.tgstheme-filter-dropdown label {
	margin-right: 5px;
	text-transform: uppercase;
	font-size: 0.9em;
	color: #333;
}

.tgstheme-filter-dropdown .elgg-input-dropdown {}

/** Custom title menu link **/
.tgstheme-custom-title-link,
.bookmarks-extender-bookmarklet-title {
	padding: 3px;
}

/** General sort menu **/
.menu-sort {
	font-size: 10px;
	font-weight: bold;
	color: #333;
	text-transform: uppercase;
}

/**	Forum modules **/
.forum-topic .forum-reply .elgg-module-featured {
	border: 1px solid #CCCCCC; 
	
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 0px;
	margin: 0;
	padding: 0;
}
.forum-topic .forum-reply .elgg-module-featured > .elgg-head {
	padding: 5px;
}
.forum-topic .forum-reply .elgg-module-featured > .elgg-head * {
	color: white;
	font-family: 'Shanti', sans-serif;
}

.forum-topic .forum-reply .elgg-module-featured > .elgg-head .forum-reply-subtext a {
	font-style: normal;
}

.forum-topic .forum-reply .elgg-module-featured > .elgg-body {
	padding: 10px;
}

/** Activity menu filters **/
#activity-type-filter {
	width: 200px;
}

#activity-tag-filter {
	width: 125px !important;
}

.elgg-menu-item-switch-mode {
	float: right;
}

.elgg-menu-item-switch-mode a {
	font-weight: bold;
	font-size: 0.85em;
	text-transform: uppercase;
}

/** Group tweaks **/
.elgg-form-groups-search .elgg-input-search {
	margin-right: 4px;
    width: 75%;
}

.elgg-form-groups-search .elgg-button-submit {

}

/** Mentions tweaks **/
.mentions-user-icon {
	display: inline;
	padding: 0;
	margin: 0 5px 2px 0;
	vertical-align: middle !important;
}

.mentions-user-link:hover {
	text-decoration: none;
}

.mentions-user-link {
	display: inline-block;
	padding: 5px;
	border: 1px solid #ccc;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
}

.mentions-user-link span {

}

.mentions-user-link span:before {
	content: "@";
}

.mentions-user-link:hover,
.elgg-output a.mentions-user-link:hover {
	color: white;
	background-color: #999;
}

.elgg-output a.mentions-user-link {
	border-bottom: 1px solid #ccc;
	font-weight: normal;
}

/** Colorbox tweaks **/
#cboxLoadedContent {
	padding: 3px;
}

/* Social Menu */
.tgstheme-social-menu-center {
	float:left;
	width:100%;
	overflow:hidden;
	position:relative;
}

.elgg-menu-social-menu {
	clear:left;
	float:left;
	list-style:none;
	margin:0;
	padding:0;
	position:relative;
	left:50%;
	text-align:center;
}

.elgg-menu-social-menu .elgg-menu-social-menu-item {
	display:block;
	float:left;
	list-style:none;
	margin: 0px 5px 8px;
	padding:0;
	position:relative;
	right:50%;
}

.elgg-menu-social-menu .elgg-menu-social-menu-item span {
	display: inline-block;
	width: 41px;
	height: 41px;
	background-size: 41px 41px;

}
.elgg-menu-social-menu .sociocon-facebook {
	background: white url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sociocon/facebook-sociocon.png") no-repeat;
}

.elgg-menu-social-menu .sociocon-twitter {
	background: white url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sociocon/twitter-sociocon.png") no-repeat;
}

.elgg-menu-social-menu .sociocon-youtube {
	background: white url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sociocon/youtube-sociocon.png") no-repeat;
}

.elgg-menu-social-menu .sociocon-flickr {
	background: white url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sociocon/flickr-sociocon.png") no-repeat;
}

.elgg-menu-social-menu .sociocon-rss {
	background: white url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sociocon/rss-sociocon.png") no-repeat;
}

.elgg-menu-social-menu .sociocon-instagram {
	background: white url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sociocon/instagram-sociocon.png") no-repeat;
}

.elgg-menu-social-menu .sociocon-tagboard {
	background: white url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sociocon/tagboard-sociocon.png") no-repeat;
}

button#cboxClose {
	border: 0;
}

/** Group profile widget(s) **/
.tgstheme-group-profile-top-widget {
	margin-left: 0;
	margin-right: 0;
}

.tgstheme-group-profile-top-widget .elgg-module-publish {
	width: 380px;
	margin-left: auto;
	margin-right: auto;
}

/** Login box tweaks **/
.elgg-body > .tgstheme-login-box {
	width: 40%;
}
/** Role Profile/Dashboard/Widgets **/
.elgg-layout-one-sidebar-roles-home.border-top div#elgg-widget-col-2 {
	border-top: 2px solid #AAA;
}

.elgg-layout-one-sidebar-roles-home.border-top div#elgg-widget-col-1 {
	border-top: 2px solid #DDD;
}

.elgg-layout-one-sidebar-roles-home .elgg-widget-instance-profile_content_groups > .elgg-head {
	display: none;
}

.profile-content-groups-filter-container .elgg-menu-owner-block {
	column-count: 2;
	-moz-column-count: 2;
	-webkit-column-count: 2;
}

.profile-content-groups-filter-container .elgg-menu-entity {
	display: none;
}

.elgg-widget-instance-profile_portfolio .tagdashboards-recommended-button {
	margin-right: 4px;
}