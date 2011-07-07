<?php
/**
 * TGS Theme 2 
 * Right sidebar contents - Doesn't include the usual stuff
 * 
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010
 * @link http://www.thinkglobalschool.com/
 *
 * @uses $vars['sidebar'] Optional content that is displayed at the bottom of sidebar
 */

// optional 'sidebar' parameter
if (isset($vars['sidebar'])) {
	echo $vars['sidebar'];
}
