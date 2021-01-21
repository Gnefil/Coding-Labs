<!DOCTYPE html>
<html>
<head>
	<title>Countris Capital City Quiz</title>
</head>
<body>
<?php

if (!isset($_SESSION['started']))
{
	$_SESSION['qa'] = buildQA();
	$_SESSION['started'] = true;
}

$qa = $_SESSION['qa'];

if(isset($_POST['correctAnswer']))
{
	$correctAnswer = $_POST['correctAnswer'];
	if ($_POST['answer'] == $qa[$correctAnswer][1])
	{
		echo("Correct!!! Well done!<br><br>");
	}
	else
	{
		echo("Oops, that was close, try another one!<br><br>");
	}
	echo("<hr>What about this?<br>");
}

showQA($qa);

function showQA($qa)
{
	$answer[] = rand(0, sizeof($qa)-1);
	while($qa[$answer[0]][1] == "" )
	{
		$answer[0] = rand(0, sizeof($qa)-1);
	}
	echo("Question: ". $answer[0]); 

	for($i = 0; $i<3; $i++)
	{
		$answer[$i+1] = rand(0, sizeof($qa)-1);
		while($qa[$answer[$i+1]][1] == "" )
		{
			$answer[$i+1] = rand(0, sizeof($qa)-1);
		}
	}

	// foreach ($answer as $value)
	// {
	// 	echo($value. "<br>");
	// }

	$correct = "<input type='hidden' value='$answer[0]' name='correctAnswer'>";
	echo("<p>Which is the capital of ". $qa[$answer[0]][0] ."? </p>");
	shuffle($answer);

	$choice = "";

	foreach ($answer as $value)
	{
		$choice .= "<input type = 'radio' name='answer' value='".$qa[$value][1]. "'>" . $qa[$value][1] ."<br>";
	}

	echo("<form method = 'POST'>");
	echo($choice);
	echo($correct);
	echo("<br> <input type='submit' value= 'Check Answer'> </form>");

	

}

function buildQA()
{

	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://ajayakv-rest-countries-v1.p.rapidapi.com/rest/v1/all",
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: ajayakv-rest-countries-v1.p.rapidapi.com",
			"x-rapidapi-key: afbd831b16mshba24f7b17b56ef9p11a494jsn37b871167557"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		// echo $response;
	}

	$response = json_decode($response, true);
	$qa = [];

	foreach($response as $item)
	{
		// echo("<br> Country: ". $item['name']."<br>");
		// echo("Capital: ". $item['capital']."<br>");
		array_push($qa, array($item['name'], $item['capital']));
	}

	return $qa;
}
?>
</body>
</html>