<?php

	include "inc/config.php";
	include "inc/connection.php";
	include "inc/login.php";
	include "header.php";
?>

	
	<form method="post" action="login.php">
		<div class="container">
			<h3>Login Here!</h3>
			<?php 
				echo "$error";
			?>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" placeholder="Enter email" name="email_id" > 
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="user_password" >
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button>
			</div>
			Do not have an account? <a href="signUp.php">Signup </a> here!
		</div>
	</form>
	<?php
		include "footer.php";
		?>