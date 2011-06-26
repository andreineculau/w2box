<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title><?php echo basename($_REQUEST['file']); ?></title>
	</head>
	<body>
		<div id="mvcontainer">
			<a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a>
			to see this player.
		</div>
		<script type="text/javascript" src="https://media.dreamhost.com/mp4/swfobject.js">
		</script>
		<script type="text/javascript">
			var s1 = new SWFObject("https://media.dreamhost.com/mp4/player.swf", "ply", "615", "480", "9", "#FFFFFF");
			s1.addParam("allowfullscreen", "true");
			s1.addParam("allowscriptaccess", "always");
			s1.addParam("flashvars", "<?php echo $_SERVER['QUERY_STRING']; ?>");
			s1.write("mvcontainer");
		</script>
	</body>
</html>
