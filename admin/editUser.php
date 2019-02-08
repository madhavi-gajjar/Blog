<?php
	include "addUser.php";
	if(isset($_GET['edit'])){
			$user_id= $_GET['edit'];
			$update= true;
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

?>