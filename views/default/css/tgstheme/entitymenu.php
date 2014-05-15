<?php
/**
 * TGS Theme Entity Menu CSS
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2014
 * @link http://www.thinkglobalschool.com/
 *
 **/
?>
/** <style> /**/

/** Entity Menu **/
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
	background-position: 0 -972px;
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
	background-position: 0 -1224px;
	height: 16px;
	margin-top: 5px;
}

.elgg-menu-entity-actions li:hover {
	background-position: 0 -1206px;
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
    /** ie6 height fix **/
    font-size: 0;
    line-height: 0;
     /** ie6 transparent fix **/
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

/** End Entity Menu **/