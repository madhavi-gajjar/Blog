  <html>
	<head>
	
	<meta charset="utf-8">
    <meta name='viewport' content="width=device-width, initial-scale=1.0">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css"> 
	</head>
	<body>
		<div class="container-fluid nav-cont">
			<nav class="navbar navbar-expand-sm ">
				<a class="navbar-brand nav-list-logo" href="blog.php">Blogur</a>
				<ul class="navbar-nav navbar-right">
					<li class="nav-item item-1">
						<a class="nav-link" href="blog_post.php">Create Blog</a>
					</li>
					<li class="nav-item item-1">
						<a class="nav-link" href="blog_list.php">Blogs' List</a>
					</li>
					<li class="nav-item item-1">
						<a class="nav-link" href="blog_read.php">Read Blogs</a>
					</li>
					<li class="nav-item item-1">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item item-1">
					<select class="form-control" onchange="location = this.value;">
							<option value="">Account</option>
							<option value="login.php">Login</option>
							<option  value="logout.php">Logout</option>
						</select> 
					</li>
				</ul>
			</nav>
        </div>
		
