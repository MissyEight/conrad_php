<?php require('db_connect.php'); 
include_once( 'functions.php' ); //include_once to avoid fatal errors in calling duplicate named fns
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Captain's Blog</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="css/format.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="alternate" type="application/rss+xml" title="RSS Feed of Blog Posts" href="rss.php"/>
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merienda:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="wrapper">

	<header>
		<h1><a href="index.php">Captain's Blog</a></h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=blog">Blog</a></li>
				<li><a href="index.php?page=links">Links</a></li>
			</ul>
		</nav>
		<!--<hr class="hrstyle1" />-->
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
					case 'single':
						include( 'content-single.php' );
					break;
					default:
						include('content-home.php');
				}
			?>
		</main>

		<?php include('sidebar.php'); ?>
	</div> <!-- end container -->
	<footer>
		<p>&copy; 2013 Captain&#39;s Blog | Developed by <a href="http://www.theconradconcept.com" target="blank">The Conrad Concept</a></p>
	</footer>

</div> <!-- end wrapper -->
</body>
</html>