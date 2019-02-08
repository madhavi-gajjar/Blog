<?php
	ob_start();
	
	$email_id= $user_password= $repeat_password="";
	$emailErr= $pwdErr= "";
	
	if (isset($_POST['submit'])){
			
		$f_name=  mysqli_real_escape_string($conn, $_POST['first_name']);
		$l_name=  mysqli_real_escape_string($conn, $_POST['last_name']);
		$email_id=  mysqli_real_escape_string($conn, $_POST['email_id']);
		$user_password=  md5($_POST['user_password']);;	
			
		if(empty($f_name) || empty($l_name) || empty($email_id) || empty($user_password)){
			echo "Fill all the details";
			header("location: signUp.php");
			exit();
		}
		else{
			if(!preg_match("/^[a-zA-Z]*$/", $f_name) || !preg_match("/^[a-zA-Z]*$", $l_name)){
			echo "Enter valid details";
			header("location: signUp.php");
			exit();
			}
			
			else if(!filter_var($email_id, FILTER_VALIDATE_EMAIL )){
				echo "Enter valid email address";
				exit();
			}
		
		if($_POST['user_password'] != $_POST['repeat_password']){
			  echo "Passwords don't match";
			  exit();
		  }
		  else{
				$user_password=  mysqli_real_escape_string($conn, $_POST['user_password']);
			}
		
			$check_query= "SELECT * FROM users WHERE email_id= '$email_id'";
			$result= mysqli_query($conn, $check_query);
			
			if(mysqli_num_rows($result)>0)
			{
				echo "This Email id already exists";
				exit();
			}
			
			else{
			
		
				$date = date('Y-m-d H:i:s');
				$query = "INSERT INTO users (email_id, user_password, registration_date, f_name, l_name) 
						  VALUES('$email_id', '$user_password', '$date', '$f_name', '$f_name')";
				$result = mysqli_query($conn, $query);
					if($result== FALSE){
						print_r($conn->error_list);
						die();
		}
			}
	
	
		header("location: signUp.php");
		
	}
	ob_end_flush();
	
?>