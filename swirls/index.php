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
<!--<link rel="shortcut icon" href="images/favicon.png"/>-->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.slides.min.js"></script>
<script src="js/ss.js" type="text/javascript"></script>
</head>
<body <?php echo mc_body_class(); ?>>
<div id="wrapper">
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
</div> <!--end wrapper -->	
<!--	</div>  end container -->
	<footer class="mainfooter">		
		<section id="footer-signup" >
        		<p id="footer-subtitle">Join Our Mailing List</p>	            
    	    	<p id="footer-text">Enter your email address for sweet offers and upcoming events!</p>
	            <form id="quickcontact" method="post" action="#">
    	    	    <input type="email" name="email" id="quick-email" class="quick-email" placeholder='Email Address' required/>
                   	<button type="submit" class="send" name="send">Sign Up</button>            		
    	        </form>
        	    <p id="footer_privacy"><a href="index.php?page=privacypolicy">Read Privacy Statement</a></p>
        </section> <!-- end footer-signup -->
		<ul class="social_links">
           	<li><a href="https://www.facebook.com/" target="_blank" class="facebook">Facebook</a></li>
            <li><a href="https://twitter.com/" target="_blank" class="twitter">Twitter</a></li>
            <li><a href="http://www.youtube.com/" target="_blank" class="youtube">YouTube</a></li>
            <li><a href="https://plus.google.com/" target="_blank" class="google">Google+</a></li>
        </ul>
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
		<p class="smallprint">&copy; 2013 Swirls All rights reserved. | Site developed by <a href="http://www.theconradconcept.com" target="blank">The Conrad Concept</a></p>
	</footer>

<!--</div> <!-- end wrapper -->
</body>
</html>