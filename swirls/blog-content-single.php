<?php
// TODO: Validate this so if a user messes with the URL, it doesn't show a blank page
//what post are we trying to show?
$post_id = $_GET['post_id'];

include( 'blog-comment-parse.php' );

	// set up a query to get the posts that we're trying to view if it is published, * means all fields
	$query = "SELECT blog_posts.*, blog_categories.*, users.username, users.user_id
				FROM blog_posts, blog_categories, users
				WHERE blog_posts.is_public = 1
				AND blog_posts.category_id = blog_categories.category_id
				AND blog_posts.user_id = users.user_id
				AND blog_posts.post_id = $post_id
				ORDER BY blog_posts.date DESC
				LIMIT 1";
	//run it and ck to make sure the result contains posts
	if( $result = $db->query($query) ):
?>	
	<?php
		// loop through the list of results
		while( $row = $result->fetch_assoc() ):
	?>

	<article class="post">
		<h3 class="blog_title"><?php echo $row['title']; ?></h3>
		<div class="postmeta">Posted on <time datetime="<?php echo $row['date']; ?>"><?php echo convert_date($row['date']); ?></time>
			| in the category <?php echo $row['name']; ?>
			| By <?php echo $row['username']; ?>
		</div>
		<p class="post_body"><?php echo $row['body']; ?></p>
	</article>

	<?php //get all the 'approved' comments on THIS post, oldest first
	$query_comm = "SELECT name, date, body
					FROM comments
					WHERE is_approved = 1
					AND post_id = $post_id
					ORDER BY date ASC"; 
if( $result_comm = $db->query($query_comm) ): //cks to see if there are comments before displaying	
	?>

	<section id="comments"> 
		<h3><?php echo comments_number($result_comm->num_rows); ?></h3>

		<?php if( $result_comm->num_rows > 0 ): ?>
		<ol>
			<?php //loop through each comment
			while( $row_comm = $result_comm->fetch_assoc() ): ?>
			<li>
				<h4><?php echo $row_comm['name']; ?> says:</h4>
				<p><?php echo $row_comm['body']; ?></p>
				<time datetime="<?php echo $row_comm['date']; ?>"><?php echo convert_date($row_comm['date']); ?></time>
			</li>
			<?php endwhile; 
			//set the comments result free, bc we are DONE w/ it
			$result_comm->free(); ?>
		</ol>
		<?php else: ?>
		<h4> Your comment could be the first! </h4>
		<?php endif; //more than 0 results ?>
	</section>
<?php endif; //comment results found ?>

<?php 
//only show the form if comments are allowed
if( 1 == $row[ 'allow_comments' ] ):
	include( 'blog-comment-form.php' );
endif;
?>

	<?php
	endwhile; //post was found
	?>

<?php else: ?>

	<h2>No Posts to Show</h2>

<?php endif; ?>