<?php 
	session_start();
		session_destroy();
		//echo "you are sucessfully logged out".'<br>';
		header('location:home.php');
?>