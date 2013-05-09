<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>GET Method Example </title>
</head>

<body>
	<form method="get" action="get.php">
		<label for="name">What is your name?</label>
		<input type="text" name="name" id="name" />

		<label for="breakfast">What did you eat for breakfast?</label>
		<input type="text" name="breakfast" id="breakfast" />

		<input type="submit" value="Go!" /> <! backslash not necessary >
		<input type="hidden" name="did_submit" value="1"> <!1 means true>
	</form>

	<?php 
	// only show the message if the form was submitted
	if( $_GET['did_submit'] == 1 ){
		/*echo 'Good Morning, ';
		echo $_GET['name'];
		echo '. ';
		echo $_GET['breakfast'];
		echo ' sound delicious.';*/

		echo 'Good Morning, '.$_GET['name'] . '. ' . $_GET['breakfast'] . ' sound delicious.'; //. simliar to + for concatenation
	 }
	 ?>

</body>
</html>