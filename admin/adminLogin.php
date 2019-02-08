<?php 
	include "inc/config.php";
	include "inc/connection.php";
	include "inc/adminLogin.php";
	include "header.php";
?>

<?php

	echo $error;

?>

		<form method="post" action="adminLogin.php">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" placeholder="Enter email" name="email" required> 
			</div>
			<div class="form-group">
				<label for="pwd">Password</label>
				<input type="password" class="form-control" placeholder="Enter password" name="pwd" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary" name="submit" value="login">Login</button>
			</div>
		</form>
		
	<?php 
		include "footer.php";
		?>