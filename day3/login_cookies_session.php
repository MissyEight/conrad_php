<?php 
// open a new session or resume the existing session
session_start();
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
		// use cookies and sessions to remember the user
		$_SESSION['logged_in'] = 1;
		setcookie( 'logged_in', 1, time() + 60 * 60 * 24 * 14); // session and cookie logged_in are 2 different things (name, value, when expires seconds*minutes*hrs*days(=2weeks))
	}else{
		$error = 1;
	}
}

// if the user is trying to log out, unset and destroy the session and cookies
if( $_GET['action'] == 'logout'){
	unset( $_SESSION['logged_in'] );
	session_destroy();
	setcookie('logged_in', '', time() - 60 * 60 * 24 * 365 ); // cookie = '' still exists so we set it back 1 year to expire
}
// if the user visits the page and the cookie is still valid, re-create the session variable
elseif( $_COOKIE['logged_in'] == 1 ) {
	$_SESSION['logged_in'] = 1;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log in to your account</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="css/format.css" rel="stylesheet" type="text/css" media="screen"/>
<link href='http://fonts.googleapis.com/css?family=Days+One' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="wrapper">
<div id="container">	
<?php 
// if not logged in, show the form
if( !$_SESSION['logged_in'] ){ ?>

	<h1>Log In!</h1>
	
	<?php 
		// if an error was triggered, show a message
		if ( $error ) {
			echo "<div id=\"errormsg\">Username and password do not match. Try again.</div>";
		}
	 ?>


	<form method="post" action="login_cookies_session.php"> 
		<label for="username">Username</label>
		<input type="text" name="username" id="username"> <!--"for" should be the same as "id" -->
		<br />

		<label for="password">Password</label>
		<input type="password" name="password" id="password"> <!-- type=password displays *** -->
		<br>

		<input type="submit" value="Log In">
		<input type="hidden" name="did_login" value="1"> <!-- hidden field to ck if user logged in. if did_login = 1, then parse form-->
	</form>

<?php 
} // end if not logged in 
else{ ?>
	
	<p id="loggedin">You are logged in!</p>
	<p><a href="login_cookies_session.php?action=logout">Log Out</a></p> <!-- assigning path and trigger action logout -->


<?php }?>
</div> <!-- end container -->
</div> <!-- end wrapper -->
</body>
</html>