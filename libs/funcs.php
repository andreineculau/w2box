<?php 

#Requirements
require_once('funcs.image.php');
require_once('funcs.mime.php');
require_once('funcs.file.php');
require_once('funcs.browser.php');
$ua = browser_info();

#Path Settings
define('BASE_PATH', realpath('.'));
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . (dirname($_SERVER["SCRIPT_NAME"]) == '/'?'':dirname($_SERVER["SCRIPT_NAME"])));
if (!$config['jquery_js_path'])
	$config['jquery_js_path'] = BASE_URL . '/libs.js/jquery/jquery-1.3.2.min.js';
if (!$config['fancybox_js_path'])
	$config['fancybox_js_path'] = BASE_URL . '/libs.js/jquery.fancybox/jquery.fancybox-1.3.0rc2.js';
if (!$config['fancybox_css_path'])
	$config['fancybox_css_path'] = BASE_URL . '/libs.js/jquery.fancybox/jquery.fancybox-1.3.0rc2.css';

#Upload Settings
//bruteforce php ini, almost never work except on old php..
ini_set('post_max_size', '500M');
ini_set('upload_max_filesize', '500M');
ini_set('memory_limit', '500M');
//find real max_filesize
$max_filesize = $config['max_filesize'] * pow(1024, 2);
if (!$config['upload_progressbar']) //doesn't apply with the perl script
{
	$max_filesize = min(return_bytes(ini_get('post_max_size')), return_bytes(ini_get('upload_max_filesize')), return_bytes(ini_get('memory_limit')), $max_filesize);
}

#Date Settings
date_default_timezone_set($config['timezone']);


#Other functions
function logadm($str)
{
	global $config,$lang;
	if (!$config['log'])
		return;
		
	$file_handle = fopen($config['log_filename'], "a+");
	fwrite($file_handle, date("Y-m-d\TH:i:s") . ' ' . sprintf("%15s", $_SERVER["REMOTE_ADDR"]) . ' ' . $str . "\n");
	fclose($file_handle);
}

function js_url($file, $conf = null, $ext = null)
{
	if ($conf)
		list($path, $version, $js_suffix) = $conf;
	if (!$path)
		$path = BASE_URL .'/libs.js';
	$url = "$path/$file";
	if ($version)
		$url .= "-$version";
	if (!$ext || $ext == 'js')
	{
		$ext = 'js';
	}else{
		unset($js_suffix);
	}
	if ($js_suffix)
		$url .= $js_suffix;
	return "$url.$ext";
}

?>
