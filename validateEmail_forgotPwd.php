<?php 
	include "inc/config.php";
	include "inc/connection.php";
	include "inc/validateEmail_forgotPwd.php";
	include "header.php";
?>


	<form method="post" action="">
		<div class= "container">
			<?php 
				echo $error;
			?>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" placeholder="Enter email" name="email_id" > 
			</div>
			<div class="form-group">
			<a href="display_key.php">
				<button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button></a>
			</div>
		</div>
	</form>

<?php 
	include "footer.php";
?>