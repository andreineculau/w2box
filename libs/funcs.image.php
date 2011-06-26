<?php

function resize_image($file, $max_width, $max_height) {
	global $config;
	
	// Get new dimensions
	$old_file = realpath($config['storage_path']) . '/' . basename($file);
	list ($width, $height, $type) = getimagesize($old_file);
	
	if ($width > $height && $width > $max_width)
		$ratio = ($max_width / $width);
	if ($width > $height && $width > $max_width)
		$ratio = ($max_height / $height);
	
	if (! $ratio)
		return $old_file;
	
	$new_file = BASE_PATH . '/tmp' . $config['storage_path_relative'] . '/' . basename($file);
	$new_width = $width * $ratio;
	$new_height = $height * $ratio;
	if (file_exists($new_file)) {
		list ($new_width2, $new_height2) = getimagesize($new_file);
		if (($new_width == $new_width2) && ($new_height == $new_height2)) {
			return $new_file;
		}
	}
	
	// Resample
	switch ($type) {
		case IMAGETYPE_JPEG:
			$image = imagecreatefromjpeg($file);
			break;
		case IMAGETYPE_PNG:
			$image = imagecreatefrompng($file);
			break;
		case IMAGETYPE_GIF:
			$image = imagecreatefromgif($file);
			break;
		default:
			return $file;
	}
	$image_p = imagecreatetruecolor($new_width, $new_height);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	
	// Output
	@mkdir(dirname($new_file), 0777, true);
	imageinterlace($image_p, true);
	switch ($type) {
		case IMAGETYPE_JPEG:
			imagejpeg($image_p, $new_file);
			break;
		case IMAGETYPE_PNG:
			imagepng($image_p, $new_file);
			break;
		case IMAGETYPE_GIF:
			imagegif($image_p, $new_file);
			break;
		default:
			return $file;
	}
	imagedestroy($image_p);
	imagedestroy($image);
	return $new_file;
}

?>