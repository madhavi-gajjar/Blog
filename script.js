function login(){
	
	var txt= window.confirm("Require login to create a blog");
	if(txt){
		window.location.href= "login.php";
	}
	else{
		window.location.href= "blog.php";
	}
}
