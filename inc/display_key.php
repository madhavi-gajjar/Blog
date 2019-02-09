<?php 
	$query= "SELECT random_key FROM reset_pwd_keys WHERE email_id= $email_id";
	$result= mysqli_query($query);
?>