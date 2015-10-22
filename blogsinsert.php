<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger | My Blogs</title>
	<style type="text/css">
	body{
			background-color: #CD853F;
			margin: 0px;
		}
	button{
		margin-left: 10px;
	}
	#header{
				height: 100px;
				background-color: #8B4513;
				line-height: 80px;
			}

	</style>
</head>
<body>
	<?php
		require 'connect.php'; 
		date_default_timezone_set("Asia/Calcutta");
		$title=mysqli_real_escape_string($conn,$_POST['title']);
		$username=$_SESSION['user_name'];
		$_SESSION['blogtitle']=$title;
		$userid=$_SESSION['userid'];
		$privacy=$_POST['privacy'];
		if($privacy=="private"){
			$privacy=1;
		}
		else{
			$privacy=0;
		}
		$dateofblog=date('Y-m-d');
		$monthofblog=date('m');
		$time=date('h:i:sa');
		$sql="INSERT INTO bloginfo (user_id,blogtitle,username,d_o_blog,flag,time,m_o_blog) VALUES ('$userid','$title','$username','$dateofblog','$privacy','$time','$monthofblog')";
		$query=mysqli_query($conn,$sql);
		if(!$query){
			echo "failed";
		}
		else{
		//	echo "sucessfull";
			header('location:dashboard.php');
		}
		
	?>
	
	</body>
</html>