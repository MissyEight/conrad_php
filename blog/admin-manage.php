<h2>Manage Your Posts</h2>

<section class="panel">
	<?php 
	//get all the posts written by the logged in user, newest first
	$query = "SELECT *
				FROM posts
				WHERE user_id = $user_id
				ORDER BY date DESC"; //DESC newest first
	$result = $db->query($query);
	//make sure at least one post was found
	if( 1 <= $result->num_rows ): //if no rows found, don't show table
	?>
	<table>
		<tr>
			<th>Title</th> <!--th table heading so bold in browser -->
			<th>Visibility</th>
			<th>Date</th>
			<th>Comments</th>
		</tr>

		<?php while( $row = $result->fetch_assoc() ): //fetch_assoc pulls out the top row in $result ?> 
		<tr>
			<td><a href="admin.php?page=edit&amp;post_id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a></td>
			<td><?php echo is_it_public($row['is_public']); ?></td>
			<td><?php echo convert_date($row['date']); ?></td>
			<td># Comments</td>
		</tr>
		<?php endwhile; ?>
		
	</table>

	<?php
	else:
		echo 'You haven\'t written any posts yet!';
	endif; //one row found
	 ?>
</section>