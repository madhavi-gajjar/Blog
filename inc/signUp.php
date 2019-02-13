<?php
	
	$f_name= $l_name= $email_id= $user_password= $repeat_password="";
	if(isset($_POST['cancel'])){
		header("location: signUp.php");
	}
	if (isset($_POST['submit'])){
		$f_name= $_POST["first_name"];
		$l_name= $_POST["last_name"];
		$email_id= $_POST["email_id"];
		$user_password=  md5($_POST['user_password']);;	
		if(!empty($f_name) && preg_match("/^[a-zA-Z]*$/", $f_name)){
			$f_name=  mysqli_real_escape_string($conn, $_POST['first_name']);
			
		}
		else{
			add_error("Empty/ invalid first name");
		}
		if(!empty($l_name) && preg_match("/^[a-zA-Z]*$/", $f_name)){
			$l_name=  mysqli_real_escape_string($conn, $_POST['last_name']);
			
		}
		else{
			add_error("Empty/ invalid last name");
		}
		if(!empty($email_id) && filter_var($email_id, FILTER_VALIDATE_EMAIL)){
			$email_id=  mysqli_real_escape_string($conn, $_POST['email_id']);
			
		}
		else{
			add_error( "Empty/ invalid email id");
		}
		
			$check_query= "SELECT * FROM users WHERE email_id= '$email_id'";
			$result= mysqli_query($conn, $check_query);
			
			if(mysqli_num_rows($result)>0)
			{
				add_error("This Email id already exists");
				
			}
			
			if(empty($POST['user_password'])){
				add_error( "Password not entered");
					
			}
			else if($_POST['user_password'] != $_POST['repeat_password']){
				add_error("Passwords dont match");
			}
			else{
				$user_password=  md5($_POST['user_password']);
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