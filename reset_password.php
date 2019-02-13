<?php 
	include "inc/config.php";
	include "inc/connection.php";
	include 'admin/inc/functions.php';
	include "inc/reset_password.php";
	include "admin/header.php";
?>

	<form method="post" action="">
		<div class="container">
		<?php 
			display_error($error);
		?>
			<div class="form-group">
				<label for="email">Email:</label>
				<?php  while($row= mysqli_fetch_array($result)): ?>
				<input type="email" class="form-control" id="email"  name="email_id" value="<?php echo $row['email_id']; ?>" required> 
				<?php endwhile; ?>	
			</div>
			
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"  >
			</div>
			<div class="form-group">
				<label for="repPwd">Password:</label>
				<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="repwd"  >
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-info" name="reset">Reset</button>
				<button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
			</div>
			</div>
		</div>
	</form>