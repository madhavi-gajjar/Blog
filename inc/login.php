<?php
	
		
	session_start();
		
	$email_id= $user_password= "";
	$error= "";
			
	function validate($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$user_password=  md5(validate($_POST['user_password']));
			$email_id= validate( $_POST['email_id']);
			
			$query= "SELECT * FROM users WHERE email_id='$email_id' AND user_password='$user_password'";
			$result = mysqli_query($conn, $query);
	
		if (mysqli_num_rows($result) == 1) {
		$_SESSION['email_id']= $email_id;
	
		header("location: blog_post.php");
			
			
		}
		else{
			$error= "Invalid details entered";
		}
		
	}
	
	
?>