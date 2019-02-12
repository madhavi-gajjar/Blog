<?php

function display_error(array $error){
	
	foreach($error as $i){
		echo "Error occured: $i";
		echo "<br>";
		
	}
}


?>