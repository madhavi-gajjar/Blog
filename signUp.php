<?php
	include "inc/config.php";
	include "inc/connection.php";
	include "admin/inc/functions.php";
	include "inc/signUp.php";
	include "header.php";
?>

<form action="signUp.php" method="post">
<?php display_errors();?>
  <div class="container">
    <h1>Sign Up</h1>
		<div class="form-group">
			<label for="email"><b>Email: </b></label>
			<input class="form-control" type="text" placeholder="Enter first name" name="email_id" >
			
			<label for="last_name"><b>First Name: </b></label>
			<input class="form-control" type="text" placeholder="Enter last name" name="first_name" >
			
			<label for="first_name"><b>Last Name: </b></label>
			<input class="form-control" type="text" placeholder="Enter Email" name="last_name" >

			<label for="psw" ><b>Password: </b></label>
			<input class="form-control" type="password" placeholder="Enter Password" name="user_password" >

			<label for="psw-repeat"><b>Repeat Password: </b></label>
			<input class="form-control" type="password" placeholder="Repeat Password" name="repeat_password" >

    
	<label class="checkbox-inline"><input type="checkbox" value="remember">Remember me</label>
	

    <div class="container">
      <button type="submit" class="btn btn-success" name="submit">Sign Up</button>
      <button type="submit" class="btn btn-danger" name="cancel" >Cancel</button>
    </div>
  </div>
</form>
<?php 
	include "footer.php";
?>