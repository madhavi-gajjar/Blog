<?php	
	$conn= new mysqli($hostName, $username, $password, $databaseName);
	
	if (mysqli_connect_errno()) {
				echo mysqli_connect_error();
	
}	
?>