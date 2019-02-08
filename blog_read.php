<?php
	include "inc/config.php";
	include "inc/connection.php";
	include "inc/blog_read.php";
	include "header.php";
?>

		<form method="post" action="blog_read.php">
			<?php 
			while($row = mysqli_fetch_array($result))
				{
			echo "<div class='container-fluid'>";
				echo"<div class='row'>";
					echo "<h2>" .$row['post_title']. "</h2>";
				
				echo"</div>";
			
		
				echo"<div class='row'>";
					echo"<div class='col-sm-4 ' >";
							
							echo"<img class='display-post-image' src= 'uploads/$row[3].jpg'>" ;
							
							
					echo"</div>";
				echo"<div class='col-sm-8'>";
						echo "<p>" .$row['post_content']. "</p>";
					echo"</div>";
				echo"</div>";
			echo "</div>" ; 
			
			}
		?>
		</form>
	<?php
     include "footer.php";
   ?>