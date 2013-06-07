<aside class="cf">

	<?php 
	//list product categories
	$query_categories = "SELECT *
						FROM shop_categories
						ORDER BY name ASC
						LIMIT 10";		
	if( $results_categories = $db->query($query_categories) ):
	?>	
		<h2>Categories</h2>
		<ul class="sidenav">
			<?php 
			while ( $row_categories = $results_categories->fetch_assoc() ):?>
				<li><a href="index.php?page=shop-category&amp;shop_cat=<?php echo $row_categories['category_id'] ?>"><?php echo $row_categories['name']; ?></a></li>

				<?php
				//set a category id
				$category_id = $row_categories['category_id'];

				//lists all products for each shop category
				$query_product = "SELECT p.*
						FROM products p, products_categories p_c
						WHERE p.product_id = p_c.product_id
						AND p_c.category_id = $category_id
						ORDER BY p.title ASC";
				$result = $db->query($query_product);
				if( $result->num_rows >= 1 ):
					while ( $row = $result->fetch_assoc() ):
				?>

				<article>
					<ul class="side-products">
						<li><a href="index.php?page=single&amp;product_id=<?php echo $row['product_id']; ?>"><?php echo $row['title']; ?></a></li>
					</ul>
				</article>

				<?php 
					endwhile;
				endif;?>


			<?php endwhile; ?>
		</ul>
	<?php endif; ?>	


</aside>