<?php require('db_connect.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Melissa's PHP Blog</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="css/format.css" rel="stylesheet" type="text/css" media="screen"/>
<link href='http://fonts.googleapis.com/css?family=Montserrat+Subrayada:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="wrapper">

	<header>
		<h1>Melissa's Blog</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=blog">Blog</a></li>
				<li><a href="index.php?page=links">Links</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<?php 
				//logic to load the correct page contents
				//URI will look like domain/index.php?page=something, use $_GET to get a variable "page" in browser bar
				switch( $_GET['page'] ){
					case 'blog':
						include( 'content-blog.php' );
					break;
					case 'links':
						include( 'content-links.php' );
					break;
					default:
						include('content-home.php');
				}
			?>
		</main>

		<?php include('sidebar.php'); ?>
	</div> <!-- end container -->
	<footer>
		<p>&copy; 2013 Platt College</p>
	</footer>

</div> <!-- end wrapper -->
</body>
</html>