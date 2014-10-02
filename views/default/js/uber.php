<?php
/**
 * Uber JS view
 */

if (get_input('location') == 'head') {
	$files = $_SESSION['uberjshead'];
} else if (get_input('location') == 'footer') {
	$files = $_SESSION['uberjsfooter'];
} else {
	$files = $_SESSION['uberjs']; 
}
echo elgg_view('ubercombine', array('type' => 'js', 'files' => $files));
