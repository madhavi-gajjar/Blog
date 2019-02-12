<?php
	include "inc/config.php";
	include "inc/connection.php";
	include "inc/validate_login.php";
	include "inc/blog_list.php";
	include "header.php";
	
?>

	
<div class='container-fluid'>
	<h2>All Blogs</h2>
	<table class='list_table'>
		<tr>
			<th class='post_list_head'>Blog Title</th>
			<th class='post_list_head'>Blog created on</th>
			<th class='post_list_head'>Posted By</th>
			<th class='post_list_head'>Action</th>
		</tr>
		<tr>
	<?php
		
	while($row = mysqli_fetch_array($result)): ?>
		
		<td class='post_list_item'><?php echo $row['post_title']; ?></td>
		<td class='post_list_item'><?php echo $row['date_of_creation']; ?></td>
		<td class='post_list_item'><?php echo $row['author']; ?></td>
		<td class='post_list_item'>
				<a class='post-link' href="blog_post.php?edit=<?php echo $row['post_id']; ?>">
				<button  class='btn btn-primary'>Edit</button></a>
				<a class='post-link'  onClick="return confirm('Confirm deletion');" href="blog_post.php?delete=<?php echo $row['post_id']; ?>">
				<button type="button" class="btn btn-danger">Delete</button></a>	
		</td>
		</tr>
		<?php endwhile; ?>
		</table>
	</div>

		
	 <?php
    include "footer.php";
   ?>

