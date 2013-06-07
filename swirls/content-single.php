<?php
// TODO: Validate this so if a user messes with the URL, it doesn't show a blank page
//what post are we trying to show?
$product_id = $_GET['product_id'];

	// set up a query to get the products that we're trying to view, * means all fields
	$query = "SELECT p.*
				FROM products p
				WHERE p.product_id = $product_id
				LIMIT 1";
	//run it and ck to make sure the result contains products
	if( $result = $db->query($query) ):
?>	
	<?php
		// loop through the list of results
		while( $row = $result->fetch_assoc() ):
	?>

	<article class="product">
		<h3 class="product_title"><?php echo $row['title']; ?></h3>		
		<p class="product_body"><?php echo $row['body']; ?></p>
		<p class="product_price"><?php echo $row['price']; ?></p>
	</article>

	<article>
		<h4>Suggested Cupcakes</h4>
	</article>	

	<article>
		<h5>Customer Reviews</h5>
	</article>

	<?php
	endwhile; //product was found
	?>

<?php endif; ?>




<?php include('sidebar.php'); ?>