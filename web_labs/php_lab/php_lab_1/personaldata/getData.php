<!DOCTYPE html>
<html>
	<head>
		<title>Personal Data Page</title>
	</head>
	<body>
		<h1>Name and Age</h1>
		<hr>
		<p>Please enter your name:</p>
		<form action="initials.php">
 			<input type="text" name="firstName" id="firstName">(First Name)
 			<input type="text" name="surname" id="surname">(Surname)
			<input type="submit" value="Display initials" />
		</form>
		<hr>
		<p>Please enter your age:</p>
		<form action="age.php">
 			<input type="text" name="age" id="age" />
			<input type="submit" value="Display 1 if oldder than 17" />
		</form>
		<hr>		
	</body>
</html>