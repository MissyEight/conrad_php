<aside class="cf">

		<?php 
		//list product categories
		$query_categories = "SELECT name
							FROM shop_categories
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


</aside>