<section id="commentform">
	<h3>Leave a Comment:</h3>

	<?php 
	//error/success reporting
	if( isset($message) ):
		echo '<div class="message">' . $message . '</div>';
	endif;
	?>

	<form method="post" action="#commentform"> <!-- #commentform is an anchor, use smoothscroll to look nice -->
		<label for="name">Name</label> <!-- label "for" is connected to input id -->
		<input type="text" name="name" id="name" required="required" placeholder=" Required" /> <!-- required only works on new browser -->

		<label for="email">Email Address (will not be published)</label>
		<input type="email" name="email" id="email" required="required" placeholder=" Required" />

		<label for="url">Website Address</label>
		<input type="url" name="url" id="url" />

		<label for="comment">Comment</label>
		<textarea name="comment" id="comment" required="required" placeholder=" Required"></textarea>

		<input type="submit" value="Post" />
		<input type="hidden" name="did_comment" value="1" />

	</form>
</section>