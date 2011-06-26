<?php

if (isset($_POST['dir'])) {
	if ($config['protect_makedir'])
		authorize();
	if ($dirlevel < $config['enable_folder_maxdepth']) {
		$newdir = preg_replace("/[^0-9a-zA-Z\(\)\s]/i", '', $_POST['dir']);
		if ($newdir != "") {
			$newdir = $config['storage_path'] . "/" . $newdir;
			if (file_exists($newdir))
				$errormsg = $lang['make_error_exist'];
			else {
				if (mkdir($newdir)) {
					// necessary to allow upload files to a new folder
					chmod($newdir, 0755);
					$loc = BASE_URL;
					if (sizeof($dir) > 0)
						$loc .= "/" . join("/", $dir) . "/";
					Header("Location: " . $loc);
					exit();
				} else
					$errormsg = $lang['make_error_cant'];
			}
		}
	} else {
		$errormsg = $lang['make_error_maxdepth'];
	}
}

?>
