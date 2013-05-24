<aside class="cf">

	<h2 class="rss"><a href="rss.php">Subscribe to Feed</a></h2>

		<?php 
		// set up query to get the title & post_id of the latest 10 posts
		$query_latest = "SELECT title, post_id
						FROM posts
						WHERE is_public = 1
						ORDER BY date DESC
						LIMIT 10";
		// run query and check for results
		if( $results_latest = $db->query($query_latest) ):
		?>
			<h2>Latest Posts</h2>
			<ul>
				<?php 
				// from the list of results, go through each row, one at a time
				while( $row_latest = $results_latest->fetch_assoc() ): ?>
					<li class="skullbullet"><a href="index.php?page=single&amp;post_id=<?php echo $row_latest['post_id']; ?>"><?php echo $row_latest['title']; ?></a></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>



		<?php 
		$query_categories = "SELECT name
							FROM categories
							ORDER BY name ASC
							LIMIT 10";		
		if( $results_categories = $db->query($query_categories) ):
		?>	
			<h2>Categories</h2>
			<ul>
				<?php 
				while ( $row_categories = $results_categories->fetch_assoc() ):?>
					<li class="skullbullet"><a href="#"><?php echo $row_categories['name']; ?></a></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>	



		<?php 
		$query_links = "SELECT title, url
						FROM links
						ORDER BY title ASC
						LIMIT 10";
		if ( $results_links = $db->query($query_links) ):
		?>
			<h2>Links I Like:</h2>
			<ul>
				<?php 
				while ( $row_links = $results_links->fetch_assoc() ):?>
					<li class="skullbullet"><a href="<?php echo $row_links['url']?>" target="blank" ><?php echo $row_links['title']; ?></a></li>
				<?php endwhile; ?>
			</ul>	
		<?php endif; ?>	

</aside>