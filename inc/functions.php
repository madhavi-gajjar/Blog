<?php

function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$query = "SELECT * FROM blog_posts WHERE status='published'";
	$result = mysqli_query($conn, $query);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
}

function func(){
	if(isset($_POST['$sub'])){
		if(empty($_POST['$data'])){
			$error_msg= "Required field";
			echo $errormsg;
		}
		else{
			$data_var= '$_POST['$data']';
		}
}


?>