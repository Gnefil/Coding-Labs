<!DOCTYPE html>
<html>
	<head>
		<title>Personal Data Page</title>
	</head>
	<body>
		<h1>Age</h1>
		<hr>
		<p>Will display 1 if oldder than 17:</p>
		<?php
			$a = $_GET["age"];
			echo ($a > 17);
		?>	
	</body>
</html>