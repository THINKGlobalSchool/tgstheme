<?php
/**
 * Layout Object CSS
 *
 * Image blocks, lists, tables, gallery, messages
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* <style> /**/

/* ***************************************
	Image Block
*************************************** */
.elgg-image-block {
	padding: 0;		
	margin: 4px 0 6px 0;	
}

.elgg-image-block h3 a{	
	color:#91131E;
}

.elgg-image-block .elgg-image {
	float: left;
	margin:2px 6px 0 10px;
	padding:1px 0 0 1px;
}
.elgg-image-block .elgg-image-alt {
	float: right;
	margin-left: 5px;
}

/* ***************************************
	Image Block - Group Badge
****************************************/

#badge .elgg-image-block {
	padding:8px 0 8px 0;
	border: 1px solid #85161D;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/badge-back.png) repeat-x bottom left #DD2036;
	background-image: linear-gradient(-180deg, #AB332D 80%, #7F1319 100%);
	min-height:34px;

/*	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0;*/

	margin:0 0 6px 0;	
	padding-right: 4px;
}

#badge.elgg-owner-block-profile .elgg-image-block {
	padding: 4px 0;
}

#badge.elgg-owner-block-profile .elgg-image-block.elgg-group-image-block {
	padding: 0 4px 4px 0;
}

#badge.elgg-owner-block-profile .elgg-image-block.elgg-group-image-block h3 {
	font-size: 1.3em;
	line-height: 1.1em;
	margin-bottom: 2px;
}

#badge.elgg-owner-block-profile .elgg-subtext > a {
	color: #FFF;
}

#badge.elgg-owner-block-profile hr {
	background: none repeat scroll 0 0 #FFFFFF;
	border: medium none;
	color: #FFFFFF;
	height: 1px;
}

#badge .elgg-image-block  h3 a{	
	color:#FFFFFF;
}

#badge .elgg-image-block .elgg-image {
	float: left;
	margin:2px 6px 0 10px;
	padding:1px 0 0 1px;
	background:#FFFFFF;
	width:26px;
	height:26px;
}

#badge.elgg-owner-block-profile .elgg-image-block .elgg-image {
	margin: 0 0 2px 3px;
	padding:1px 0 0 1px;
	background:#FFFFFF;
	width: 181px;
	height: 181px;
	float: none;
}

#badge.elgg-owner-block-profile .elgg-image-block .elgg-image .elgg-avatar img {
/*	width: 180px !important;
	height: 180px !important;*/
	background-size: auto 180px !important;
}

#badge.elgg-owner-block-profile .elgg-image-block .elgg-image .elgg-avatar-large img {
	height: 180px;
	width: 180px;
}

#badge.elgg-owner-block-profile .elgg-image-block > .elgg-body {
	padding: 3px 4px 2px;
}

#badge.elgg-owner-block-profile .elgg-image-block > .elgg-body > h3 {
	padding-left: 2px;
}

#badge .elgg-subtext {
	color: #EEEEEE;
	font-size: 85%;
	line-height: 1.2em;
	font-style: italic;
}

.elgg-image-block .elgg-image-alt {
	float: right;
	margin-left: 5px;
}

#badge > .elgg-body {
/*	border-radius: 0 0 4px 4px;
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;*/

    border-color: #666666;
    border-style: solid;
    border-width: 0 1px 1px;
    margin-top: -6px;
	padding-top: 2px;

	background: #FFFFFF;

	-moz-box-shadow:inset 0px 0px 5px #BBB;
	-webkit-box-shadow:inset 0px 0px 5px #BBB;
	box-shadow:inset 0px 0px 5px #BBB; 
}


/* ***************************************
	List
*************************************** */
.elgg-list {
	border-top: 1px dotted #CCCCCC;
	margin: 5px 0;
	clear: both;
}
.elgg-list > li {
	border-bottom: 1px dotted #CCCCCC;
}

.elgg-item .elgg-subtext {
	margin-bottom: 5px;
}
.elgg-item .elgg-content {
	margin: 10px 5px;
}

/* ***************************************
	Gallery
*************************************** */
.elgg-gallery {
	border: none;
	margin-right: auto;
	margin-left: auto;
}
.elgg-gallery td {
	padding: 5px;
}
.elgg-gallery-fluid > li {
	float: left;
}
.elgg-gallery-users > li {
	margin: 0 2px;
}

/* ***************************************
	Tables
*************************************** */
.elgg-table {
	width: 100%;
	border-top: 1px solid #ccc;
}
.elgg-table td, .elgg-table th {
	padding: 4px 8px;
	border: 1px solid #ccc;
}
.elgg-table th {
	background-color: #ddd;
}
.elgg-table tr:nth-child(odd), .elgg-table tr.odd {
	background-color: #fff;
}
.elgg-table tr:nth-child(even), .elgg-table tr.even {
	background-color: #f0f0f0;
}
.elgg-table-alt {
	width: 100%;
	border-top: 1px solid #ccc;
}
.elgg-table-alt th {
	background-color: #eee;
	font-weight: bold;
}
.elgg-table-alt td, .elgg-table-alt th {
	padding: 2px 4px 2px 4px;
	border-bottom: 1px solid #ccc;
}
.elgg-table-alt td:first-child {
	width: 200px;
}
.elgg-table-alt tr:hover {
	background: #E4E4E4;
}

/* ***************************************
	Owner Block
*************************************** */
.elgg-owner-block {
	margin-bottom: 20px;
}

/* ***************************************
	Messages
*************************************** */
.elgg-message {
	color: white;
	font-weight: bold;
	display: block;
	padding: 3px 10px;
	cursor: pointer;
	opacity: 0.9;
	
	-webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45);
	-moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45);
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45);
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
}
.elgg-state-success {
	background-color: black;
	border: 2px solid white;
}
.elgg-state-error {
	background-color: red;
	border: 2px solid white;
}
.elgg-state-notice {
	background-color: #666666;
	padding-bottom: 5px;
}

/* ***************************************
	River
*************************************** */
.elgg-list-river {
	border-top: 1px solid #CCC;
}
.elgg-list-river > li {
	border-bottom: 1px solid #CCC;
}
.elgg-river-item {
	padding: 7px 0;
}
.elgg-river-item .elgg-pict {
	margin-right: 20px;
}
.elgg-river-timestamp {
	color: #666;
	font-size: 85%;
	font-style: italic;
	line-height: 1.2em;
}

.elgg-river-attachments,
.elgg-river-message,
.elgg-river-content {
	border-left: 1px solid #CCC;
	font-size: 85%;
	line-height: 1.5em;
	margin: 8px 0 5px 0;
	padding-left: 5px;
}
.elgg-river-attachments .elgg-avatar,
.elgg-river-attachments .elgg-icon {
	float: left;
}
.elgg-river-layout .elgg-input-dropdown {
	float: right;
	margin: 10px 0;
}

.elgg-river-comments-tab {
	display: block;
	background-color: #EEE;
	color: #91131E;
	margin-top: 5px;
	width: auto;
	float: right;
	font-size: 85%;
	padding: 1px 7px;
	border-radius: 5px 5px 0 0;
}

<?php //@todo components.php ?>
.elgg-river-comments {
	margin: 0;
	border-top: none;
}
.elgg-river-comments li:first-child {
	border-radius: 5px 0 0;
}
.elgg-river-comments li:last-child {
	border-radius-bottomleft: 0 0 5px 5px;
}
.elgg-river-comments li {
	background-color: #EEE;
	border-bottom: none;
	padding: 4px;
	margin-bottom: 2px;
}
.elgg-river-comments .elgg-media {
	padding: 0;
}
.elgg-river-more {
	background-color: #EEE;
	border-radius: 5px;	
	padding: 2px 4px;
	font-size: 85%;
	margin-bottom: 2px;
}

<?php //@todo location-dependent styles ?>
.elgg-river-item form {
	background-color: #EEE;
	padding: 4px;
	border-radius: 5px;	
	height: 30px;
}
.elgg-river-item input[type=text] {
	width: 80%;
}
.elgg-river-item input[type=submit] {
	margin: 0 0 0 10px;
}


/* **************************************
	Comments (from elgg_view_comments)
************************************** */

.elgg-river-item .elgg-form-comment-save {
	height: auto;
}

.elgg-comments {
	margin-top: 25px;
}

.elgg-comments .elgg-list {
	border-top: 0;
}

.elgg-comments .elgg-list > li {
	border-top: 1px solid #CCCCCC;
	border-bottom: 0;
}

.elgg-comments .elgg-list > li .elgg-output p {
	font-size: 95%;
}

.elgg-comments .elgg-list > li > .elgg-image-block {
	margin: 4px 0 0;
	padding: 0 0 8px;
}

.elgg-comments .elgg-list > li:nth-child(odd) {
	background: #EEEEEE;
}

.elgg-comments > form {
	margin-top: 15px;
}

/* ***************************************
	Image-related
*************************************** */
.elgg-photo {
	border: 1px solid #ccc;
	padding: 3px;
	background-color: white;
}

/* ***************************************
	Tags
*************************************** */
.elgg-tags {
	font-size: 85%;
}
.elgg-tags > li {
	float:left;
	margin-right: 5px;
}
.elgg-tags li.elgg-tag:after {
	content: ",";
}
.elgg-tags li.elgg-tag:last-child:after {
	content: "";
}
.elgg-tagcloud {
	text-align: justify;
}
