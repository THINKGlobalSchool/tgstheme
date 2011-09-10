<?php
/**
 * Page Layout
 *
 * Contains CSS for the page shell and page layout
 *
 * Default layout: 990px wide, centered. Used in default page shell
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

/* ***************************************
	PAGE LAYOUT
*************************************** */
/***** DEFAULT LAYOUT ******/
<?php // the width is on the page rather than topbar to handle small viewports ?>
.elgg-page-default {
	min-width: 998px;
}
.elgg-page-default .elgg-page-header > .elgg-inner {
	width: 990px;
	margin: 0 auto;
	height:126px;
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/back-header-full.png) no-repeat;
	
}
.elgg-page-default .elgg-page-body > .elgg-inner {
	width: 990px;
	margin: 0 auto;
}
.elgg-page-default .elgg-page-footer > .elgg-inner {
	width: 990px;
	margin: 0 auto;
	padding: 5px 0;
}

/***** TOPBAR ******/
.elgg-page-topbar {
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/back-top.jpg) repeat-x top left;
	position: relative;
	height: 41px;
	z-index: 9000;
}
.elgg-page-topbar > .elgg-inner {
	padding: 10px 10px;
	width: 990px;
	margin:auto;
}

/***** PAGE MESSAGES ******/
.elgg-system-messages {
	position: fixed;
	top: 40px;
	right: 20px;
	max-width: 500px;
	z-index: 2000;
}
.elgg-system-messages li {
	margin-top: 10px;
}
.elgg-system-messages li p {
	margin: 0;
}

/***** PAGE HEADER ******/
.elgg-page-header {
	position: relative;
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/back-header.jpg) repeat-x;
	height:126px;
}
.elgg-page-header > .elgg-inner {
	position: relative;	
}

.logo{
	width:204px;
	height:216px;
	float:left;
}

/***** PAGE BODY LAYOUT ******/
.elgg-layout {
	min-height: 360px;
}
.elgg-layout-one-sidebar {
	background: transparent url(<?php echo elgg_get_site_url(); ?>_graphics/sidebar_background.gif) repeat-y right top;
}
.elgg-layout-two-sidebar {
	background: transparent url(<?php echo elgg_get_site_url(); ?>_graphics/two_sidebar_background.gif) repeat-y right top;
}
.elgg-sidebar {
	position: relative;
	padding: 20px 10px;
	float: right;
	width: 210px;
	margin: 0 0 0 10px;
}
.elgg-sidebar-alt {
	position: relative;
	padding: 20px 10px;
	float: left;
	width: 160px;
	margin: 0 10px 0 0;
}
.elgg-main {
	position: relative;
	min-height: 360px;
	padding: 20px 10px 10px 10px;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/logo-bottom.png) no-repeat;
}
.elgg-main > .elgg-head {
	padding-bottom: 3px;
	border-bottom: 1px solid #CCCCCC;
	margin-bottom: 10px;
}

.elgg-home-right{
	background:none;
}

/***** PAGE FOOTER ******/
.elgg-page-footer {
	position: relative;
	background: #000000;
    height: 130px;
	background-image:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/globe.png);
	background-repeat:repeat-y;
	background-position: center top;
}
.elgg-page-footer {
	color: #999;
}
.elgg-page-footer a:hover {
	color: #666;
}