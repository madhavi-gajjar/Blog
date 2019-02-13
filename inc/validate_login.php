<?php
	session_start();
		if(empty($_SESSION["email_id"])) {
			header("location: login.php");
		}
		
?>