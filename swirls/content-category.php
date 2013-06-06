<?php 
//which shop category are we displaying?
$shop_category = $_GET['shop_cat'];

//displays shop category at the top of the page
$query_title = "SELECT s_c.*
				FROM shop_categories s_c
				WHERE s_c.category_id = $shop_category";
$result_title = $db->query($query_title);
if( 1 <= $result_title->num_rows ):
	$row_title = $result_title->fetch_assoc();
?>
				
<h2><?php echo $row_title['name']; ?></h2>
<?php
endif;?>

<?php
//lists all products for each shop category
$query = "SELECT p.*
			FROM products p, products_categories p_c
			WHERE p.product_id = p_c.product_id
			AND p_c.category_id = $shop_category
			ORDER BY p.title ASC";
$result = $db->query($query);
if( $result->num_rows >= 1 ):
	while ( $row = $result->fetch_assoc() ):
?>

<article>
	<h3><a href="index.php?page=single&amp;product_id=<?php echo $row['product_id']; ?>"><?php echo $row['title']; ?></a></h3>
</article>

<?php 
	endwhile;
endif;?>

<?php include('sidebar.php'); ?>