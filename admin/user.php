<?php
	include "inc/config.php";
	include "inc/connection.php";
	include "inc/validate_login.php";
	include "inc/user.php";
	include "header.php";
	
?>

<form action="" method="post">
	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
  <div class="container">
  <?php if($update== TRUE): ?>
    <h1>Edit User</h1>
  <?php else: ?>
	<h1>Add User</h1>
  <?php endif; ?>
  
	<?php	
		foreach ($error as $i){
			echo $i;
			echo "<br>";	
		}
		?>
      
		<div class="form-group">
			<label for="firstName"><b>First Name: </b></label>
			<input class="form-control" type="text" placeholder="Enter First Name" name="firstName"  value="<?php echo $firstName; ?>" >
			
			<label for="lastName"><b>Last Name: </b></label>
			<input class="form-control" type="text" placeholder="Enter Last Name" name="lastName" value="<?php echo $lastName; ?>"  >
			
			<label for="email"><b>Email ID: </b></label>
			<input class="form-control" type="text" placeholder="Enter Email"  name="email" value="<?php echo $email; ?>" >
			
			<?php if($update== TRUE):?>
			<label for="psw" ><b>Password: </b></label>
			<input class="form-control" type="password" placeholder="Enter Password to change password otherwise keep the field empty" name="pwd" >
			
			<label for="psw-repeat"><b>Repeat Password: </b></label>
			<input class="form-control" type="password" placeholder="Repeat Password to change password otherwise keep the field empty"  name="repPwd" value="" >
			
			<?php else: ?>
			<label for="psw" ><b>Password: </b></label>
			<input class="form-control" type="password" placeholder="Enter Password" name="pwd" value="" >
			
			<label for="psw-repeat"><b>Repeat Password: </b></label>
			<input class="form-control" type="password" placeholder="Repeat Password"  name="repPwd" value="" >
			<?php endif; ?>
			
			<label for="status">Active user</label>
			<?php if($update== TRUE): ?>
			<input type="checkbox" 	name="status" value="1" <?php echo ($status==1?"checked": ""); ?> >
			<?php else: ?>
			<input type="checkbox" 	name="status" value="1"> 
			<?php endif; ?>


    <div class="container" style="padding-top: 5px;">
	  <?php if($update == true): ?>
	  <button class= "btn btn-info" type="submit" value="update" name="update">Update</button>
	  <button type="submit" class="btn btn-danger" name="cancel_update">Cancel</button>
	  <?php else: ?>
	  <button type="submit" class="btn btn-success" name="submit">Add</button>
	  <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
	  <?php endif; ?>
     
    </div>
  </div>
</form>

<?php
	include "footer.php";
?>