<?php 
	session_start();
	
	$pwd= $repwd= "";
	$flag=1;
	$error= array();
	$email_id= $_SESSION['email_id'];
	$query= "SELECT email_id FROM users WHERE email_id= '$email_id'";
	$result= mysqli_query($conn, $query); 
	$query= "SELECT * FROM reset_pwd_keys WHERE email_id= '$email_id'";
	$res= mysqli_query($conn, $query);
	while($row= mysqli_fetch_array($res)){
		$date_mod= $row['date_modified'];
		$date_mod= strtotime($date_mod);
		$diff= $date_mod- time();
		$hrs= round($diff / 3600);
		if($hrs>24){
			array_push($error, "Key expired, cannot reset password");
			$flag= 0;
			
		}
		
	}
	
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