<?php

function extname($file) {
	if (is_dir($file)) {
		return 'directory';
	}
	$ext = explode('.', basename(strtolower($file)));
	return $ext[count($ext) - 1];
}

function getfilesize($size) {
	//if ($size < 2) return "$size byte";
	$units = array(
		' B', ' KiB', ' MiB', ' GiB', ' TiB'
	);
	for ($i = 0; $size > 1024; $i++) {
		$size /= 1024;
	}
	return round($size, 2) . $units[$i];
}

function return_bytes($val) {
	$val = trim($val);
	if (empty($val)) {
		return pow(1024, 3);
	}
	$last = strtolower($val{(strlen($val) - 1)});
	switch ($last) {
		// The 'G' modifier is available since PHP 5.1.0
		case 'g':
			$val *= 1024;
		case 'm':
			$val *= 1024;
		case 'k':
			$val *= 1024;
	}
	return $val;
}

//ANDRIE
function dirmtime($dir) {
	global $config;
	$date = filemtime($dir);
	if ($handle = opendir($dir)) {
		while (false !== ($file = readdir($handle))) {
			$ext = extname($dir . '/' . $file);
			$allowed_ext = (in_array($ext, $config['allowed_ext']) || $ext == 'directory');
			if (substr($file, 0, 1) == "." || ! $allowed_ext)
				continue;
			$new_date = ($ext == 'directory') ? dirmtime($dir . '/' . $file) : filemtime($dir . '/' . $file);
			if ($new_date > $date) {
				$date = $new_date;
			}
		}
		closedir($handle);
	}
	return $date;
}

function dirsize($dir) {
	global $config;
	$size = 0;
	if ($handle = opendir($dir)) {
		while (false !== ($file = readdir($handle))) {
			$ext = extname($dir . '/' . $file);
			$allowed_ext = (in_array($ext, $config['allowed_ext']) || $ext == 'directory');
			if (substr($file, 0, 1) == "." || ! $allowed_ext)
				continue;
			$new_size = ($ext == 'directory') ? dirsize($dir . '/' . $file) : filesize($dir . '/' . $file);
			$size += $new_size;
		}
		closedir($handle);
	}
	return $size;
}

//ANDRIE end



function ls($dir) {
	global $config, $lang, $auth;
	
	$files = array();
	if ($handle = opendir($dir)) {
		while (false !== ($file = readdir($handle))) {
			if ($file_obj = ls_file($dir, $file)) {
				$files[] = $file_obj;
			}
		}
		closedir($handle);
	}
	if (! empty($files)) {
		foreach ($files as $key => $row) {
			$fn[$key] = strtolower($row['file']);
		}
		array_multisort($fn, SORT_ASC, SORT_STRING, $files);
	}
	return $files;
}

function ls_file($dir, $file) {
	global $config, $lang, $auth;
	$ext = extname($dir . '/' . $file);
	$is_counter = ($ext == 'counter');
	$allowed_ext = (in_array($ext, $config['allowed_ext']) || $ext == 'directory');
	if (substr($file, 0, 1) != "." && $file != "index.html" && $allowed_ext && ! $is_counter) {
		$size = filesize($dir . '/' . $file);
		$date = filemtime($dir . '/' . $file);
		$counter = (integer) @file_get_contents($dir . '/' . $file . '.counter');
		if ($ext == "directory") {
			if ($config['dynamic_directory_date'])
				$date = dirmtime($dir . '/' . $file);
			if ($config['dynamic_directory_size'])
				$size = dirsize($dir . '/' . $file);
		}
		/*if ($config['delete_after'] && ($date < mktime(0, 0, 0, date("m"), date("d")-$config['delete_after'], date("Y")))){
		 if (is_dir($dir.'/'.$file))
		 @rmdir($dir.'/'.$file);
		 else
		 @unlink($dir.'/'.$file);
		 }
		 if (file_exists($dir . '/' . $file))
		 {*/
		return array(
			'file' => $file, 'date' => $date, 'size' => $size, 'ext' => $ext, 'counter' => $counter, 'link' => urlencode($file)
		);
		//}
	}
}

/**#@+
 * Extra GLOB constant for safe_glob()
 */
define('GLOB_NODIR', 256);
define('GLOB_PATH', 512);
define('GLOB_NODOTS', 1024);
define('GLOB_RECURSE', 2048);

/**#@-*/

/**
 * A safe empowered glob().
 *
 * Function glob() is prohibited on some server (probably in safe mode)
 * (Message "Warning: glob() has been disabled for security reasons in
 * (script) on line (line)") for security reasons as stated on:
 * http://seclists.org/fulldisclosure/2005/Sep/0001.html
 *
 * safe_glob() intends to replace glob() using readdir() & fnmatch() instead.
 * Supported flags: GLOB_MARK, GLOB_NOSORT, GLOB_ONLYDIR
 * Additional flags: GLOB_NODIR, GLOB_PATH, GLOB_NODOTS, GLOB_RECURSE
 * (not original glob() flags)
 * @author BigueNique AT yahoo DOT ca
 * @updates
 * - 080324 Added support for additional flags: GLOB_NODIR, GLOB_PATH,
 *   GLOB_NODOTS, GLOB_RECURSE
 */
function safe_glob($pattern, $flags = 0) {
	$split = explode('/', str_replace('\\', '/', $pattern));
	$mask = array_pop($split);
	$path = implode('/', $split);
	if (($dir = opendir($path)) !== false) {
		$glob = array();
		while (($file = readdir($dir)) !== false) {
			// Recurse subdirectories (GLOB_RECURSE)
			if (($flags & GLOB_RECURSE) && is_dir($file) && (! in_array($file, array(
				'.', '..'
			))))
				$glob = array_merge($glob, array_prepend(safe_glob($path . '/' . $file . '/' . $mask, $flags), ($flags & GLOB_PATH ? '' : $file . '/')));
				// Match file mask
			if (fnmatch($mask, $file)) {
				if (((! ($flags & GLOB_ONLYDIR)) || is_dir("$path/$file")) && ((! ($flags & GLOB_NODIR)) || (! is_dir($path . '/' . $file))) && ((! ($flags & GLOB_NODOTS)) || (! in_array($file, array(
					'.', '..'
				)))))
					$glob[] = ($flags & GLOB_PATH ? $path . '/' : '') . $file . ($flags & GLOB_MARK ? '/' : '');
			}
		}
		closedir($dir);
		if (! ($flags & GLOB_NOSORT))
			sort($glob);
		return $glob;
	} else {
		return false;
	}
}

/**
 * A better "fnmatch" alternative for windows that converts a fnmatch
 * pattern into a preg one. It should work on PHP >= 4.0.0.
 * @author soywiz at php dot net
 * @since 17-Jul-2006 10:12
 */
if (! function_exists('fnmatch')) {

	function fnmatch($pattern, $string) {
		return @preg_match('/^' . strtr(addcslashes($pattern, '\\.+^$(){}=!<>|'), array(
			'*' => '.*', '?' => '.?'
		)) . '$/i', $string);
	}
}

?>