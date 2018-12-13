<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comments</title>

	<script src="js/jquery.js"></script>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
 
<?php
$app_id = 'YOUR_APP_ID';
$oxr_url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5" . $app_id;

// Open CURL session:
$ch = curl_init($oxr_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Get the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$oxr_latest = json_decode($json);

// You can now access the rates inside the parsed object, like so:
echo(
    ,
    $oxr_latest->base,
    $oxr_latest->rates->GBP,
    date('H:i jS F, Y', $oxr_latest->timestamp)
);
// -> eg. "1 USD equals: 0.656741 GBP at 11:11, 11th December 2015"
?>
</head>
<body>

</body>		 
</html>





