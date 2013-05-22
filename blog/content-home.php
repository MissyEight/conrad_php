<?php
			// set up a query to get the latest 2 posts that are public, * means all fields
			$query = 'SELECT posts.*, categories.*, users.username, users.user_id
						FROM posts, categories, users
						WHERE posts.is_public = 1
						AND posts.category_id = categories.category_id
						AND posts.user_id = users.user_id
						ORDER BY posts.date DESC
						LIMIT 2';
			//run it and ck to make sure the result contains posts
			if( $result = $db->query($query) ):
		?>

			<h2>Most Recent Posts:</h2>

			<?php
				// loop through the list of results
				while( $row = $result->fetch_assoc() ):
			?>

			<article class="post">
				<h3 class="blog_title"><a href="index.php?page=single&amp;post_id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a></h3>
				<div class="postmeta">Posted on <time datetime="<?php echo $row['date']; ?>"><?php echo convert_date($row['date']); ?></time>
					| in the category <?php echo $row['name']; ?>
					| By <?php echo $row['username']; ?>
				</div>
				<p><?php echo $row['body']; ?></p>
			</article>

			<?php
				endwhile;
			?>

		<?php else: ?>
			<h2>No Posts to Show</h2>

		<?php endif; ?>