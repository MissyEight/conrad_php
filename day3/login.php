<?php 
// the correct username/password combo
$correct_username = 'melissa';
$correct_password = "phprules";

// if the form was submitted, try to log them in by using post to get value
if( $_POST['did_login'] == 1 ){
	// extract the values the user typed in
	$username = $_POST['username']; //set variable to easier refer to this code
	$password = $_POST['password'];

	// compare user values with correct values. if they match, log them in
	if ( $username == $correct_username && $password == $correct_password ) {
		$logged_in = 1; // 1 means true
	}else{
		$error = 1;
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log in to your account</title>
</head>

<body>
<?php 
// if not logged in, show the form
if( !$logged_in ){ ?>

	<h1>Log In!</h1>
	
	<?php 
		// if an error was triggered, show a message
		if ( $error ) {
			echo 'Username and password do not match. Try again.';
		}
	 ?>


	<form method="post" action="login.php"> 
		<label for="username">Username:</label>
		<input type="text" name="username" id="username"> <!--"for" should be the same as "id" -->
		<br />

		<label for="password">Password:</label>
		<input type="password" name="password" id="password"> <!-- type=password displays *** -->
		<br>

		<input type="submit" value="Log In">
		<input type="hidden" name="did_login" value="1"> <!-- hidden field to ck if user logged in. if did_login = 1, then parse form-->
	</form>

<?php 
} // end if not logged in 
else{
	echo 'You are logged in.';
}?>

</body>
</html>