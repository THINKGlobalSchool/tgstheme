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
	height: 75px;
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/back-header-full.jpg) no-repeat;
	
}
.elgg-page-default .elgg-page-body > .elgg-inner {
	width: 990px;
	margin: 0 auto;
}
.elgg-page-default .elgg-page-footer > .elgg-inner {
	width: 990px;
	height:90px;
	margin: 0 auto;
	padding: 10px 0 0 0;		
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/back-footer-full.png) no-repeat;	
}

.elgg-page-footer:after {
	content:none;
}

/***** QUICKBAR *****/

.elgg-page-quickbar {
	/* Firefox v3.6+ */
	background-image:-moz-linear-gradient(50% 0% -180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%); 
	/* safari v4.0+ and by Chrome v3.0+ */
	background-image:-webkit-gradient(linear,50% 0%,50% 167%,color-stop(0, rgb(55,72,79)),color-stop(1, rgb(29,40,45)));
	/* Chrome v10.0+ and by safari nightly build*/
	background-image:-webkit-linear-gradient(-180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%);
	/* Opera v11.10+ */
	background-image:-o-linear-gradient(-180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%);
	/* IE v10+ */
	background-image:-ms-linear-gradient(-180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%);
	background-image:linear-gradient(-180deg,rgb(55,72,79) 0%,rgb(29,40,45) 100%);
	height:18px;
	-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#ff37484f,endColorstr=#ff1d282d,GradientType=0)";
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#ff37484f,endColorstr=#ff1d282d,GradientType=0);

	position: relative;
	height: 18px;
	z-index: 9001;
}
.elgg-page-quickbar > .elgg-inner {
	padding: 0 2px;
	width: 990px;
	margin:auto;
}

/***** TOPBAR ******/
.elgg-page-topbar {
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/back-top.jpg) repeat-x top left;
	position: relative;
	height: 40px;
	z-index: 9000;
}
.elgg-page-topbar > .elgg-inner {
	padding: 9px 10px;
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
	height: 75px;
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
	background: transparent url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/sidebar_background_left.gif) repeat-y right top;
}
.elgg-layout-two-sidebar {
	background: transparent url(<?php echo elgg_get_site_url(); ?>_graphics/two_sidebar_background.gif) repeat-y right top;
}
/*.elgg-sidebar {
	position: relative;
	padding: 20px 10px;
	float: right;
	width: 210px;
	margin: 0 0 0 10px;
}*/

.elgg-sidebar {
	position: relative;
	padding: 10px;
	float: left;
	width: 210px;
	margin: 10px 0 0 0;
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
	border-right: 1px solid #DEDEDE;
}
.elgg-main > .elgg-head {
	padding-bottom: 3px;
	border-bottom: 1px solid #CCCCCC;
	margin-bottom: 10px;
}

.elgg-home-right{
	background:none;
	border-right: 0px;
}

/***** PAGE FOOTER ******/
.elgg-page-footer {
	position: relative;
    height: 100px;
    padding:0;
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/back-footer.png) repeat-x;
}
.elgg-page-footer {
	color: #999;
}
.elgg-page-footer a:hover {
	color: #FFF;
}