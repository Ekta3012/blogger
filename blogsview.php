<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="header">
		Blogger 
		<a href="createpost.php"><button>Create post</button></a>
		<a href="viewpost.php"><button>View post</button> 
		<a href="dashboard.php"></a><button>View Blog</button></a>
		<a href="logout.php">
		<p style="float:right; margin-right:100px; font-size:30px; color:black;">Log out</p></a>
	</div>
	<header>
		My Blogs <?php echo $_SESSION['blogs']; ?>
	</header>
	<div id="sideleft">
		<button>New Post</button><br>
		Overview<br>
		<ah href="postview.php">Posts</a><br>
		Pages<br>
		Settings<br>
	</div>
</body>
</html>