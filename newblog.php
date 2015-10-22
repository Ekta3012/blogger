<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger | New Blog </title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
	a{
		text-decoration: none;
	}
	#content{
		background-color: #FFF0F5;
		width: 1085px;
		height: 475px;
		margin-left: 200px;
		opacity: 0.7;
		padding: 40px;
		font-size: 25px;
	}
	select{
		width: 200px;
		height:50px;
		font-size: 25px;
		color: #B22222;
	}
	input{
		width: 300px;
		height:30px;
		font-size: 25px;
		color: #B22222;
		margin-left: 20px;
	}
	</style>
</head>
<body>
<div id="header">
		<p style="display:inline; font-size:60px; color:#03a9f4; text-decoration:bold; margin-left:30px; font-family:Broadway;">
		Blogger - New Blog</p>
		<img src="<?php echo $_SESSION['imgsrc'];?>" class="header_img">
		<a href="dashboard.php"><p style="float:right; margin-right:20px; display:inline; font-size:30px; color:black;">
		<?php 
			echo $_SESSION['user_name'];
		?></p></a>
		<a href="logout.php">
		<p style="float:right; margin-right:100px; font-size:30px; color:black;">Log out</p></a>
	</div>
	<div id="content">
		<a href="dashboard.php"><button style="float:right; margin-right:150px;">Cancel</button></a>
		<h2>Blog List - <span >Create a new Blog</span></h2>
		<form method="post" action="blogsinsert.php">
		Title : <input type="text" name="title"><br><br>
		<select name="privacy">
			<option>public</option>
			<option>private</option>
		</select><br><br>
		<button style="width:200px;">Create Blog!</button>
		</form>
		
	</div>
</body>
</html>