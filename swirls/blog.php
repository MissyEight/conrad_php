<?php
			// set up a query to get the latest 2 posts that are public, * means all fields
			$query = 'SELECT blog_posts.*, blog_categories.*, users.username, users.user_id
						FROM blog_posts, blog_categories, users
						WHERE blog_posts.is_public = 1
						AND blog_posts.category_id = blog_categories.category_id
						AND blog_posts.user_id = users.user_id
						ORDER BY blog_posts.date DESC
						LIMIT 10';
			//run it and ck to make sure the result contains posts
			if( $result = $db->query($query) ):
		?>

		<h2>Swirls Bakery Blog:</h2>

			<?php
				// loop through the list of results
				while( $row = $result->fetch_assoc() ):
			?>

			<article class="post">				
				<h3 class="blog_title"><a href="index.php?page=blog-single&amp;post_id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a></h3>
				<div class="postmeta">Posted on <time datetime="<?php echo $row['date']; ?>"><?php echo convert_date($row['date']); ?></time>
					| in the category <?php echo $row['name']; ?>
					| By <?php echo $row['username']; ?>
				</div>
				<p class="post_body"><?php echo $row['body']; ?></p>
			</article>

			<?php
				endwhile;
			?>

		<?php else: ?>
			<h2>No Posts to Show</h2>

		<?php endif; ?>