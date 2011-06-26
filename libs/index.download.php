<?php

if (isset($_GET['download'])) {
	if (strpos($_GET['download'], '!latest!') !== false) {
		$_GET['download'] = latest(str_replace('!latest!', '*', $_GET['download']));
	}
	countfile($_GET['download']);
	if (! isset($_GET['preview'])) {
		downloadfile($_GET['download']);
	}
}

function latest($file) {
	global $config;
	$file = $config['storage_path'] . '/' . basename($file);
	$files = safe_glob($file, GLOB_PATH);
	if ($latest_file = @end($files)) {
		return $latest_file;
	}
	return $file;
}

function countfile($file) {
	global $config;
	$file = $config['storage_path'] . '/' . basename($file);
	if ($config['count_downloads'] && ! (! $config['admin_count_downloads'] && $auth) && ! $_SESSION[$file]) {
		$counter = @file_get_contents($file . '.counter');
		$counter = (int) $counter;
		$counter++;
		@file_put_contents($file . '.counter', $counter);
	}
	$_SESSION[$file] = 1;
}

function downloadfile($file) {
	global $config, $lang;
	//ANDRIE
	global $auth, $mime_types;
	//ANDRIE end
	$file = $config['storage_path'] . '/' . basename($file);
	$mimetype = $mime_types[extname($file)];
	$mimetype = $mimetype ? $mimetype : 'application/octet-stream';
	header("Content-Type: $mimetype");
	header("Pragma: public");
	//header("Expires: 0");
	//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Expires: " . gmdate("D, d M Y H:i:s", time() + 3600) . " GMT");
	header("Cache-Control: max-age=3600, must-revalidate, post-check=0, pre-check=0");
	header("Content-Transfer-Encoding: binary");
	$file_title = join('---', array_reverse(explode('/', $_SERVER['HTTP_HOST'] . $config['storage_path_relative'] . '/' . basename($file)))) . '.' . extname($file);
	if (! isset($_REQUEST['force'])) {
		header("Content-Disposition: inline; filename=\"" . $file_title . "\"");
	} else {
		header("Content-Disposition: attachment; filename=\"" . $file_title . "\"");
	}
	if (isset($_REQUEST['downsize'])) {
		$down_file = resize_image($file, 640, 480);
		header("Content-Size: " . filesize($down_file));
		header("Content-Length: " . filesize($down_file));
		header("Last-Modified: " . gmdate("D, d M Y H:i:s", filemtime($down_file)) . " GMT");
		@readfile($down_file);
	} else {
		header("Content-Size: " . filesize($file));
		header("Content-Length: " . filesize($file));
		header("Last-Modified: " . gmdate("D, d M Y H:i:s", filemtime($file)) . " GMT");
		@readfile($file);
	}
	if ($config['log_download'])
		logadm($lang['DOWNLOAD'] . ' ' . $file);
	exit();
}

?>
