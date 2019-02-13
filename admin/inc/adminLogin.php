<?php
	
	session_start();
	
	$email= $pwd= "";
	
	function validate($data){
		$data= trim($data);
		$data= stripslashes($data);
		$data= htmlspecialchars($data);
		return $data;
	}
	
	if($_SERVER["REQUEST_METHOD"]== "POST"){
		$email= validate($_POST["email"]);
		$pwd= md5(validate($_POST["pwd"]));
			
		$query= "SELECT email_id, user_password FROM users WHERE email_id='$email' AND user_password='$pwd' AND role='admin'";
		$result=mysqli_query($conn, $query);
		
		if (mysqli_num_rows($result) == 1) {
		$_SESSION['email']= $email;
		header("location: userList.php");
		}
		else{
			add_error("Invalid details entered");
					
		}
		
		
		
	}

	
	
?>