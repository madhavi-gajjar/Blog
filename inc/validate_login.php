<?php
	session_start();
		if(empty($_SESSION["email_id"]) && $_SESSION["email_id"] !='$email_id' && empty($_SESSION["user_password"]) && $_SESSION["user_password"]!= '$user_password'){
				header("location: login.php");
		}
		
?>