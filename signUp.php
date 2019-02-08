<?php
	include "inc/config.php";
	include "inc/connection.php";
	include "inc/signUp.php";
	include "header.php";
?>

<form action="signUp.php" method="post">
  <div class="container">
    <h1>Sign Up</h1>
		<div class="form-group">
			<label for="email"><b>Email: </b></label>
			<input class="form-control" type="text" placeholder="Enter Email" name="email_id" required>
			
			<label for="email"><b>First Name: </b></label>
			<input class="form-control" type="text" placeholder="Enter Email" name="email_id" required>
			
			<label for="email"><b>Last Name: </b></label>
			<input class="form-control" type="text" placeholder="Enter Email" name="email_id" >

			<label for="psw" ><b>Password: </b></label>
			<input class="form-control" type="password" placeholder="Enter Password" name="user_password" required>

			<label for="psw-repeat"><b>Repeat Password: </b></label>
			<input class="form-control" type="password" placeholder="Repeat Password" name="repeat_password" required>

    
	<label class="checkbox-inline"><input type="checkbox" value="remember">Remember me</label>
	

    <div class="container">
      <button type="button" class="btn btn-danger" >Cancel</button>
      <button type="submit" class="btn btn-success" name="submit">Sign Up</button>
    </div>
  </div>
</form>
<?php 
	include "footer.php";
?>