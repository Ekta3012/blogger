<?php 
		require 'connect.php';
		$username=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$date= date('Y-m-d');
		//$c_password=$_POST['c_password'];
		session_start();
		$_SESSION['user_name']=$username;
		$_SESSION['mail']=$email;
		$sql="INSERT INTO forminfo (username,email,password,d_o_register) VALUES ('$username','$email','$password','$date')";
		$query=mysqli_query($conn,$sql);
		if(!$query){
			//echo "failed";
			echo "<script>alert('username exists.Please, Try to register again');</script>";
		}
		else{
			//echo "sucessful";
			header('location:logged.php');
		}
?>