<?php 

	include "inc/config.php";
	include "inc/connection.php";
	include "admin/header.php";
	
?>

	<p>Click the link to reset Password: <a href="reset_password.php"><?php echo $_GET['QUERY_STRING']; ?></a> </p> 

	
<?php 
	include "footer.php";
?>