<?php //this is a database connection
				// db host, username, password, database name
$db = new mysqli( 'localhost', 'mconrad_bloguser', '3+6k1C0JTI0w', 'mconrad_phpblog' );

// if there is an error connecting, kill the page
if( $db->connect_errno > 0 ){
	die( 'Unable to connect to the database' );
}