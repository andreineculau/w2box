<?php

$auth = ! $config['admin_actived'];
authorize(true); //silent authorize first
if (isset($_GET["admin"])) {
	authorize();
}

function authorize($silent = false) {
	global $config, $lang, $auth;
	//authentication
	if (! $auth) {
		if ((empty($_SERVER['PHP_AUTH_USER']) or empty($_SERVER['PHP_AUTH_PW'])) and isset($_REQUEST['BAD_HOSTING']) and preg_match('/Basic\s+(.*)$/i', $_REQUEST['BAD_HOSTING'], $matc)) {
			list ($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode($matc[1]));
			// ANDRIE
			$_SESSION['PHP_AUTH_USER'] = $_SERVER['PHP_AUTH_USER'];
			$_SESSION['PHP_AUTH_PW'] = $_SERVER['PHP_AUTH_PW'];
			//setcookie('PHP_AUTH_USER', $_SERVER['PHP_AUTH_USER'], 0, '/');
		//setcookie('PHP_AUTH_PW', $_SERVER['PHP_AUTH_PW'], 0, '/');
		// ANDRIE end
		} else {
			// ANDRIE
			//$_SERVER['PHP_AUTH_USER'] = $_SERVER['PHP_AUTH_USER']?$_SERVER['PHP_AUTH_USER']:$_COOKIE['PHP_AUTH_USER'];
			//$_SERVER['PHP_AUTH_PW'] = $_SERVER['PHP_AUTH_PW']?$_SERVER['PHP_AUTH_PW']:$_COOKIE['PHP_AUTH_PW'];
			$_SERVER['PHP_AUTH_USER'] = $_SERVER['PHP_AUTH_USER'] ? $_SERVER['PHP_AUTH_USER'] : $_SESSION['PHP_AUTH_USER'];
			$_SERVER['PHP_AUTH_PW'] = $_SERVER['PHP_AUTH_PW'] ? $_SERVER['PHP_AUTH_PW'] : $_SESSION['PHP_AUTH_PW'];
			// ANDRIE end
		}
		
		if ((isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) && ($_SERVER['PHP_AUTH_USER'] == $config['admin_username'] && $_SERVER['PHP_AUTH_PW'] == $config['admin_password'])) {
			$auth = true; // user is authenticated
			if (! $silent) {
				header("Location: " . BASE_URL);
			}
		} else {
			if (! $silent) {
				header('WWW-Authenticate: Basic realm="w2box admin"');
				header('HTTP/1.0 401 Unauthorized');
				echo 'Your are not allowed to access this function!';
				exit();
			}
		}
	}

}

?>
