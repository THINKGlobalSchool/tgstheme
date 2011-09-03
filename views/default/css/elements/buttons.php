<?php
/**
 * CSS buttons
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* **************************
	BUTTONS
************************** */

/* Base */
.elgg-button {
	font-size: 14px;
	font-weight: normal;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;

	width: auto;
	padding: 2px 4px;
	cursor: pointer;
	outline: none;
	
	/*-webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.40);
	-moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.40);
	box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.40);*/

	font-family: 'Shanti', sans-serif;
	text-transform:uppercase;

}
a.elgg-button {
	padding: 3px 6px;
}


/* ------ Submit Button ------ */

.elgg-button-submit {
	color: white;		
	text-decoration: none;
	border:1px solid #85161D;
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-red.png) repeat-x bottom left #E72139;
}

.elgg-button-submit:hover {
	border:1px solid #85161D;
	text-decoration: none;
	color: #CCCCCC;	
	background:url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-red.png) repeat-x bottom left #BD1429;
}

.elgg-button-submit.elgg-state-disabled {
	background: #999;
	border-color: #999;
	cursor: default;
}


/* ------ Cancel Button ------ */

.elgg-button-cancel {
	color: #FFFFFF;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-grey.png) repeat-x bottom left #C2C2C2;
	border: 1px solid #999999;
}
.elgg-button-cancel:hover {
	color: #444;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-grey.png) repeat-x bottom left #999999;	
	text-decoration: none;
}


/* ------ Action Button ------ */

.elgg-button-action {
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-med-grey.png) repeat-x bottom left #F8F8F8;
	border:1px solid #999999;
	color: #2D3F46;
	padding: 2px 15px;
	text-align: center;
	font-weight: normal;
	text-decoration: none;
	cursor: pointer;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	
	/*-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;*/
}

.elgg-button-action:hover,
.elgg-button-action:focus {	
	color: #FFFFFF;
	text-decoration: none;
	border: 1px solid #2D3F46;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-dark-grey.png) repeat-x bottom left #506B76;
}


/* ------ Delete Button ------ */

.elgg-button-delete {
	color: #FFFFFF;
	text-decoration: none;
	border: 1px solid #2D3F46;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-dark-grey.png) repeat-x bottom left #506B76;	
}
.elgg-button-delete:hover {
	color: #999;
	border: 1px solid #2D3F46;
	background: url(<?php echo elgg_get_site_url(); ?>mod/tgstheme/_graphics/button-dark-grey.png) repeat-x bottom left #333333;
	text-decoration: none;
}

/* ------ Dropdown Button------ */

.elgg-button-dropdown {
	padding:3px 6px;
	text-decoration:none;
	display:block;
	font-weight:bold;
	position:relative;
	margin-left:0;
	color: white;
	border:1px solid #91131E;
	background:#91131E;
	
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
	
	-webkit-box-shadow: 0 0 0;
	-moz-box-shadow: 0 0 0;
	box-shadow: 0 0 0;
	
	/*background-image:url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png);
	background-position:-150px -51px;
	background-repeat:no-repeat;*/
}

.elgg-button-dropdown:after {
	content: " \25BC ";
	font-size:smaller;
}

.elgg-button-dropdown:hover {
	border:1px solid #CCCCCC;
	background-color:#CCCCCC;
	text-decoration:none;
}

.elgg-button-dropdown.elgg-state-active {
	background: #ccc;
	outline: none;
	color: #333;
	border:1px solid #ccc;
	
	-webkit-border-radius:4px 4px 0 0;
	-moz-border-radius:4px 4px 0 0;
	border-radius:4px 4px 0 0;
}
