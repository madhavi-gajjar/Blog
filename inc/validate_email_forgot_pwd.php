<?php 
	
	session_start();
	$email_id= $error= "";
	
	function randomKeys(){
		$key="";
	
		$chars= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	
		$len= strlen($chars);
	
		for($i=0; $i< 9; $i++){
			$index = rand(0, $len - 1); //pickup characters from string
			$key = $key . $chars[$index];
		}
	
		return  $key;
	}
	
	if($_SERVER["REQUEST_METHOD"]== "POST"){
		$date= date('Y-m-d H:i:s');
		$email_id= $_POST['email_id'];
		$query= "SELECT user_id, email_id FROM users WHERE email_id= '$email_id' AND role='author' ";
		$result= mysqli_query($conn, $query);
		while($row= mysqli_fetch_array($result)){
			$user_id= $row["user_id"];
		}
		
		if(mysqli_num_rows($result) == 1){
			$_SESSION["email_id"]= $email_id;
			$key= randomKeys();
			$query= "INSERT INTO reset_pwd_keys(user_id, email_id, random_key, date_modified) VALUES('$user_id', '$email_id', '$key', '$date')";
			$result= mysqli_query($conn, $query);
			if($result== true){
			header("location: display_key.php?key=$key");
			}
		}
		
		else{
			$error= "Invalid Email id";
		}
	}
	
	
	

?>