<?php
// create some vars - possible values are 'success' or 'error'
$status ='success';

// logic to contol the message text based on the status
if( $status == 'success'){
	$message = 'Your information was submitted successfully! YAY!';
}else{
	$message = 'Sorry. Something went wrong. Try again.';
}

?>
<!DOCTYPE html>
<html>
<head>
	<style>
		.error {
			background-color: #F00;
		}
		.success {
			background-color: #0f0;
		}
	</style>
</head>

<body>
	<div class="<?php echo $status; ?>">
		<?php
		// this is a secret comment
		echo $message; ?>
	</div>
</body>
</html>