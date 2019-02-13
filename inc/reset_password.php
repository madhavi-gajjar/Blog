<?php 
	session_start();
	
	$pwd= $repwd= $email_id= "";
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
		if($hrs > 24){
			add_error("Key expired", 0);
			
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
				add_error("Passwords dont match", 0);
			}
		}
		else{
			add_error("Password field empty", 0);
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