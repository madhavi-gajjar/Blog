<?php 
	session_start();
	$email_id= $_SESSION['email_id'];
	$query= "SELECT * FROM reset_pwd_keys WHERE email_id= '$email_id'";
	$result= mysqli_query($conn, $query);

	
?>