<?php //this is a database connection
				// db host, username, password, database name
$db = new mysqli( 'localhost', 'conrad_php', 'gHJmZK?h3nxP', 'shop_mconrad' );

// if there is an error connecting, kill the page
if( $db->connect_errno > 0 ){
	die( 'Unable to connect to the database' );
}