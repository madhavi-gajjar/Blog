<?php
	
	
	$title= $image= $content= $caption= $author= $category= $status="";
	$error= array();
	$update= false;
	if(isset($_REQUEST["GET"])){
		$update= true;
	}
	
			function validate($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			}
			
	
	if ($_SERVER["REQUEST_METHOD"]== "POST") {
			$title = validate($_POST["title"]);
			$content =validate($_POST["content"]);
			$caption = validate($_POST["caption"]);
			$author = validate($_POST["author"]);
			$cat_id= $_POST["category"];
			$email_id= $_SESSION["email_id"];	
			
				if (!empty($_POST["title"])) {
					$title = validate($_POST["title"]);
						} 
				else{
					add_error("Title required");
				}
				if (!empty($_POST["content"])) {
					$content= validate($_POST["content"]);
				}
				else{
					add_error("Content required");
					}
				if(!empty($_POST["status"])){
					$status= $_POST["status"];	
				}	
				else{
					add_error("Radio button not checked");

				}
					//image upload
			
			$fileName= $target_dir . basename($_FILES["image"]["name"]);
			if(($_FILES['image']['size'] <= 2097152) || ($_FILES["image"]["size"] != 0)){
					if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileName)) {
						$flag=1;
						}	
				
			}
			$image=basename( $_FILES["image"]["name"],".jpg");
					
					
			if(isset($_POST['done']) && $flag){
					
					$date = date('Y-m-d H:i:s');
					$query= "INSERT INTO blog_posts (post_title, post_content, post_image, post_caption, post_status, author, date_of_creation, cat_id, user_id ) VALUES('$title', '$content', '$image', '$caption', '$status','$author', '$date','$cat_id', (SELECT user_id FROM users WHERE email_id= '$email_id') )";
					$result = mysqli_query($conn, $query);	
					header("location: blog_post.php");
			}
					
				
			
				if( isset($_POST['update']) && $flag){

					
					$query= "UPDATE blog_posts SET  post_title='$title', post_content='$content', post_image='$image', post_caption='$caption', author= '$author', date_of_creation= '$date', cat_id='$cat_id', post_status= '$status' WHERE post_id= $post_id; AND user_id= (SELECT user_id FROM users WHERE email_id= '$email_id') ";
					$result= mysqli_query($conn, $query);
					header("location: blog_post.php");
	
			}
	}
	if(isset($_GET['delete'])){
			$email_id= $_SESSION['email_id'];
			$post_id= $_GET['delete'];
			$query= "DELETE FROM blog_posts WHERE post_id= 'post_id' AND user_id= (SELECT user_id FROM users WHERE email_id= '$email_id')";
			$result= mysqli_query($conn, $query);
			
			header("location: blog_list.php");
		
		
	}
		
	if(isset($_GET['edit'])){
			$email_id= $_SESSION['email_id'];
			$post_id= $_GET['edit'];
			$update= true;
			$query= "SELECT * FROM blog_posts WHERE post_id= '$post_id' AND user_id= (SELECT user_id FROM users WHERE email_id= '$email_id')";
			$result= mysqli_query($conn, $query);
			if(mysqli_num_rows($result)==1){
				$row= mysqli_fetch_array($result);
				$title= $row["post_title"];
				$content= $row["post_content"];
				$image= $row["post_image"];
				$caption= $row["post_caption"];
				$author= $row["author"];
				$status= $row["post_status"];
				
				header("location: blog_post.php?edit=$post_id");
	}
			
			
		}
		
		
		
?>