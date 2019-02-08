<?php 
	include "inc/config.php";
	include "inc/connection.php";
	include "inc/validate_login.php";
	include "inc/userList.php";
	include "header.php"
?>


<div class= "container-fluid">
	<nav class="navbar navbar-expand-sm ">
		<ul class= "navbar-nav navbar-right navigation-list">
			<li><a class="btn btn-warning"  href="addUser.php">Add User</a></li>
			<li><a class="btn btn-warning" href="logout.php">logout</a></li>
		</ul>
	</nav>
	<h3>Users' List</h3>
</div>
<div class="container-fluid">
	<table class="list-table">
		<tr>
			<th class="user_list_head">First Name</th>
			<th class="user_list_head">Email-id</th>
			<th class="user_list_head">Action</th>
		</tr>
		
		<?php while($row= mysqli_fetch_array($result)): ?>
		<tr>
			<td class="user_list_item"><?php echo $row['f_name']; ?></td>
			<td class="user_list_item"><?php echo $row['email_id']; ?></td>
			<td class="user_list_item">
				<a class="post-link" href="addUser.php?edit=<?php echo $row['user_id']; ?>">
				<button  class="btn btn-primary" >Edit</button></a>
				
				<a class="post-link"  href="addUser.php?delete=<?php echo $row['user_id']; ?>">
				<button class="btn btn-danger">Delete</button></a>	
			</td>
		</tr>
		<?php endwhile; ?>
		
	</table>
</div>

<?php 
	include "footer.php";
?>