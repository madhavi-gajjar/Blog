<?php

	$query= "SELECT post_id, post_title, date_of_creation, author FROM blog_posts";
	$result= mysqli_query($conn, $query);
	
?>