<?php
/**
 * Uber CSS view
 */

$files = $_SESSION['ubercss'];
echo elgg_view('ubercombine', array('type' => 'css', 'files' => $files));
