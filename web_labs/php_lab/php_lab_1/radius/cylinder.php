<!DOCTYPE html>
<html>
	<head>
		<title>Get Radius Pagee</title>
	</head>
	<body>
		<h1>Cylinder</h1>
		<?php
			$r = $_GET['radius'];
			$h = $_GET['height'];
			$s = 6.28 * $r * $r + 6.28 * $r * $h;
			echo ("Surface area: " . $s);
		?>
	</body>
</html>