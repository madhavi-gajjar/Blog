<?php

$error= array();
$flag=1;

function display_error(){
	global $error;
	foreach($error as $i){
		echo "Error occured: $i";
		echo "<br>";	
	}
}

function add_error($str){
	global $error;
	global $flag;
	$check= array_push($error, $str);
	if(!empty($check)){
		$flag=0;
	}
}


?>