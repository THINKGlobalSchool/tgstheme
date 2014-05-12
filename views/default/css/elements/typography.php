<?php
/**
 * CSS typography
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* <style> /**/

/* ***************************************
	Typography
*************************************** */
body {
	font-size: 80%;
	line-height: 1.4em;
	font-family: "Lucida Grande", Arial, Tahoma, Verdana, sans-serif;
	color: #333333;
}

a {
	color: #91131E;
}

a:hover,
a.selected { <?php //@todo remove .selected ?>
	color: #2D3F46;
	text-decoration: underline;
}

p {
	margin-bottom: 15px;
}

p:last-child {
	margin-bottom: 0;
}

pre, code {
	font-family: Monaco, "Courier New", Courier, monospace;
	font-size: 12px;
	
	background:#EBF5FF;
	color:#000000;
	overflow:auto;

	overflow-x: auto; /* Use horizontal scroller if needed; for Firefox 2, not needed in Firefox 3 */

	white-space: pre-wrap;
	word-wrap: break-word; /* IE 5.5-7 */
	
}

pre {
	padding:3px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
}

code {
	padding:2px 3px;
}

.elgg-monospace {
	font-family: Monaco, "Courier New", Courier, monospace;
}

blockquote {
	line-height: 1.3em;
	padding:3px 15px;
	margin:0px 0 15px 0;
	background:#EBF5FF;
	border:none;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}

h1, h2, h3, h4, h5, h6 {
	font-weight: normal;
	color: #2D3F46;
	font-family: 'Shanti', sans-serif;
	text-transform:uppercase;
}

h1 { font-size: 1.8em; }
h2 { font-size: 1.5em; line-height: 1.1em; padding-bottom:5px}
h3 { font-size: 1.1em; }
h4 { font-size: 1.0em; }
h5 { font-size: 0.9em; }
h6 { font-size: 0.8em; }

.elgg-heading-site, .elgg-heading-site:hover {
	font-size: 2em;
	line-height: 1.4em;
	color: white;
	font-style: italic;
	font-family: Georgia, times, serif;
	text-shadow: 1px 2px 4px #333333;
	text-decoration: none;
}

.elgg-heading-main {
	float: left;
	max-width: 530px;
	margin-right: 10px;
	margin-left: 6px;
	font-family: 'Shanti', sans-serif;
	text-transform:uppercase;
	color:#2D3F46;
	font-size:130%;
}
.elgg-heading-basic {
	color: #2D3F46;
	font-size: 1.2em;
	font-weight: bold;
}

.elgg-subtext {
	color: #999999;
	font-size: 85%;
	line-height: 1.2em;
	font-style: italic;
}

.elgg-text-help {
	display: block;
	font-size: 85%;
	font-style: italic;
}

.elgg-quiet {
	color: #666;
}

.elgg-loud {
	color: #91131E;
	font-weight: bold;
}

/* ***************************************
	USER INPUT DISPLAY RESET
*************************************** */
.elgg-output {
	margin-top: 10px;
}

.elgg-output dt { font-weight: bold }
.elgg-output dd { margin: 0 0 1em 1em }

.elgg-output ul, ol {
	margin: 0 1.5em 1.5em 0;
	padding-left: 1.5em;
}
.elgg-output ul {
	list-style-type: disc;
}
.elgg-output ol {
	list-style-type: decimal;
}
.elgg-output table {
	border: 1px solid #ccc;
}
.elgg-output table td {
	border: 1px solid #ccc;
	padding: 3px 5px;
}
.elgg-output img {
	max-width: 100%;
}


.elgg-output p,
.elgg-output pre,
.elgg-output blockquote,
.elgg-output ol,
.elgg-output ul,
.elgg-output code {
	font-size: 13px;
	line-height: 1.5em;
	margin-bottom: 1.5em;
}


.elgg-output h1, 
.elgg-output h2, 
.elgg-output h3, 
.elgg-output h4, 
.elgg-output h5, 
.elgg-output h6 {
	font-weight: normal;
	color: #2D3F46;
	font-family: 'Shanti', sans-serif;
	text-transform:none;
}

.elgg-output h1 { font-size: 2.0em; line-height: 0.75em; margin-bottom: 0.75em;}
.elgg-output h2 { font-size: 1.8em; line-height: 0.83em; margin-bottom: 0.75em;}
.elgg-output h3 { font-size: 1.6em; line-height: 0.94em; margin-bottom: 0.75em;}
.elgg-output h4 { font-size: 1.4em; line-height: 1.07em; margin-bottom: 0.75em;}
.elgg-output h5 { font-size: 1.2em; line-height: 1.25em; margin-bottom: 0.75em;}
.elgg-output h6 { font-size: 1.0em; line-height: 1.5em; margin-bottom: 0.75em;}

.elgg-output a {
	color: #91131E;
	border-bottom: 1px dotted #91131E;
	font-weight: bold;
}

.elgg-output a img {
	vertical-align:top;  /* hack */
	border-bottom: none;
}

.elgg-output a:hover {
	color: #2D3F46;
	border-bottom: 1px solid #2D3F46;
	text-decoration: none;
}


