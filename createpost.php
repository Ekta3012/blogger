<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger | create post</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		#createpost{
				margin-left: 150px;
				background-color: #FFF0F5;
				opacity: 0.7;
				padding: 20px;
				padding-left:50px ;
			}
			form{
				font-size: 25px;

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
		Blogger - New Post</p>
		<img src="<?php echo $_SESSION['imgsrc'];?>" class="header_img">
		<a href="dashboard.php"><p style="float:right; margin-right:20px; display:inline; font-size:30px; color:black;">
		<?php 
			echo $_SESSION['user_name'];
		?></p></a>
		<a href="home.php">
		<p style="float:right; margin-right:50px; font-size:30px; color:black;"><img src="home.png" width="50px" height="40px"></p></a>
		<a href="logout.php">
		<p style="float:right; margin-right:50px; font-size:30px; color:black;">Log out</p></a>
</div>
<div id="createpost">
	<?php 
		require 'connect.php';
		$blogtitle=$_POST['b_title'];
	?>
		<a href="dashboard.php">
		<button class="post" style="float:right; margin-top:25px; text-decoration:bold; margin-right:200px; line-height:20px;">Close</button>
		</a>
	<form method="post" action="postinsert.php">
		<!--Blogtitle : <input type="text" name="blogtitle" placeholder="Blog title">-->
		<p><font color="blue"><?php echo $blogtitle;?>.</font> Post <input type="text" placeholder="Post title" name="posttitle">
		<button style="font-size:17px; margin-left:100px; width:100px; height:30px; " name="b_title" value="<?php echo $blogtitle;?>">Publish</button></p><br><br>
		<textarea rows="10" cols="50" name="post"></textarea>
	</form>
	<br><br>
	</div>
</body>
</html>