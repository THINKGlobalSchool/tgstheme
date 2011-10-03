<?php
/**
 * TGS Theme 2 Admin CSS
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 */
?>

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
	Image Block
*************************************** */
.elgg-image-block {
	padding:0;		
	margin:0 0 10px 0;	
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
	color: #666;
}

.elgg-menu-entity > li > a:hover {
	color: #333;
}

<?php // need to override .elgg-menu-hz ?>
.elgg-menu-entity > li > a {
	display: block;
}
.elgg-menu-entity > li > span {
	vertical-align: baseline;
}

/** Hide likes from admin **/
.elgg-menu-item-likes {
	display: none !important;
}
