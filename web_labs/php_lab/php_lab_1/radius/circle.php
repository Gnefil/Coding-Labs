<!DOCTYPE html>
<html>
	<head>
		<title>Get Radius Pagee</title>
	</head>
	<body>
		<h1>Circle</h1>
		<?php
			$r = $_GET['radius'];
			$a = 3.14 * $r * $r;
			$p = 6.28 * $r;
			echo ("Area: " . $a);
			echo(" Perimeter: " . $p);
		?>
	</body>
</html>