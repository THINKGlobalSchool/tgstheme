<?php
/**
 * Filtrate CSS
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */
?>

#filtrate-menu-container {
	background: none repeat scroll 0 0 #EEEEEE;
    padding: 11px;
    width: auto;
}

#filtrate-menu-container > ul > li label { 
	margin-right: 7px;
}

#filtrate-menu-container > ul > li {
	display: inline-block;
	margin-right: 10px;
	margin-bottom: 4px;
}

#filtrate-menu-container  li input {
	font-size: 90%;
	height: 24px;
	width: 92px;
	border: 1px solid #AAAAAA;
}

#filtrate-menu-container .chosen-container.chosen-container-multi > ul > li input{
	height: auto;
	font-size: 100%;
}

ul.filtrate-menu-extras {
	border-top: 1px dotted #CCC;
	overflow: auto;
}

ul.filtrate-menu-advanced {
	border-top: 1px dotted #CCC;
	padding-top: 4px;
	display: none;
}

ul.filtrate-menu-extras > li {
	float: left;
	margin-bottom: 0 !important;
}

ul.filtrate-menu-extras > li.elgg-menu-item-sort {
	float: right;
}

.filtrate-show-advanced.advanced-off:after,
.filtrate-sort.descending:after {
	content: " ▼";
	font-size: 9px;
	text-decoration: none;
}

.filtrate-show-advanced.advanced-on:after,
.filtrate-sort.ascending:after  {
	content: " ▲";
	text-decoration: none;
}

#filtrate-content-container .elgg-ajax-loader {
	margin-top: 20px;
}

span.filtrate-clear-icon {
	position: relative;
}

span.filtrate-clear-icon span {
	position: absolute;
	display: block;
	top: 4px;
	right: 5px;
	width: 9px;
	height: 9px;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/x-sprite.png) no-repeat 0 0;
	cursor: pointer;
	display: none;
}

span.filtrate-clear-icon span:hover {
	background-position: 0px -11px;
}

span.filtrate-clear-icon input {
	padding-right: 16px;
}

#filtrate-menu-container .chosen-disabled a {
	color: #EEEEEE;
}