<?php
/**
 * Elgg topbar ajax view
 */

// Elgg topbar menu
echo elgg_view_menu('topbar', array('sort_by' => 'priority', array('elgg-menu-hz')));