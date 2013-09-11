<?php
/**
 * TGS Theme 2 - Filter dropdown
 *
 * (HTML/CSS ONLY - Need to wire up your own JS events)
 *
 * @package TGSTheme2
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 *
 * @see  input/dropdown
 * @uses $vars['label']
 * @uses $vars['filter_class']
 */

$filter_class = elgg_extract('filter_class', $vars, false) ? "tgstheme-filter-dropdown $filter_class" : "tgstheme-filter-dropdown";

echo "<div class='$filter_class'>";
echo "<label>" . $vars['label'] . "</label>";
echo elgg_view('input/dropdown', $vars);
echo "</div>";
