<?php
	require 'connect.php';
	$c_id=$_POST['delete'];
	$sql="DELETE FROM comment WHERE comment_id=$c_id ";
	$query=mysqli_query($conn,$sql);
	if(!$query){
		echo 'failed';
	}
	else{
		header('location:blogs.php');
	}
?>