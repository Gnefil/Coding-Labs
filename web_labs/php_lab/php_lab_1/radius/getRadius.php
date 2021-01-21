<!DOCTYPE html>
<html>
	<head>
		<title>Get Radius Page</title>
	</head>
	<body>
		<h1>Calculate Polygon and Polyhedron Page</h1>
		<hr>
		<p>Please enter a radius in cm for the circle</p>
		<form action="circle.php">
 			<input type="text" name="radius" id="radiusCi" />
			<input type="submit" value="Create circle" />
		</form>
		<hr>
		<p>Please enter a radius in cm for the sphere</p>
		<form action="sphere.php">
 			<input type="text" name="radius" id="radiusSp" />
			<input type="submit" value="Create sphere" />
		</form>
		<hr>
		<p>Please enter a radius and height in cm for the cylinder</p>
		<form action="cylinder.php">
			<p>radius:</p>
 			<input type="text" name="radius" id="radiusCy" />
 			<p>height:</p>
 			<input type="text" name="height" id="heightCy" />
 			<br>
 			<br>
			<input type="submit" value="Create cylinder" />
		</form>
		<hr>
	</body>
</html>