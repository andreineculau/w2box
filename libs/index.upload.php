<?php

if (isset($_FILES['file'])) {
	if ($config['protect_upload'])
		authorize();
	uploadfile($_FILES['file']);
}

function uploadfile($file) {
	global $config, $lang, $max_filesize, $errormsg, $dir;
	
	if ($file['error'] != 0) {
		$errormsg = $lang['upload_error'][$file['error']];
		return;
	}
	
	//determine filename
	$filename = $file['name'];
	if (isset($_POST['filename']) && $_POST['filename'] != "")
		$filename = $_POST['filename'];
	$filename = basename($filename);
	$filename = explode(".", basename($filename));
	$ext = $filename[count($filename) - 1];
	unset($filename[count($filename) - 1]);
	//ANDRIE
	//$filename=join('_',$filename).'.'.$ext;
	$filename = join('.', $filename) . '.' . $ext;
	//$filename = str_replace(' ', '_', $filename);
	//ANDRIE end
	

	if (! in_array(strtolower(extname($filename)), $config['allowed_ext'])) {
		$errormsg = $lang['upload_badext'];
		return;
	}
	
	$filesize = $file['size'];
	if ($filesize > $max_filesize) {
		@unlink($file['tmp_name']);
		$errormsg = $lang['upload_error_sizelimit'] . ' (' . getfilesize($max_filesize) . ').';
		return;
	}
	
	$filedest = $config['storage_path'] . '/' . $filename;
	if (file_exists($filedest) && ! $config['allow_overwrite']) {
		@unlink($file['tmp_name']);
		$errormsg = "$filename " . $lang['upload_error_fileexist'];
		return;
	}
	
	$filesource = $file['tmp_name'];
	if (! file_exists($filesource)) {
		$errormsg = "$filesource do no exist!";
		return;
	} else if (! move_uploaded_file($filesource, $filedest)) {
		if (! rename($filesource, $filedest)) {
			$errormsg = $lang['upload_error_nocopy'];
			return;
		}
	}
	
	if ($errormsg == "") {
		chmod($filedest, 0755);
		if ($config['log_upload'])
			logadm($lang['UPLOAD'] . ' ' . $filedest);
		$loc = BASE_URL;
		if (sizeof($dir) > 0)
			$loc .= "/" . join("/", $dir) . "/";
		Header("Location: " . $loc);
		exit();
	}
}
?>
