<?php
// parse the form if it was submitted
if( $_POST['did_submit'] ):
	// extract user submitted data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$newsletter = $_POST['newsletter'];

	// TODO: validate form!
	if( 1 == $newsletter ):
		$newsletter = 'Yes!';
	else:
		$newsletter = 'No!';
	endif;

	// get ready to send mail - set up mail() parameters
	$to ='melissa.conrad209@gmail.com';
	$subject = 'Contact form from wp310 class demo';

	$body = "Name: $name \n"; // use double quotes to drop in name variable, \n adds line break
	$body .= "Email: $email \n"; // .= to concatinate
	$body .= "Phone: $phone \n\n";
	$body .= "Add to Newsletter List? $newsletter \n\n";
	$body .= "Message: $message \n\n";

	$header = "Reply-to: $email \r\n"; // \r\n carriage return with new line
	$header = "From: $name \r\n";

	// send it! did_send will equal 1 if the mail sends, 0 if it fails to send
	$did_send = mail( $to, $subject, $body, $header );

	// handle success/failure user feedback
	if( $did_send ):
		$display_msg = 'Thank you for your message, '.$name.'. I will get back to you soon.';
		$css_class = success;
	else:
		$display_msg = 'Sorry, there was a problem sending your message.';
		$css_class = error;
	endif; // did_send - did the email send

endif; // did_submit - did they click the button

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Example Contact Form - Simple</title>
<link href='http://fonts.googleapis.com/css?family=Days+One' rel='stylesheet' type='text/css'>
<style>
	body {
		font: 100% "Trebuchet MS", Arial, Helvetica, sans-serif;
		background: #232323;
	}
	#wrapper {
		width: 960px;
		margin: 0 auto;
	}	
	#container { 
		width: 500px;
		margin: 0 auto;
		margin-top: 70px;
		border: 2px solid #fff;
		background: #444;
		padding: 30px;
	}
	h1 {
		color: #fff;
		padding: 20px;
		text-align: center;
		font-family: 'Days One', sans-serif;
		font-size: 40px;
		font-weight: normal;
	}
	form{
		background: #333333;
		padding: 30px;
		margin: 0 50px;
		-webkit-border-radius: 10px;
    	border-radius: 10px;
	}
	label {
		color: #88AC55;
		display: block;
		margin: 0 0 3px 43px;
	}
	#newsletter_label {
		display: inline;
		margin: 0 0 3px 15px;
	}
	#newsletter {
		margin: 0 0 3px 43px;
	}
	input[type=text],
	textarea{
		display: block;
		width: 250px;
		margin: 0 0 10px 43px; 
	}	
	input[type=submit]{
		margin: 7px 0 3px 43px;
		padding: 5px 7px;
		background-color: Darkorange;
		color: white;
		font-weight: bold;
	}
	input[type=submit]:hover{
		background-color: orange;
	}
	.success{
		margin: 0 0 10px 43px; 
		color: #88AC55;
	}
	.error{
		margin: 0 0 10px 43px; 
		color: orange;
	}
</style>

</head>
<body>
<div id="wrapper">
<div id="container">		
	<header>
		<h1>Contact Me!</h1>
	</header>
	<?php
		if( isset($display_msg) ):
			echo "<div class='$css_class'>";
			echo $display_msg;
			echo '</div>';
		endif;
	?>
	<?php if( !$did_send ): ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" />

		<label for="email">Email Address</label>
		<input type="text" name="email" id="email" />

		<label for="phone">Phone Number</label>
		<input type="text" name="phone" id="phone" />

		<label for="message">Message</label>
		<textarea name="message" id="message"></textarea>

		<input type="checkbox" name="newsletter" value="1" id="newsletter" />
		<label for="newsletter" id="newsletter_label">Subscribe to our newsletter</label>

		<input type="submit" value="Send">
		<input type="hidden" name="did_submit" value="1"> <!-- submitted form gets a value of 1 -->
	</form> 
	<?php endif; // form if did_send ?>
</div> <!-- end container -->
</div> <!-- end wrapper -->
</body>
</html>