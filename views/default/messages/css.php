<?php
/**
 * Elgg Messages CSS
 * 
 * @package ElggMessages
 */
?>

.messages-container {
	min-height: 200px;
}

.messages-container ul li:hover{
	background:#EFEFEF;
}

.message.unread a {
	color: #91131E;
	margin-bottom:3px;
}
.message.unread a:hover {
	color: #2D3F46;
}

.messages-buttonbank {
	text-align: left;
}
.messages-buttonbank input {
	margin-left: 6px;
}

/*** message metadata ***/
.messages-owner {
	float: left;
	width: 20%;
	margin-right: 2%;
	margin-top:3px;
}
.messages-subject {
	float: left;
	width: 55%;
	margin-right: 2%;
	margin-top:3px;
}

.messages-subject input[type="checkbox"]{
 	vertical-align: bottom;
    position: relative;
    top: -3px;
    *overflow: hidden;
}

.messages-timestamp {
	float: left;
	width: 14%;
	margin-right: 2%;
	margin-top:3px;
}
.messages-delete {
	float: left;
	width: 5%;
	margin-top:3px;
}
/*** topbar icon ***/
.messages-new {
	color: #FFFFFF;
	background-color: #2D3F46;
	border:1px solid #FFFFFF;
	padding-right: 1px;
	-webkit-border-radius: 10px; 
	-moz-border-radius: 10px;
	border-radius: 10px;
	
	-webkit-box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	-moz-box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	
	position: absolute;
	text-align: center;
	top: 8px;
	left: 8px;
	min-width: 16px;
	height: 16px;
	font-size: 10px;
	font-weight: bold;
}
