<?php
	
	$f_name= $l_name= $email_id= $user_password= $repeat_password="";
	$error= array();
	
	if (isset($_POST['submit'])){
		$flag= 1;
		$f_name= $_POST["first_name"];
		$l_name= $_POST["last_name"];
		$email_id= $_POST["email_id"];
		$user_password=  md5($_POST['user_password']);;	
		if(!empty($f_name) && preg_match("/^[a-zA-Z]*$/", $f_name)){
			$f_name=  mysqli_real_escape_string($conn, $_POST['first_name']);
			
		}
		else{
			array_push($error, "Empty/ invalid first name");
		}
		if(!empty($l_name) && preg_match("/^[a-zA-Z]*$/", $f_name)){
			$l_name=  mysqli_real_escape_string($conn, $_POST['last_name']);
			
		}
		else{
			array_push($error, "Empty/ invalid last name");
			$flag=0;
		}
		if(!empty($email_id) && filter_var($email_id, FILTER_VALIDATE_EMAIL)){
			$email_id=  mysqli_real_escape_string($conn, $_POST['email_id']);
			
		}
		else{
			array_push($error, "Empty/ invalid email id");	
			$flag=0;
		}
			
		if($_POST['user_password'] != $_POST['repeat_password']){
			  array_push($error, "Passwords dont match");
		  }
		  else if(empty($email_id)){
		  	array_push($error, "Password not entered");
		  	$flag=0;
		  }
		  else{
				$user_password=  md5($_POST['user_password']);;
			}
		

			$check_query= "SELECT * FROM users WHERE email_id= '$email_id'";
			$result= mysqli_query($conn, $check_query);
			
			if(mysqli_num_rows($result)>0)
			{
				array_push($error, "This Email id already exists");
				$flag=0;
				
			}
			
			if($flag){
				$date = date('Y-m-d H:i:s');
				$query = "INSERT INTO users (email_id, user_password, registration_date, f_name, l_name, role, user_status) 
						  VALUES('$email_id', '$user_password', '$date', '$f_name', '$l_name','author', '0')";
				$result = mysqli_query($conn, $query);
				header("location: signUp.php");
				}
				
				
			}
	
	
	
		
	

	
?>