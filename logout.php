<?php 
	session_start();
		session_destroy();
		//echo "you are sucessfully logged out".'<br>';
		//echo '<a href="home.php">Login </a>';
		header('location:home.php');
?>