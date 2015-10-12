<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
	#content{
		margin-right:350px;
		font-size: 25px;
		margin-top: 50px;
		float: right;
		height: 250px;
		background-color: #FFB6C1;
		opacity: 0.7;
		width: 500px;
		padding: 20px;
	}
	.input{
		width: 300px;
		height: 30px;
		float: right;
		margin-right: 80px;
	}
	</style>
</head>
<body>
	<div id="header">
	<p style="display:inline; font-size:60px; color:#fff; text-decoration:bold; margin-left:30px; font-family:Broadway;">Blogger - Log In</p></div>
			<div id="content">
			<form action="loginsucess.php" method="post">
				<label>Email:</label>
				<input type="text" name="email" placeholder="email" class="input"><br><br>
				<label>Password:</label>
				<input type="password" name="password" placeholder="********" class="input"><br><br>
				<input type="checkbox" style="padding-left:0px; display:inline; width:20px; height:20px;">
				<p style="display:inline;">Remember Me</p> <!--reset password--><br><br>
				<button>Log in</button>
			</form>
		</div>
	<!--<?php 
		//require 'connect.php';
		//session_start();
		//if(isset($_POST['submit']))
		{
		//	if(empty($_POST['username'])||empty($_POST['email']))
		//	{echo "name and email required";}
		}
		//$username=$_POST['username'];
		//$email=$_POST['email'];
		//$password=$_POST['password'];
		
	?>-->
</body>
</html>