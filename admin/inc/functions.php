<?php

$errors= array();
$flag=1;

function display_errors(){
	global $errors;
	foreach($errors as $i){
		echo "Error occured: $i";
		echo "<br>";	
	}
}

function add_error($str){
	global $errors;
	global $flag;
	$check= array_push($errors, $str);
	if(!empty($check)){
		$flag=0;
	}
}


?>