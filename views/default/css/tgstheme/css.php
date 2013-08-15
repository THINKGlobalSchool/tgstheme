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
	display: inline-block;
	color:white;
	font-weight: bold;
	padding:1px 8px 2px 24px;
	margin-top:9px;
	cursor: pointer;
	background: red url("<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/refresh.png") no-repeat 5px 3px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
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
	-moz-box-shadow: 0 0 2px #000;
	-webkit-box-shadow: 0 0 2px #000;
	box-shadow: 0 0 2px #000;
	margin-bottom: 5px;
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

.tgstheme-profile-module .elgg-body {
	padding: 0px;
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

/* PROFILE TWEAK */

#profile-owner-block ul.elgg-menu {
	margin-top: 15px;
}

/* Parentportal */
.parentportal-header-two-column {
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

.entity_anchor_hidden {
	display: none !important;
}

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

.elgg-menu-entity-buttons {
	float: none;
	height: auto;
	margin-top: 11px;
}

.elgg-menu-entity-core {
	height: auto;
	float: none;
	text-align: left;
	width: 100%;
	border-bottom: 1px dotted #CDCDCD;
	padding-bottom: 4px;
}

.elgg-menu-entity-core.core-only-child {
	border-bottom: none;
	padding-bottom: 0px;
}

.elgg-menu-entity-core li {
	margin-left: 0;
	margin-right: 15px;
}

.elgg-menu-entity-hidden {
	display: none;
}

.elgg-menu-entity-actions {
	height: auto;
	float: none;
	margin-top: 8px;
	margin-bottom: 8px;
	text-align: left;
}

.elgg-menu-entity-actions li {
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/elgg_sprites.png) no-repeat left;
	background-position: 0 -1008px;
	height: 16px;
	margin-top: 5px;
}

.elgg-menu-entity-actions li:hover {
	background-position: 0 -990px;
}

.elgg-menu-entity-actions li a {
	margin-left: 20px;
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
	padding: 8px 10px 4px;
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
	color: #333333;
	font-size: 11px !important;
	text-transform: uppercase !important;
}

.elgg-module-featured > .elgg-head .entity-action-toggler span {
	color: #333333;
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

/* Fancybox Overrides */

#fancybox-wrap {
	z-index: 9002 !important;
}

#fancybox-loading {
	z-index: 9003 !important;
}

/* Home page modules */

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
	border-radius: 6px;
	height: auto;
	overflow: visible;

	/* Firefox v3.6+ */
	background-image:-moz-linear-gradient(9% 0% -180deg,rgb(255,255,255) 0%,rgb(235,235,235) 99%,rgb(235,235,235) 100%); 
	/* safari v4.0+ and by Chrome v3.0+ */
	background-image:-webkit-gradient(linear,9% 0%,9% 50%,color-stop(0, rgb(255,255,255)),color-stop(0.99, rgb(235,235,235)),color-stop(1, rgb(235,235,235)));
	/* Chrome v10.0+ and by safari nightly build*/
	background-image:-webkit-linear-gradient(-180deg,rgb(255,255,255) 0%,rgb(235,235,235) 99%,rgb(235,235,235) 100%);
	/* Opera v11.10+ */
	background-image:-o-linear-gradient(-180deg,rgb(255,255,255) 0%,rgb(235,235,235) 99%,rgb(235,235,235) 100%);
	/* IE v10+ */
	background-image:-ms-linear-gradient(-180deg,rgb(255,255,255) 0%,rgb(235,235,235) 99%,rgb(235,235,235) 100%);
	background-image:linear-gradient(-180deg,rgb(255,255,255) 0%,rgb(235,235,235) 99%,rgb(235,235,235) 100%);

	/* Firefox v4.0+ , Safari v5.0+ , Chrome v4.0+ , Opera v10.5+  and by IE v9.0+ */
	-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffffff,endColorstr=#ffebebeb,GradientType=0)";
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffffffff,endColorstr=#ffebebeb,GradientType=0);

	margin-bottom: 0px;
	margin-top: 4px;
}

.elgg-module-publish > .elgg-head {
	background: none repeat scroll 0 0 #E4E4E4;
	border-radius: 3px 3px 0 0;
	padding: 5px;
}

.elgg-module-publish .tgstheme-publish-more-menu {
	padding: 12px;
	border-top: 2px solid #DDD;
	display: none;
	width: 550px;
}

.elgg-module-publish .tgstheme-publish-more-menu ul {
/*	column-count: 2;
	-moz-column-count: 2;
	-webkit-column-count: 2;
	column-gap: 0px;
	-moz-column-gap: 0px;
	-webkit-column-gap: 0px;*/
}

.elgg-module-publish .tgstheme-publish-more-menu > ul > li {
/*	border-left: 2px solid #CCCCCC;*/
	color: #555555;
	display: block;
	font-weight: bold;
	padding-left: 8px;
	width: 30%;
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
	padding: 0 15px 5px;
	cursor: pointer;
	/*margin-top: 3px;*/
	margin-bottom: 3px;
	text-align: center;

	/** Fade effect **/
	opacity: 0.8;
	transition: opacity .25s ease-in-out;
	-moz-transition: opacity .25s ease-in-out;
	-webkit-transition: opacity .25s ease-in-out;
}

.elgg-module-publish .tgstheme-publish-item img {
	width: 45px;
	height: 45px;
}

.elgg-module-publish .tgstheme-publish-item:hover {
	opacity: 1;
/*	border-top: 3px solid #888;*/
	border-bottom: 3px solid #888;
	margin: 0;
}

.elgg-module-publish .tgstheme-publish-item > span {
	display: block;
	font-weight: bold;
	text-align: center;
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

/** Wire post in publish module **/

.elgg-module-publish .tgstheme-publish-wire {

}

.elgg-module-publish .tgstheme-publish-wire > .elgg-head {
	margin-bottom: 0px;
}

.elgg-module-publish .tgstheme-publish-wire > .elgg-head h3 {
	font-size: 1em;
}

.elgg-module-publish .tgstheme-publish-wire > .elgg-body textarea {
	display: block;
    margin: 0;
    border-bottom: 1px solid #CCC;
}

.elgg-module-publish .tgstheme-publish-wire > .elgg-body .mts {
	background: none repeat scroll 0 0 #DDDDDD;
	border-bottom: 1px solid #CCCCCC;
    margin-top: 0;
    padding: 3px;
    text-align: right;
}

.elgg-module-publish .tgstheme-publish-wire > .elgg-body .mts input {
	padding: 0 8px;
	font-size: 12px;
}	

.elgg-module-publish .tgstheme-publish-wire > .elgg-body .mts select {
	position: relative;
	top: -1px;
}

.elgg-module-publish .tgstheme-publish-wire > .elgg-body .mts label {
	display: none;
}

.elgg-module-publish .tgstheme-publish-wire > .elgg-body .mts > .elgg-subtext {
	color: #555555;
	margin-bottom: 4px;
	text-align: left;
}

.elgg-module-publish .tgstheme-publish-wire > .elgg-head,
.elgg-module-publish .tgstheme-publish-wire textarea {
	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
}

.elgg-module-publish .tgstheme-publish-wire textarea {
	border-left: medium none;
	border-right: medium none;
}

/* experimental overrides */
table.tgstheme-profile {
    border-bottom: 1px solid #BBBBBB;
    box-shadow: none;
    margin-bottom: 0px;
    width: 100%;
}

.elgg-module-publish {
	margin-top: 0px;
}

/** End wire post in publish module **/

/** General topbar tweaks **/

.tgstheme-topbar-dropdown:after {
	content: "▼";
	font-size: 8px;
	margin-left: 4px;
	position: relative;
	bottom: 2px;
}

.elgg-topbar-avatar.tgstheme-topbar-dropdown:after {
	bottom: 6px;
	font-size: 10px;
}

/** User name topbar style **/
.tgstheme-topbar-username {
	margin-left: 10px;
	float: right;
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

.elgg-menu-item-profile .elgg-child-menu > li > a {
	border-bottom: 1px dotted #CCCCCC;
}

.elgg-menu-item-profile .elgg-child-menu > li:last-child > a {
	border-bottom: none;
}


.elgg-menu-item-profile .elgg-child-menu > li > a {
	background: white;
	color: #555;
	height:24px;
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

/** Tweaks for topbar settings icons **/
.elgg-menu-item-profile .elgg-child-menu .elgg-icon-settings {
	background-position: 0 -738px;
}

.elgg-menu-item-profile .elgg-child-menu > li:last-child > a,
.elgg-menu-item-profile .elgg-child-menu > li:last-child > a:hover {
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.elgg-menu-item-profile .elgg-child-menu > li > a {
    font-family: 'Shanti',sans-serif;
    font-size: 1em;
    font-weight: normal;
    height: 30px;
    padding: 6px 10px 0;
    text-transform: uppercase;
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

.elgg-menu-topbar li:hover  > .dropdown-wrapper,
.elgg-menu-topbar li:hover > .elgg-menu-topbar-dropdown {
	display: block;
}



/*.elgg-menu-topbar li > .elgg-menu-topbar-dropdown {
	position: absolute;
	display: none;
	display: block;
	z-index: 1;
	left: -1px;
	min-width: 280px;
	width: 100%;
	background: #FFF;

	-webkit-column-count: 2;
	-moz-column-count: 2;
	column-count: 2;

	-webkit-column-gap: 1px;
	-moz-column-gap: 1px;
	column-gap: 1px;

	-webkit-column-rule: 1px solid #DDD;
	-moz-column-rule: 0px;
	column-rule: 1px solid #DDD;
}*/

/* Multi column general styles */
.elgg-menu-topbar .dropdown-wrapper .dropdown-split {
	width: 50%;
	float: left;
}

/* Multi column style for explore item */
.elgg-menu-topbar .elgg-menu-item-explore .dropdown-wrapper {
	width: 280px;
}

/* Multi column style for my groups item */
.elgg-menu-topbar .elgg-menu-item-my-groups .dropdown-wrapper {
	width: 500px;
}

.elgg-menu-topbar .dropdown-wrapper .dropdown-split.split-first li {
	border-right: 1px solid #ccc;
}

.elgg-menu-topbar li > .elgg-menu-topbar-dropdown,
.elgg-menu-topbar .dropdown-wrapper {
	position: absolute;
	display: none;
	z-index: 1;
	left: -1px;
	background: #FFF;
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

.elgg-menu-topbar .elgg-menu-topbar-dropdown > li > a:hover {
	text-decoration: none;
	background: #2D3F46;
	color: white;
}


/*
.elgg-menu-topbar li > .elgg-menu-topbar-dropdown li {
	display: inline-block;
	width: 140px;
	margin-left: -1px;
}*/

.elgg-menu-item-my-groups .elgg-menu-topbar-dropdown li a div {
	display: table;
}

.elgg-menu-item-my-groups .elgg-menu-topbar-dropdown li a img {
	vertical-align: middle;
	display: inline-table;
	margin-right: 4px;
}

.elgg-menu-item-my-groups > .elgg-menu-topbar-dropdown li a span {
	white-space: nowrap;
	display: table-cell;
}

/** Crazy firefox hack **/
/*@-moz-document url-prefix() {
	.elgg-menu-topbar li > .elgg-menu-topbar-dropdown li {
		border-right: 1px solid #DDD;
		left: -1px;
		margin-left: 1px;
		width: 100%;
	}
}*/

.elgg-menu-topbar li > .elgg-menu-topbar-dropdown li:first-child {
	border-top: none;
}

.elgg-menu-item-spot-logo {
	margin-right: 12px;
}

/* Wrangle in all the topbar menus */
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

/* Start notch */
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

/* Profile notch */
.elgg-menu-topbar > li.elgg-menu-item-profile > ul.elgg-child-menu:before {
	left: 50%;
	margin-left: 45px;
}
.elgg-menu-topbar > li.elgg-menu-item-profile > ul.elgg-child-menu:after {
	left: 50%;
	margin-left: 48px;
}

/* Groups notch */
.elgg-menu-topbar > li #groups-topbar-hover:before {
	left: 0;
	margin-left: 47px;
}
.elgg-menu-topbar > li #groups-topbar-hover:after {
	left: 0;
	margin-left: 50px;
}

/* Todo notch */
.elgg-menu-topbar > li #todo-topbar-hover:before {
	left: 0;
	margin-left: 40px;
}
.elgg-menu-topbar > li #todo-topbar-hover:after {
	left: 0;
	margin-left: 43px;
}

/* Browse notch */
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

/* Login notch */
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

/* End notch */

.elgg-menu-topbar > li > ul.elgg-child-menu li:last-child > a,
.elgg-menu-topbar > li > ul.elgg-child-menu > li:last-child > a:hover,
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown > li:last-child > a,
.elgg-menu-topbar > li > ul.elgg-menu-topbar-dropdown > li:last-child > a:hover,
.elgg-menu-topbar > li #groups-topbar-hover ul li:last-child {
	border-radius: 0px;
}

/* Reset borders on menu items */
.elgg-menu-topbar > li > a,
.elgg-menu-item-search,
.elgg-menu-item-home {
	border-left: none;
	border-right: none;
}

/* Set border right on topbar li's */
.elgg-menu-topbar > li {
	/*border-right: 1px solid #DB1730;*/
}

.elgg-menu-topbar > li:last-child {
	border-right: none;
}

.elgg-page-topbar {
	/* Firefox v3.6+ */
	background-image:-moz-linear-gradient(50% 0% -180deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%); 
	/* safari v4.0+ and by Chrome v3.0+ */
	background-image:-webkit-gradient(linear,50% 0%,50% 100%,color-stop(0, rgb(171,51,45)),color-stop(1, rgb(127,19,25)));
	/* Chrome v10.0+ and by safari nightly build*/
	background-image:-webkit-linear-gradient(-90deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%);
	/* Opera v11.10+ */
	background-image:-o-linear-gradient(-180deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%);
	/* IE v10+ */
	background-image:-ms-linear-gradient(-180deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%);
	background-image:linear-gradient(-180deg,rgb(171,51,45) 0%,rgb(127,19,25) 100%);
	height: 60px;
	-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffab332d,endColorstr=#ff7f1319,GradientType=0)";
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ffab332d,endColorstr=#ff7f1319,GradientType=0);
}

/** END Experimental Topbar Layout **/

/** Tidypics **/
.elgg-menu-item-tagging {
	background-position: 0 -1044px !important;
}

div.tidypics-upload-image-element .tidypics-upload-image-progress .tidypics-upload-image-progress-bar {
	background: darkred !important;
}

/** Bookmarklet/iframe **/
body#elgg-bookmarklet-body,
body#elgg-iframe-body {
	background-color: transparent;
	overflow: hidden;
}

div#elgg-bookmarklet-wrapper,
div#elgg-iframe-wrapper  {
	width: 400px;
}

div#elgg-bookmarklet-form {
	padding: 10px;
}

div#elgg-iframe-content {
	padding: 5px; 
	width: 590px
}

/** Fix for: https://github.com/Elgg/Elgg/issues/5336 **/
span.message.warning {
	color: #777777;
	display: inline-block;
	font-weight: bold;
	margin-bottom: 7px;
}

/** Bookmarklet/iframe tweaks **/
body#elgg-iframe-body .ui-widget-overlay {
	background: none !important;
}

body#elgg-iframe-body .ui-dialog.ui-widget {
	z-index: 9010 !important;
}

/* Fix for simplekaltura flash object */
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
