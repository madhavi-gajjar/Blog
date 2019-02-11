<?php
	ob_start();
	$firstName= $lastName= $email= $pwd= $repPwd= $status= "";
	$update= false;
	$error= array();
	

	if(isset($_GET['edit'])){
		$update = true;
	}
	
			
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		if(isset($_POST['cancel'])){
				header("location: user.php");
			}
		if(isset($_POST['cancel_update'])){
				header("location: userList.php");
			}
            $flag = 1;
			$email= $_POST['email'];
			$date= date('Y-m-d H:i:s');
			$user_id= $_POST['user_id'];
			$firstName= $_POST['firstName'];
			$lastName= $_POST['lastName'];
			$pwd= md5($_POST['pwd']);
			$repPwd= md5($_POST['repPwd']);
			if(isset($_POST['status'])){
				$status= $_POST['status'];
			}
			else{
				$status= 0;
			}
			if(!empty($_POST['firstName']) && preg_match("/^[a-zA-Z]*$/", $_POST['firstName'])){
				$firstName= $_POST['firstName'];
				}
			else{
				array_push($error, "Invalid/empty first name") ;
                $flag=0;
                
			}
		
			if(!empty($_POST['lastName']) && preg_match("/^[a-zA-Z]*$/", $_POST['lastName'])){
				$lastName= $_POST['lastName'];
			}
			else{
				array_push($error,"Invalid/empty last name");
				$flag=0;
				
			}

			$check_query= "SELECT * FROM users WHERE email_id= '$email' ";
			$check_result= mysqli_query($conn, $check_query);
			
			if(mysqli_num_rows($check_result)>0 && isset($_POST['submit'])){
				array_push($error,"Email id already exists");
                $flag=0;
			}
			else if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$email= $_POST['email'];
			}
			else{
				array_push($error, "Email id not entered");
                $flag=0;
			
			}
			
			
			if(empty($_POST['pwd']) && isset($_POST['update'])){
				$query= "SELECT * FROM users WHERE user_id= '$user_id'";
				$result= mysqli_query($conn, $query);
				$row= mysqli_fetch_array($result);
				$pwd= $row['user_password'];
				
				
			}
				
			else if(!empty($_POST['pwd'])){
				if($_POST['pwd']== $_POST['repPwd']){
					$pwd= md5($_POST['pwd']);}
				else{
					array_push($error,"Passwords dont match");
                    $flag=0;
				}
			}
			
			
			else{
				array_push($error,"Password not entered");
                $flag=0;
				
			}
		
			if(isset($_POST['submit']) && $flag){
				
				$query= "INSERT INTO users( email_id, user_password, registration_date, f_name, l_name, role, user_status) VALUES ( '$email', '$pwd', '$date', '$firstName', '$lastName', 'author', '$status')";
				$result= mysqli_query($conn, $query);
				
				if($result== TRUE){
					header("location: userList.php");
					}
			}

			if(isset($_POST['update']) && $flag){
				
				$query= "UPDATE users SET email_id='$email', user_password='$pwd', registration_date= '$date', role='author', f_name= '$firstName', l_name= '$lastName', user_status= '$status' WHERE user_id= '$user_id'";
				
				$result_update= mysqli_query($conn, $query);
					
					if($result_update== true){
					header("location: userList.php");
					}
			}
	}
	else
	{	


		if(isset($_GET['edit'])){
			$user_id= $_GET['edit'];			
			$query= "SELECT * FROM users WHERE user_id= '$user_id'";
			$res= mysqli_query($conn, $query);
			if(mysqli_num_rows($res)==1){
				$row= mysqli_fetch_array($res);
				$firstName= $row['f_name'];
				$lastName= $row['l_name'];
				$email= $row['email_id'];
				$status= $row['user_status'];
				}
		}
	

			

		if(isset($_GET['delete'])){
			$user_id= $_GET['delete'];
			$query= "DELETE FROM users WHERE user_id= '$user_id'";
			$result= mysqli_query($conn, $query);
		
			header("location: userList.php");
		}
		
	}
//ob_end_flush();
?> 