<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Post Method Example</title>
</head>

<body>
	<form method="post" action="post.php">
		<label for="name">What is your name?</label>
		<input type="text" name="name" id="name" />

		<label for="breakfast">What did you eat for breakfast?</label>
		<input type="text" name="breakfast" id="breakfast" />

		<input type="submit" value="Go!" /> <! backslash not necessary >
		<input type="hidden" name="did_submit" value="1"> <!1 means true>
	</form>

	<?php 
	// only show the message if the form was submitted
	if( $_REQUEST['did_submit'] == 1 ){ // can use either $_POST or REQUEST
		/*echo 'Good Morning, ';
		echo $_REQUEST['name'];
		echo '. ';
		echo $_REQUEST['breakfast'];
		echo ' sound delicious.';*/

		echo 'Good Morning, '.$_REQUEST['name'] . '. ' . $_REQUEST['breakfast'] . ' sound delicious.'; //. simliar to + for concatenation
	 }
	 ?>

</body>
</html>