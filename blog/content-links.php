<?php
		
		$query_links = "SELECT title, url, description
						FROM links
						ORDER BY title ASC
						LIMIT 10";
		if ( $results_links = $db->query($query_links) ):
		?>
			<h2>Favorite Links:</h2>
			<ul>
				<?php 
				while ( $row_links = $results_links->fetch_assoc() ):?>
					<li><a href="<?php echo $row_links['url']?>" target="blank" ><?php echo $row_links['title']; ?></a> - <?php echo $row_links['description']?></li>
				<?php endwhile; ?>
			</ul>	
		<?php endif; ?>	