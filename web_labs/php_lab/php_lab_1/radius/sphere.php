<!DOCTYPE html>
<html>
	<head>
		<title>Get Radius Pagee</title>
	</head>
	<body>
		<h1>Sphere</h1>
		<?php
			$r = $_GET['radius'];
			$s = 4*3.14 * $r * $r;
			echo ("Surface area: " . $s);
		?>
	</body>
</html>