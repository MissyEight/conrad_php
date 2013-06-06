<?php require('db_connect.php'); 
include_once( 'functions.php' ); //include_once to avoid fatal errors in calling duplicate named fns
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Swirls</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="css/format.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="alternate" type="application/rss+xml" title="RSS Feed of Swirls Blog" href="rss.php"/>
</head>
<body <?php echo mc_body_class(); ?> id="wrapper">
<!--<div id="wrapper">-->
	<header>
		<h1><a href="index.php">Swirls</a></h1>
		<h2 id="tagline">Send someone a smile!</h2>
		<ul class="utilities">
			<li class="login"><a href="login.php">Log In</a></li>
			<li class="register"><a href="register.php">Register</a></li>
		</ul>
		<?php include('searchform.php'); ?>
		<nav>
			<ul>	
				<li class="contact"><a href="index.php?page=contact">Contact</a></li>
				<li class="order"><a href="index.php?page=order">Order</a></li>
				<li class="specials"><a href="index.php?page=specials">Specials</a></li>
				<li class="cupcakes"><a href="index.php?page=cupcakes">Cupcakes</a></li>
				<li class="about"><a href="index.php?page=about">About</a></li>
			</ul>
		</nav>
	</header>
<!--	<div id="container">-->
		<main>
			<?php 
				//logic to load the correct page contents
				//URI will look like domain/index.php?page=something, use $_GET to get a variable "page" in browser bar
				switch( $_GET['page'] ){
					case 'about':
						include( 'content-about.php' );
					break;
					case 'cupcakes':
						include( 'content-cupcakes.php' );
					break;
					case 'shop-category':
						include( 'content-category.php' );
					break;
					case 'single':
						include( 'content-single.php' );
					break;
					case 'specials':
						include( 'content-specials.php' );
					break;
					case 'order':
						include( 'content-order.php' );
					break;
					case 'contact':
						include( 'content-contact.php' );
					break;				
					case 'search':
						include( 'content-search.php' );
					break;
					case 'faqs':
						include( 'content-faqs.php' );
					break;
					case 'terms':
						include( 'content-terms.php' );
					break;
					case 'privacypolicy':
						include( 'content-privacypolicy.php' );
					break;
					case 'sitemap':
						include( 'content-sitemap.php' );
					break;
					case 'blog':
						include( 'blog.php' );
					break;
					case 'blog-single':
						include( 'blog-content-single.php' );
					break;
					default:
						include('content-home.php');
				}
			?>
		</main>		
<!--	</div>  end container -->
	<footer class="mainfooter">
		<h3 class="rss"><a href="rss.php">Subscribe to Feed</a></h3>
		<nav id="mainfoot">
			<ul>
				<li class="home"><a href="index.php">Home</a></li>		
				<li class="about"><a href="index.php?page=about">About</a></li>
				<li class="cupcakes"><a href="index.php?page=cupcakes">Cupcakes</a></li>
				<li class="specials"><a href="index.php?page=specials">Specials</a></li>
				<li class="order"><a href="index.php?page=order">Order</a></li> 
				<li class="faqs"><a href="index.php?page=faqs">FAQs</a></li>
				<li class="contact"><a href="index.php?page=contact">Contact</a></li>		
				<li class="terms"><a href="index.php?page=terms">Terms of Service</a></li>			
				<li class="privacypolicy"><a href="index.php?page=privacypolicy">Privacy Policy</a></li>
				<li class="sitemap"><a href="index.php?page=sitemap">Site Map</a></li>	
				<li class="blog"><a href="index.php?page=blog">Blog</a></li>			
			</ul>
		</nav>
		<p>&copy; 2013 Swirls All rights reserved. | Site developed by <a href="http://www.theconradconcept.com" target="blank">The Conrad Concept</a></p>
	</footer>

<!--</div> <!-- end wrapper -->
</body>
</html>