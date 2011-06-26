<?php

if (isset($_POST["delete"])) {
	if ($config['protect_delete']) {
		authorize();
	}
	deletefile($_POST["delete"]);
}

function deletefile($cell) {
	global $config, $lang;
	
	//decode str
	$str = stripslashes(urldecode($cell));
	$str = substr($str, strpos($str, 'href="') + 6);
	$str = substr($str, 0, strpos($str, '"'));
	$str = array_shift(explode('?', $str));
	if (substr($str, 0, 10) == "?download=")
		$str = substr($str, 10, strlen($str));
	$file = $config['storage_path'] . '/' . basename($str);
	
	if (! file_exists($file))
		echo $lang['delete_error_notfound'] . " ($file)";
	else {
		if (is_dir($file))
			$return = @rmdir($file);
		else //ANDRIE
		//	$return = @unlink($file);
		{
			@unlink($file . '.counter');
			$return = @unlink($file);
		}
		//ANDRIE end
		

		if ($config['log_delete'])
			logadm($lang['DELETE'] . " " . $file);
		if ($return)
			echo "successful";
		else {
			if (is_dir($file))
				echo $lang['delete_error_cant_dir'];
			else
				echo $lang['delete_error_cant'];
		}
	}
	exit();
}


?>
