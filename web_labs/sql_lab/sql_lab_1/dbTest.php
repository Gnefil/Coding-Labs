<?php
	$testMsgs = true;
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
	doSQL($conn, $sql, $testMsgs);

	// $sql = "DROP TABLE user";
 	// doSQL($conn, $sql, $testMsgs);

	$sql = "
		CREATE TABLE user (
			userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			forename VARCHAR(30) not null,
			surname VARCHAR(30) not null,
			email VARCHAR(50) not null unique,
			password VARCHAR(128) not null
		)
	";

	doSQL($conn, $sql, $testMsgs);

	$password = password_hash('enterprise', PASSWORD_DEFAULT);
	$sql = "INSERT INTO user (forename, surname, email, password) VALUES ('Patrick', 'Stewart', 'stewart.p@sf.com', '$password') ";

	doSQL($conn, $sql, $testMsgs);


	$sql = "INSERT INTO user (forename, surname, email, password) VALUES ('Kathryn', 'Janeway', 'janeway.k@sf.com', '$password')";

	doSQL($conn, $sql, $testMsgs);

	$sql = "SELECT * FROM user";
	$records = doSQL($conn, $sql, $testMsgs);

	$output = "<table border = '2'>
					<th>User Id</th>
					<th>Forename</th>
					<th>Surname</th>
					<th>Email</th>
					<th>Password</th>";

	while ($row = $records->fetch_assoc())
	{
		$output .= "<tr>
					<td>$row[userId]</td> 
					<td>$row[forename]</td> 
					<td>$row[surname]</td> 
					<td>$row[email]</td> 
					<td>$row[password]</td>
					</tr>";
	}

	$output .= "</table>";
	echo($output);

	function doSQL($conn, $sql, $testMsgs)
	{
		if ($testMsgs)
		{
			echo ("<br><code>SQL: $sql</code>");
			if ($result = $conn->query($sql))
				echo ("<code> - OK</code>");
			else
				echo ("<code> - FAIL!" . $conn->error . "</code>");
		}
		else
			$result = $conn->query($sql);
		return $result;
	}
?>