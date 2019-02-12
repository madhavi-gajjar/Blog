<?php

	$title= $image= $content= $caption= $author= $category= $status= "";
	$error= array();
	$update= false;
	
	
		function validate($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			}
			
	
	if ($_SERVER["REQUEST_METHOD"]== "POST") {
			$title =$_POST["title"];
			$content =$_POST["content"];
			$caption = $_POST["caption"];
			$author = $_POST["author"];
			$cat_id= $_POST["category"];
			$post_id= $_POST["post_id"];
			$email_id= $_SESSION['email_id'];	
			$flag= 1;
				if (!empty($_POST["title"])) {
					$title = validate($_POST["title"]);
					} 
				else{
					array_push($error, "Title is required");
					$flag= 0;
				}
				if (!empty($_POST["content"])) {
					
					}
				else{
					array_push($error, "Content is required");
					$flag= 0;
				}
				if(!empty($_POST["status"])){
					$status= $_POST["status"];
				}
				else{
					array_push($error, "Check radio button of your choice");
					$flag= 0;
				}
	
					//image upload
			
			$fileName= $target_dir . basename($_FILES["image"]["name"]);
			if(($_FILES['image']['size'] <= 2097152) || ($_FILES["image"]["size"] != 0)){
					if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileName)) {
						echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
						}	
					else {
							array_push($error, "File not uploaded");
							$flag= 0;
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
					header("location: blog_list.php");
				

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
			if(mysqli_num_rows(result)==1){
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