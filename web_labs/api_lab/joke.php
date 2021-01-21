<!DOCTYPE html>
<html>
<head>
	<title>My Joke</title>
	<style type="text/css">
		body
		{
			background-color: #FFEEE4;
		}
		.title
		{
			font-family: Times New Roman;
			font-size: 20px;
			text-align: center;
		}

		.joke
		{
			 font-family: Platino Linotype;
			 font-size: 25px;
			 text-align: center
		}

		.myButton
		{
			box-shadow: 0px 10px 14px -7px #CE6D39;
			background: linear-gradient(to bottom, #FFEEE4 5%, #F17F42 100%);
			background-color: #FFEEE4;
			border: 1px outset #CE6D39;
			display: inline-block;
			cursor: pointer;
			text-align: center;
			font-family: Comic Sans;
			font-weight: bold;
			font-size: 13px;
			padding: 6px 12px;
			text-shadow: 0px, 0px, 1px, 1px, #F17F42;
		}

		.myButton:hover
		{
			background-color: #F17F42;
			border:hidden;
			border: 2px inset #CE6D39;
		}

		.myWrapper
		{
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		function showAnswer()
		{
			answer = document.getElementById("answer");
			answer.style.display = "block";
		}
	</script>
</head>
<body>

<?php

$curl = curl_init();
$URL = "https://official-joke-api.appspot.com/jokes/programming/random";

curl_setopt($curl, CURLOPT_URL, $URL);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($curl);
$err = curl_errno($curl);

if($err)
{
	die("Curl error: " . $err);
}
else
{
	// print("IT WORKED!");
}

$response = json_decode($response, true);
// foreach($response as $key => $value)
// {
// 	echo("IN array");
// 	if (gettype($value)== "array")
// 		{
// 			foreach ($value as $key2 => $value2)
// 			{
// 				echo("key: $key2 | value: $value2<br>");
// 			}
// 		}
// 	else
// 	{
// 		echo("key: $key | value: $value");
// 	}

// }

echo("<p class = 'title'> Joke " . $response[0]['id']."</p>");
echo("<p class ='joke'>" . $response[0]['setup']."</p>");

echo("<form method = 'POST'> 
	<div class='myWrapper'>
		<input type ='button' class = 'myButton' value = 'Reveal Answer' onclick='showAnswer()'>
		<input type ='submit' class = 'myButton' value = 'New Joke' onclick='submit'>
	</div>
	</form>
		");

echo("<p class ='joke' style='display: none' id ='answer'>" . $response[0]['punchline']."</p>");

?>

</body>
</html>