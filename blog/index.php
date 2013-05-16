<?php require('db_connect.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Melissa's PHP Blog</title>
</head>

<body>		
	<header>
		<h1>Melissa's Blog</h1>
	</header>

	<main>
		<?php
			// set up a query to get the latest 2 posts that are public
			$query = 'SELECT title, body, date, category_id, post_id
						FROM posts
						WHERE is_public = 1
						ORDER BY date DESC
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
				<h3><?php echo $row['title']; ?></h3>
				<div class="postmeta">Posted on <?php echo $row['date']; ?> | in the category NAME</div>
				<p><?php echo $row['body']; ?></p>
			</article>

			<?php
				endwhile;
			?>

		<?php else: ?>
			<h2>No Posts to Show</h2>

		<?php endif; ?>

	</main>

	<?php include('sidebar.php'); ?>

	<footer>
		<p>&copy; 2013 Platt College</p>
	</footer>
</body>
</html>