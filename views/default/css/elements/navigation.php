<?php
/**
 * Navigation
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

/* ***************************************
	PAGINATION
*************************************** */
.elgg-pagination {
	margin: 10px 0;
	display: block;
	text-align: center;
}
.elgg-pagination li {
	display: inline;
	margin: 0 6px 0 0;
	text-align: center;
}
.elgg-pagination a, .elgg-pagination span {
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	
	padding: 2px 6px;
	color: #FFFFFF;
	border: 1px solid #2D3F46;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-dark-grey.png) repeat-x bottom left #506B76;
	font-size: 12px;
}
.elgg-pagination a:hover {
	color: #999;
	border: 1px solid #2D3F46;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-dark-grey.png) repeat-x bottom left #333333;
	text-decoration: none;
}
.elgg-pagination .elgg-state-disabled span {
	color: #CCCCCC;
	border-color: #CCCCCC;
	background:none;
}
.elgg-pagination .elgg-state-selected span {
	border:1px solid #85161D;
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-red.png) repeat-x bottom left #BD1429;
}

/* ***************************************
	TABS
*************************************** */
.elgg-tabs {
	margin-bottom: 5px;
	border-bottom: 2px solid #cccccc;
	display: table;
	width: 100%;
}
.elgg-tabs li {
	float: left;
	border: 2px solid #ccc;
	border-bottom: 0;
	background: #eee;
	margin: 0 0 0 10px;
	
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
}
.elgg-tabs a {
	text-decoration: none;
	display: block;
	padding: 3px 10px 0 10px;
	text-align: center;
	height: 21px;
	color: #999;
}
.elgg-tabs a:hover {
	background: #dedede;
	color: #4690D6;
}
.elgg-tabs .elgg-state-selected {
	border-color: #ccc;
	background: white;
}
.elgg-tabs .elgg-state-selected a {
	position: relative;
	top: 2px;
	background: white;
}

/* ***************************************
	BREADCRUMBS
*************************************** */
.elgg-breadcrumbs {
	font-size: 80%;
	font-weight: bold;
	line-height: 1.2em;
	color: #bababa;
	text-transform: uppercase;
}
.elgg-breadcrumbs > li {
	display: inline-block;
}
.elgg-breadcrumbs > li:after{
	content: "\003E";
	padding: 0 4px;
	font-weight: normal;
}
.elgg-breadcrumbs > li > a {
	display: inline-block;
	color: #999;
}
.elgg-breadcrumbs > li > a:hover {
	color: #91131E;
	text-decoration: underline;
}

.elgg-main .elgg-breadcrumbs {
	position: relative;
	top: -6px;
	left: 0;
}

/* ***************************************
	TOPBAR MENU
*************************************** */
.elgg-menu-topbar {
	float: left;
}

.elgg-menu-topbar > li {
	float: left;
	font-family: 'Shanti', sans-serif;
	text-transform:uppercase;
	font-size:1em;
	font-weight:normal;
}

.elgg-menu-topbar > li > a {
	padding: 2px 15px 0;
	color: #FFFFFF;
	margin-top: 1px;	
}

/* ***************************************
	TOPBAR BORDERS 
*************************************** */

.elgg-menu-item-administration > a { border-right:1px solid #DB1730; }
.elgg-menu-item-usersettings > a { border-right:1px solid #DB1730; }
.elgg-menu-item-friends > a { border-right:1px solid #DB1730; }
.elgg-menu-item-messages > a { border-right:1px solid #DB1730; }

/****************************************/

.elgg-menu-topbar > li > a:hover {
	color: #CCCCCC;
	text-decoration: none;
}

.elgg-menu-topbar-alt {
	float: right;
	font-family: 'Shanti', sans-serif;
	text-transform:uppercase;
	font-size:1em;
	font-weight:normal;
}

.elgg-menu-topbar .elgg-icon {
	vertical-align: middle;
	margin-top: -1px;
}

.elgg-menu-topbar > li > a.elgg-topbar-logo {
	margin-top: 0;
	padding-left: 5px;
	width: 38px;
	height: 20px;
}

.elgg-menu-topbar > li > a.elgg-topbar-avatar {
	height: 18px;
}

/* ***************************************
	SITE MENU
*************************************** */
.elgg-menu-site {
	z-index: 1;
}

.elgg-menu-site > li > a {
	font-weight: normal;
	padding: 6px 10px 0px 10px;
	height: 30px;
	font-family: 'Shanti', sans-serif;
	text-transform:uppercase;
	font-size:1em;	
}

.elgg-menu-site > li > a:hover {
	text-decoration: none;
}


.elgg-menu-site-default {
	position: absolute;
	bottom: 0;
	left: 360px;
	height: 40px;
}

.elgg-menu-site-default > li {
	float: left;
	margin-right: 1px;
}

.elgg-menu-site-default > li > a {color: white}


.elgg-menu-site-default > .elgg-state-selected > a,
.elgg-menu-site-default > li:hover > a {
	background:#85161D;
	color: #FFFFFF;
	
	-webkit-box-shadow: 2px -1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 2px -1px 1px rgba(0, 0, 0, 0.25);
	box-shadow: 2px -1px 1px rgba(0, 0, 0, 0.25);
	
	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0;
}

.elgg-menu-site-more {
	display: none;
	position: relative;
	left: -1px;
	width: 100%;
	z-index: 1;
	min-width: 150px;
	border: 1px solid #999;
	border-top: 0;
	
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
	
	-webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
}

li:hover > .elgg-menu-site-more {
	display: block;
}

.elgg-menu-site-more > li > a {
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
.elgg-menu-site-more > li > a:hover {
	background: #2D3F46;
	color: white;
}
.elgg-menu-site-more > li:last-child > a,
.elgg-menu-site-more > li:last-child > a:hover {
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.elgg-more > a:before {
	content: "\25BC";
	font-size: smaller;
	margin-right: 4px;
}

/** HACKED IN TO RIGHT JUSTIFY THE MORE (browse) MENU **/

.elgg-menu-more-right {
    bottom: 0px;
    float: right;
    left: 850px;
    position: absolute;
}

/** END HACKS **/

/* ***************************************
	TITLE
*************************************** */
.elgg-menu-title {
	float: right;
}

.elgg-menu-title > li {
	display: inline-block;
	margin-left: 4px;
}

/* ***************************************
	FILTER MENU
*************************************** */
.elgg-menu-filter {
	margin-bottom: 5px;
	/*border-bottom: 1px solid #2D3F46;*/
	display: table;
	width: 100%;
	text-transform:uppercase;
	font-family: 'Shanti',sans-serif;
	font-size:90%;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/filter-back.jpg) left top;
}
.elgg-menu-filter > li {
	float: left;
	border: 1px solid #2D3F46;
	border-bottom: 0;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-dark-grey.png) repeat-x bottom left #506B76;
	margin: 6px 0 0 10px;
	
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
}
.elgg-menu-filter > li:hover {
	background: #dedede;
}
.elgg-menu-filter > li > a {
	text-decoration: none;
	display: block;
	padding: 3px 10px 0;
	text-align: center;
	height: 21px;
	color: #FFFFFF;
}
.elgg-menu-filter > li > a:hover {
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-red.png) repeat-x bottom left #E72139;
	color: #FFFFFF;
}
.elgg-menu-filter > .elgg-state-selected {
	border-color: #85161D;
	background: #BD1429;
}
.elgg-menu-filter > .elgg-state-selected > a {
	position: relative;
	text-decoration: none;
	color: #FFFFFF;	
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-red.png) repeat-x bottom left #BD1429;
}

/* ***************************************
	PAGE MENU
*************************************** */
.elgg-menu-page {
	margin-bottom: 15px;
}

/* ------ NEW BUTTONS ------ */

.elgg-menu-page a {
	display: block;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	
	color: #2D3F46;
	border: 1px solid #999999;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-med-grey.png) repeat-x bottom left #F8F8F8;	
	margin: 0 0 6px 0;
	padding: 3px 4px 2px 8px;
    font-family: 'Shanti',sans-serif;
    font-size: 100%;
    text-transform: uppercase;
}
.elgg-menu-page a:hover {
	color: #FFFFFF;
	border: 1px solid #2D3F46;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-dark-grey.png) repeat-x bottom left #506B76;
	text-decoration: none;
}

.elgg-menu-page li.elgg-state-selected > a {
	border:1px solid #85161D;
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-red.png) repeat-x bottom left #E72139;
	color: #FFFFFF;	
}

/* --------------------------- */


.elgg-menu-page .elgg-child-menu {
	display: none;
	margin-left: 15px;
}
.elgg-menu-page .elgg-menu-closed:before, .elgg-menu-opened:before {
	display: inline-block;
	padding-right: 4px;
}
.elgg-menu-page .elgg-menu-closed:before {
	content: "\002B";
}
.elgg-menu-page .elgg-menu-opened:before {
	content: "\002D";
}

/* ***************************************
	HOVER MENU
*************************************** */
.elgg-menu-hover {
	display: none;
	position: absolute;
	z-index: 10000;

	width: 165px;
	border: solid 1px;
	border-color: #E5E5E5 #999 #999 #E5E5E5;
	background-color: #FFF;
	
	-webkit-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
	-moz-box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
	box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.50);
}
.elgg-menu-hover > li {
	border-bottom: 1px solid #ddd;
}
.elgg-menu-hover > li:last-child {
	border-bottom: none;
}
.elgg-menu-hover .elgg-heading-basic {
	display: block;
}
.elgg-menu-hover a {
	padding: 2px 8px;
	font-size: 92%;
}
.elgg-menu-hover a:hover {
	background: #ccc;
	text-decoration: none;
}
.elgg-menu-hover-admin a {
	color: red;
}
.elgg-menu-hover-admin a:hover {
	color: white;
	background-color: red;
}

/* ***************************************
	FOOTER
*************************************** */
.elgg-menu-footer > li,
.elgg-menu-footer > li > a {
	display: inline-block;
	color:#999;
}

.elgg-menu-footer > li:after {
	content: "\007C";
	padding: 0 4px;
}

.elgg-menu-footer-default {
	float: right;
}

.elgg-menu-footer-alt {
	float: left;
}

/* ***************************************
	ENTITY
*************************************** */
<?php // height depends on line height/font size ?>
.elgg-menu-entity {
	float: right;
	margin-left: 15px;
	font-size: 90%;
	color: #aaa;
	line-height: 16px;
	height: 16px;
}
.elgg-menu-entity > li {
	margin-left: 15px;
}
.elgg-menu-entity > li > a {
	color: #91131E;
}

.elgg-menu-entity > li > a:hover {
	color: #2D3F46;
}

<?php // need to override .elgg-menu-hz ?>
.elgg-menu-entity > li > a {
	display: block;
}
.elgg-menu-entity > li > span {
	vertical-align: baseline;
}

/* ***************************************
	OWNER BLOCK
*************************************** */
.elgg-menu-owner-block li a {
	display: block;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	
	color: #2D3F46;
	border: 1px solid #999999;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-med-grey.png) repeat-x bottom left #F8F8F8;	
	margin: 0 0 6px 0;
	padding: 3px 4px 2px 8px;
    font-family: 'Shanti',sans-serif;
    font-size: 100%;
    text-transform: uppercase;
}
.elgg-menu-owner-block li a:hover {
	color: #FFFFFF;
	border: 1px solid #2D3F46;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-dark-grey.png) repeat-x bottom left #506B76;
	text-decoration: none;
}
.elgg-menu-owner-block li.elgg-state-selected > a {
	border:1px solid #85161D;
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-red.png) repeat-x bottom left #E72139;
	color: #FFFFFF;	
}

/* ***************************************
	LONGTEXT
*************************************** */
.elgg-menu-longtext {
	float: right;
}

/* ***************************************
	RIVER
*************************************** */
.elgg-menu-river {
	float: right;
	margin-left: 15px;
	font-size: 90%;
	color: #aaa;
	line-height: 16px;
	height: 16px;
}
.elgg-menu-river > li {
	display: inline-block;
	margin-left: 5px;
}
.elgg-menu-river > li > a {
	color: #aaa;
	height: 16px;
}
<?php // need to override .elgg-menu-hz ?>
.elgg-menu-river > li > a {
	display: block;
}
.elgg-menu-river > li > span {
	vertical-align: baseline;
}

/* ***************************************
	SIDEBAR EXTRAS (rss, bookmark, etc)
*************************************** */
.elgg-menu-extras {
	margin-bottom: 15px;
}