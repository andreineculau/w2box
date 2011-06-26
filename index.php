<?php
session_start();
require ('config.php');
require ('libs/funcs.php');

#Authentication
require ('libs/index.authorize.php');

#Process directory/file request
$dir = isset($_REQUEST['d']) ? $_REQUEST['d'] : '';

if ($dir && $config['enable_folder_maxdepth']) {
	$dir = split("/", $dir);
	foreach ($dir as $k => $v) {
		if (($v == "..") || ($v == ".") || ($v == "")) {
			unset($dir[$k]);
		} else if ($v[0] == "." && ! $auth && ! isset($_GET['download'])) {
			authorize();
		}
	}
	$path = $config['storage_path'];
	foreach ($dir as $k => $v) {
		if (! file_exists($path . "/$v")) {
			unset($dir[$k]);
		} else {
			$path .= "/$v";
		}
	}
	$config['storage_path'] .= ($config['storage_path_relative'] = "/" . join("/", $dir));
	
	if (isset($dir)) {
		$dirlevel = sizeof($dir);
	} else {
		$dirlevel = 0;
	}
} else {
	unset($dir);
}

#Missing slash?
if ($_GET['download'] && is_dir($config['storage_path'] . '/' . $_GET['download'])) {
	header('Location: ' . BASE_URL . $config['storage_path_relative'] . '/' . $_GET['download'] . '/');
	exit();
}

#Progress bar
require ('libs/index.progress.php');

#Make dir
require ('libs/index.makedir.php');

#Upload
require ('libs/index.upload.php');

#Delete
require ('libs/index.delete.php');

#Download
require ('libs/index.download.php');

#List
require ('libs/index.list.php');
?>
