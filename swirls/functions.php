<?php 
//Run this function on any datetime data to make it human-friendly
function convert_date($dateR){
	$engMon=array('January','February','March','April','May','June','July','August','September','October','November','December',' ');
	$l_months='January:February:March:April:May:June:July:August:September:October:November:December';
	$dateFormat='F j, Y';
	$months=explode (':', $l_months);
	$months[]='&nbsp;';
	$dfval=strtotime($dateR);
	$dateR=date($dateFormat,$dfval);
	$dateR=str_replace($engMon,$months,$dateR);
	return $dateR;
}

//show the number of comments on any post with good grammar
// @param $number int
function comments_number( $number ){
	if( $number == 1 ){
		echo 'One Comment on this post';
	}elseif( $number == 0 ){
		echo 'No Comments on this post';
	}else{
		echo "$number Comments on this post";
	}
}

// (/** tab = creates doc block)
/** 
 * Sanitizer for DB inputs
 * @param $input mixed - pass any 'dirty' form field
 * @param $link database connection
 */
function clean_input( $input, $link ){
	return mysqli_real_escape_string($link, strip_tags(trim($input)));
}

/**
 * Shortens a piece of post content;
 * arguments(body of text, amt of words displayed, min length of word displayed so words are not split up, $id passes link id so "read more" goes to specific article)
 */
function shorten_post($str, $length, $minword = 3, $id){
    $sub = '';
    $len = 0;   
    foreach (explode(' ', $str) as $word){
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);       
        if (strlen($word) > $minword && strlen($sub) >= $length){
            break;
        }
    }   
    return $sub . (($len < strlen($str)) ? '<span class="ellipses">&hellip;</span> <a href="?page=blog-single&amp;post_id='.$id.'">Read more</a>' : '');
}

/**
 * Returns the number of posts for any user.
 *
 * @param $link resource - mysgli connect link
 * @param $user_id int - provide any user id
 * @param $status int - OPTIONAL. What kind of posts are we counting?
 * 						1 => DEFAULT. only count public posts
 *						2 => only show private posts
 *						3 => count all posts
 * @return int - total number of posts
 * @todo hey, make this better!
 */
function count_posts( $link, $user_id, $status = 1 ){
	$query = "SELECT COUNT(*) AS total 
				FROM blog_posts
				WHERE user_id = $user_id";
	//depending on the status argument, refine the query to get the right posts
	if( 1 == $status ):
		$query .= ' AND is_public = 1'; //posts that are public
	elseif( 2 == $status ):
		$query .= ' AND is_public = 0'; //posts that are not public
	endif;

	//run it!
	$result = $link->query($query);
	$row = $result->fetch_assoc();
	return $row['total'];
}

/**
 *  Count the number of total comments for any user's posts
 * @param $link resource - mysgli connect link
 * @param $user_id int - provide any user id
 * @param $status int - OPTIONAL. What kind of comments are we counting?
 * 						1 => DEFAULT. only count approved comments
 *						2 => only count unapproved comments
 *						3 => count all comments by this user's posts
 * @return int - number of comments
 */
function count_user_comments( $link, $user_id, $status = 1 ){
	$query = "SELECT COUNT(*) AS total
				FROM blog_comments 
				LEFT JOIN blog_posts
				ON blog_posts.post_id = blog_comments.post_id 
				WHERE blog_posts.user_id = $user_id";
	if( 1 == $status ):
		$query .= ' AND comments.is_approved = 1';
	elseif( 2 == $status ):
		$query .= ' AND comments.is_approved = 0';
	endif;

	$result = $link->query($query);
	$row = $result->fetch_assoc();

	return $row['total'];
}

/**
 * Dynamically change the class (for the <body> tag) based on the page
 * @return mixed class="page"
 */
function mc_body_class(){
	$page = $_GET['page'];
	if($page == ''){
		$page = 'home';
	}
	return $body_class='class="'.$page.'"';
}













