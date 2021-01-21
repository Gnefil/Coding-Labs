<!DOCTYPE html>
<html>
	<head>
		<title>Personal Data Page</title>
	</head>
	<body>
		<h1>Name</h1>
		<hr>
		<p>Initials:</p>
		<?php
			$f = $_GET["firstName"][0];
			$s = $_GET["surname"][0];
			echo ($f . ". " . $s . ".")
		?>	
	</body>
</html>