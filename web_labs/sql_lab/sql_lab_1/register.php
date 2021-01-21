<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style>
		#myForm
		{
			font-family: Verdana;
			font-size: 16pt;
			margin-top: 12px;
			background-color: #eb4034;
			border: solid 2px red;
			padding: 15px;
			height: 260px;
			width: 510px;
		}

		#myForm label
		{
			display: block;
			text-align: right;
			padding-right: 15px;
			margin-bottom: 10px;
			width: 175px;
			float: left;
		}

		#myForm input
		{
			display: block;
			float: left;
			width: 300px;
			margin-bottom: 10px;
			font-size: 16pt;
			background-color: #b5f0ff;
		}

		#myForm button
		{
			background-color: #240e0e;
			color: white;
			height: 60px;
			width: 500px;
			font-size: 24pt;
			border: solid 2px red;
		}

	</style>
</head>
<body>
	<h1>Register Page</h1>
	
	<?php 
	if(!isset ($_POST['fn']))
	{
		echo("<p>Please complete the form to register.</p>");
		getUserDetails();
	}
 
	else
		processUserDetails();
	?>
</body>
</html>

<?php
function getUserDetails()
{
	$fn = $sn = $pw = "";
	if(isset($_POST['fn']))
	{
		$fn = $_POST['fn'];
		$sn = $_POST['sn'];
		$pw = $_POST['pw'];
	}
	$regForm = "
	<div id = 'myForm'>
		<form action = 'register.php' method = 'POST'>

			<label>Forename:</label>
				<input type='text' name='fn' id='fn' value='$fn' required>

			<label>Surname:</label>
				<input type='text' name='sn' id='sn' value='$sn' required>

			<label>Email:</label>
				<input type='text' name='email' id='email' required>

			<label>Confirm email:</label>
				<input type='text' name='cemail' id='cemail' required>

			<label>Password:</label>
				<input type='password' name='pw' value='$pw' required>

			<button>Register</button>

		</form>
	</div>";

	print($regForm);
	
}




function processUserDetails()
{
	$testMsgs = true;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "test";

	$conn = mysqli_connect($servername, $username, $password, $database);

	$frmFN = $_POST['fn'];
	$frmSN = $_POST['sn'];
	$frmEM = $_POST['email'];
	$frmPW = $_POST['pw'];
	$frmConfirmEM = $_POST['cemail'];

	$password = password_hash($frmPW, PASSWORD_DEFAULT);

	if($frmEM !== $frmEM)
	{
		echo("Email address does not much with confirm email address. Try again:");
		getUserDetails();
	}
	else
	{
		$sql = "INSERT INTO user (forename, surname, email, password) VALUES ('$frmFN', '$frmSN', '$frmEM', '$password') ";

		$result = doSQL($conn, $sql, $testMsgs);

		if (strpos($result, 'Duplicate entry') !== false)
		{
			echo ("<br>The email address you provided is already in use. Try another address:");
			getUserDetails();
		}
	}

	
}

function doSQL($conn, $sql, $testMsgs)
	{
		if ($testMsgs)echo ("<br><code>SQL: $sql</code>");
		if ($result = $conn->query($sql))
		{
			if($testMsgs) echo("<code> - OK</code>");			
		}
		else
		{
			if($testMsgs) echo ("<code> - FAIL!" . $conn->error . "</code>");
			$result = $conn->error;
		}
		return $result;
	}

?>