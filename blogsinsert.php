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
		$title=$_POST['title'];
		$address=$_POST['address'];
		$username=$_SESSION['user_name'];
		$_SESSION['blogtitle']=$title;
		$privacy=$_POST['privacy'];
		if($privacy=="private"){
			$privacy=1;
		}
		else{
			$privacy=0;
		}
		$dateofblog=date('Y-m-d');
		$sql="INSERT INTO bloginfo (blogtitle,address,username,d_o_blog,flag) VALUES ('$title','$address','$username','$dateofblog','$privacy')";
		$query=mysqli_query($conn,$sql);
		if(!$query){
			echo "failed";
		}
		else{
		//	echo "sucessfull";
			header('location:dashboard.php');
		}
	?>
	<!--<div id="header">
		Blogger 
		<a href="createpost.php"><button>Create post</button></a>
		<a href="viewpost.php"><button>View post</button> 
		<a href="dashboard.php"></a><button>View Blog</button></a>
	</div>
	<header>
		My Blogs <?php// echo $_SESSION['blogs']; ?>
	</header>
	<div id="sideleft">
		<button>New Post</button><br>
		Overview<br>
		Posts<br>
		Pages<br>
		Settings<br>
	</div-->
	</body>
</html>