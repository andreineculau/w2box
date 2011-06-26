<?php

if (isset($_POST['progress'])) {
	//define filenames
	$sessionid = basename($_POST['progress']);
	$tmp_dir = $config['upload_tmpdir'];
	$error_file = $tmp_dir . "/$sessionid" . "_err";
	$signal_file = $tmp_dir . "/$sessionid" . "_signal";
	$info_file = $tmp_dir . "/$sessionid" . "_flength";
	$data_file = $tmp_dir . "/$sessionid" . "_postdata";
	
	if (! file_exists($tmp_dir)) {
		header("HTTP/1.1 500 Internal Server Error");
		echo "tmp directory is invalid!";
	} elseif (file_exists($error_file)) {
		# Send error code if error file exists
		header("HTTP/1.1 500 Internal Server Error");
		echo file_get_contents($error_file);
		//clean the shit
		$files = array(
			$info_file, $data_file, $error_file, $signal_file
		);
		foreach ($files as $file) {
			if (file_exists($file)) {
				unlink($file);
			}
		}
	} else if (file_exists($signal_file)) {
		echo "FINISHED";
	} else if (file_exists($info_file)) {
		$total = file_get_contents($info_file);
		$current = @filesize($data_file);
		echo intval(($current / $total) * 100);
	} else
		echo '0';
	exit();
}

//progressbar upload
if ($config['upload_progressbar']) {
	if (isset($_GET['sid'])) {
		$sid = $_GET['sid'];
		$tmp_dir = $config['upload_tmpdir'];
		$sid = ereg_replace("[^a-zA-Z0-9]", "", $sid); //clean sid
		$file = $tmp_dir . '/' . $sid . '_qstring';
		if (! file_exists($file)) {
			$errormsg = $lang['upload_error_sid'];
		} else {
			$qstr = join("", file($file));
			//parse_str($qstr);
			parse_str($qstr, $_POST);
			
			//cleaning shit
			$exts = array(
				"_flength", "_postdata", "_err", "_signal", "_qstring"
			);
			foreach ($exts as $ext) {
				if (file_exists("$tmp_dir/$sid$ext")) {
					@unlink("$tmp_dir/$sid$ext");
				}
			}
			
			//setting vars like without progressbar
			$_FILES['file']['name'] = basename($_POST['file']['name']['0']);
			$_FILES['file']['size'] = $_POST['file']['size']['0'];
			$_FILES['file']['tmp_name'] = $_POST['file']['tmp_name']['0'];
		}
	} else if (isset($_POST['errormsg'])) {
		$errormsg = urldecode($_POST['errormsg']);
		if ($errormsg == "The maximum upload size has been exceeded")
			$errormsg = $lang['upload_error_sizelimit'] . ' (' . getfilesize($max_filesize) . ').';
	}
}

?>
