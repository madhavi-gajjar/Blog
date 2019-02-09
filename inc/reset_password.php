<?php 
	session_start();
	
	$pwd= $repwd= "";
	$flag=1;
	$error= array();
	$email_id= $_SESSION['email_id'];
	$query= "SELECT email_id from users WHERE email_id= '$email_id'";
	$result= mysqli_query($conn, $query);
	
	if($_SERVER["REQUEST_METHOD"]== "POST"){
		if(isset($_POST['cancel'])){
			header("location: reset_password.php");
		}
		
		$pwd= md5($_POST["pwd"]);
		$repwd= md5($_POST["repwd"]);
		if(!empty($pwd) && !empty($repwd)){
			if($pwd== $repwd){
				$pwd= md5($_POST['pwd']);
			}
			else{
				array_push($error, "Passwords dont match");
				$flag=0;
			}
		}
		else{
			array_push($error, "Password field empty");
			$flag=0;
		}
		
		if(isset($_POST['reset']) && $flag){
			$query= "UPDATE users SET user_password= '$pwd' WHERE email_id= '$email_id' ";
			$result= mysqli_query($conn, $query);
			
			if($result== true){
				$query= "DELETE FROM reset_pwd_keys WHERE email_id= '$email_id' ";
				$result= mysqli_query($conn, $query);
				header("location: login.php");
				
			}
		}
	}

?>