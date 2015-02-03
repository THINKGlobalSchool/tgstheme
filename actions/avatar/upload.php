<?php
/**
 * Avatar upload action
 * OVERRIDE
 */

/**
 * @see get_resized_image_from_existing_file
 */
function get_resized_oriented_image_from_existing_file($input_name, $maxwidth, $maxheight, $square = FALSE,
$x1 = 0, $y1 = 0, $x2 = 0, $y2 = 0, $upscale = FALSE) {

	// Get the size information from the image
	$imgsizearray = getimagesize($input_name);
	if ($imgsizearray == FALSE) {
		return FALSE;
	}

	$width = $imgsizearray[0];
	$height = $imgsizearray[1];

	$accepted_formats = array(
		'image/jpeg' => 'jpeg',
		'image/pjpeg' => 'jpeg',
		'image/png' => 'png',
		'image/x-png' => 'png',
		'image/gif' => 'gif'
	);

	// make sure the function is available
	$load_function = "imagecreatefrom" . $accepted_formats[$imgsizearray['mime']];
	if (!is_callable($load_function)) {
		return FALSE;
	}

	// get the parameters for resizing the image
	$options = array(
		'maxwidth' => $maxwidth,
		'maxheight' => $maxheight,
		'square' => $square,
		'upscale' => $upscale,
		'x1' => $x1,
		'y1' => $y1,
		'x2' => $x2,
		'y2' => $y2,
	);

	// Attempt to get image exif orientation
	$exif = exif_read_data($input_name, 'IFDO', true);
	$orientation = $exif['IFD0']['Orientation'];

	// load original image
	$original_image = $load_function($input_name);
	if (!$original_image) {
		return FALSE;
	}

	if ($orientation && $orientation != 0) {
		switch($orientation) {
			case 8:
				$original_image = imagerotate($original_image,90,0);
				$width = $imgsizearray[1];
				$height = $imgsizearray[0];
				break;
			case 3:
				$original_image = imagerotate($original_image,180,0);
				break;
			case 6:
				$original_image = imagerotate($original_image,-90,0);
				$width = $imgsizearray[1];
				$height = $imgsizearray[0];
				break;
		}
	}

	$params = get_image_resize_parameters($width, $height, $options);
	if ($params == FALSE) {
		return FALSE;
	}

	// allocate the new image
	$new_image = imagecreatetruecolor($params['newwidth'], $params['newheight']);
	if (!$new_image) {
		return FALSE;
	}

	// color transparencies white (default is black)
	imagefilledrectangle(
		$new_image, 0, 0, $params['newwidth'], $params['newheight'],
		imagecolorallocate($new_image, 255, 255, 255)
	);

	$rtn_code = imagecopyresampled(	$new_image,
									$original_image,
									0,
									0,
									$params['xoffset'],
									$params['yoffset'],
									$params['newwidth'],
									$params['newheight'],
									$params['selectionwidth'],
									$params['selectionheight']);
	if (!$rtn_code) {
		return FALSE;
	}

	// grab a compressed jpeg version of the image
	ob_start();
	imagejpeg($new_image, NULL, 90);
	$jpeg = ob_get_clean();

	imagedestroy($new_image);
	imagedestroy($original_image);

	return $jpeg;
}

$guid = get_input('guid');
$owner = get_entity($guid);


if (!$owner || !($owner instanceof ElggUser) || !$owner->canEdit()) {
	register_error(elgg_echo('avatar:upload:fail'));
	forward(REFERER);
}

if ($_FILES['avatar']['error'] != 0) {
	register_error(elgg_echo('avatar:upload:fail'));
	forward(REFERER);
}

$icon_sizes = elgg_get_config('icon_sizes');

// get the images and save their file handlers into an array
// so we can do clean up if one fails.
$files = array();

$input_name = 'avatar';

foreach ($icon_sizes as $name => $size_info) {

	// If our file exists ...
	if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == 0) {
		$resized = get_resized_oriented_image_from_existing_file($_FILES[$input_name]['tmp_name'], $size_info['w'],
			$size_info['h'], $size_info['square'], 0, 0, 0, 0, $size_info['upscale']);
	}

	if ($resized) {
		//@todo Make these actual entities.  See exts #348.
		$file = new ElggFile();
		$file->owner_guid = $guid;
		$file->setFilename("profile/{$guid}{$name}.jpg");
		$file->open('write');
		$file->write($resized);
		$file->close();
		$files[] = $file;
	} else {
		// cleanup on fail
		foreach ($files as $file) {
			$file->delete();
		}

		register_error(elgg_echo('avatar:resize:fail'));
		forward(REFERER);
	}
}

// reset crop coordinates
$owner->x1 = 0;
$owner->x2 = 0;
$owner->y1 = 0;
$owner->y2 = 0;

$owner->icontime = time();
if (elgg_trigger_event('profileiconupdate', $owner->type, $owner)) {
	system_message(elgg_echo("avatar:upload:success"));

	$view = 'river/user/default/profileiconupdate';
	elgg_delete_river(array('subject_guid' => $owner->guid, 'view' => $view));
	add_to_river($view, 'update', $owner->guid, $owner->guid);
}

forward(REFERER);
