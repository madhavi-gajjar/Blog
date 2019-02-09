<?php 

	include "inc/config.php";
	include "inc/connection.php";
	include "inc/display_key.php";
	include "admin/header.php";
	

	 
	while($row= mysqli_fetch_array($result)):
	?>
	
	<p>Click the link to reset Password: <a href="reset_password.php?key=<?php echo $row['random_key']; ?>"><?php echo $row['random_key'];  ?></a> </p>
	<?php endwhile; ?>
	
<?php 
	include "footer.php";
?>