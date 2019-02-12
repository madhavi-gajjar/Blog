<?php
	include "inc/config.php";
	include "inc/connection.php";
	include "inc/validate_login.php";
	include "inc/category_dropdown.php";
	include "inc/blog_post.php";
	include "header.php";
	
?>


	<form method="post" action="" enctype="multipart/form-data"> 
	<?php
		foreach($error as $i){
			echo "Error occured: $i";
			echo "<br>";
		}
	?>
	
		<input type="hidden" name="post_id" value="<?php echo $post_id ?>" >
			<div class= "container-fluid form-group select-container">
					<div class="row">
						<label for="sel" class="col-sm-3 control-label">Select Category:</label>
						<select class="form-control col-sm-9 select-btn" name="category" required>
							<?php while($row= mysqli_fetch_assoc($res)){
							echo "<option value='".$row['cat_id']."' >". $row['post_category'] . "</option>";
							}?>
						</select> 
					</div>
			</div>
            <div class= "container-fluid title-container">
			<div class="form-group">
            <input class="form-control post-title" type="text" placeholder="Post Title here" name="title" value="<?php echo $title; ?>" >
        </div>
        </div>
        <div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<div class="row">
						<div class= "form-group">
							<label for="image">Upload Image :</label>
							<input class="form-control post-image" type="file" name="image"  value="<?php echo"<img src= $target_dir$image.jpg>"; ?>">
						
						
						</div>
					</div>
					
                
					<div class="row">
						<div class= "form-group">
							<input class="form-control post-cap"  type="text" placeholder="Image Caption" name="caption" value="<?php  echo $caption; ?>">
						</div>
					</div>
                
            </div>
                
					<div class="col-sm-9">
                <input class="form-control post-content" type="text" placeholder=" Post Content here" name="content" value="<?php  echo $content; ?>" >  
					</div>
				</div>
			</div>
			 <div class="container-fluid form-group btn-container">
				<div class="row">
					
					<div class="col-sm-5">
						<input class= "form-control publish-btn" type="text" placeholder="Author" name="author" value="<?php echo $author; ?>">
					</div>
					<div class="col-sm-5">
						<label class="radio-inline">
							<input type="radio" name="status" value= "private" <?php if($status== 'private'){ echo "checked";}
								?> >Private
						</label>
						<label class="radio-inline">
							<input type="radio" value="draft" name="status" <?php if($status== 'draft'){echo "checked";} ?> >Save Draft
						</label>
				
					
						<label class="radio-inline">
							<input type="radio" value="published" name="status" <?php if($status== 'published'){echo "checked";}?> >Publish
						</label>
						
						
						
					 </div>
					 <div class="col-sm-2">
					 <?php if($update == true): ?>
						<label class="radio-inline">
							<button class="form-control" type="submit" name="update" >Update
						</label>
						
						<?php else: ?>
						<button class="form-control" type="submit" name="done">Done</button>
						<?php endif; ?>
					 </div>
					
				</div>
			</div>
	</form>

   
   <?php
    include "footer.php";
   ?>
	
	