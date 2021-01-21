<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "test";

	$conn = mysqli_connect($servername, $username, $password, $database);

	if(!$conn)
	{
		die("Connection failes" . mysqli_error($conn));
	}
	
	echo ("Connected correctly");

	$sql = "CREATE DATABASE test";
	if($conn->query($sql))
	{
		echo ("Database created successfully");
	}
	else
	{
		echo ("Error: " . $conn->error);
	}

	$sql = "
		CREATE TABLE user (
			userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			forename VARCHAR(30) not null,
			surname VARCHAR(30) not null,
			email VARCHAR(50) not null,
			password VARCHAR(128) not null
		)
	";

	if ($conn->query($sql))
	{
		echo("Table created successfully");
	}
	else
	{
		echo("Error: " . $conn->error);
	}

	$sql = "INSERT INTO user (forename, surname, email, password) VALUES ('James', 'Kirk', 'kirk.j@sf.com', 'enterprise')";

	if ($conn->query($sql))
	{
		echo("Record created successfully");
	}
	else
	{
		echo("Error: " . $conn->error);
	}


	$sql = "INSERT INTO user (forename, surname, email, password) VALUES ('Kathryn', 'Janeway', 'janeway.k@sf.com', 'enterprise')";

	if ($conn->query($sql))
	{
		echo("Record created successfully");
	}
	else
	{
		echo("Error: " . $conn->error);
	}

	$sql = "SELECT * FROM user";
	$records = $conn->query($sql);

	while ($row = $records->mysqli_fetch_assoc())
	{
		echo($row ["userId"] . $row["forename"] . $row ["surname"] . $row["email"] . $row["password"]);
	}

?>