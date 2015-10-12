<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		#content{
			background-color:#FFF0F5; 
			opacity:0.7; 
			width:92%; 
			height:100%;
			margin-left:108px;
			padding-bottom:20px;
		}
	</style>
</head>
<body>
<div id="header">
		<p style="display:inline; font-size:60px; color:#fff; text-decoration:bold; margin-left:30px; font-family:Broadway;">Blogger - blogs</p>
		<a href="home.php"><p style="float:right; margin-right:50px; font-size:30px; color:black;">Home</p></a>
		<?php if(isset($_SESSION['user_name'])||isset($_SESSION['mail']))
				{
					echo'<img src="$_SESSION["imgsrc"]" style="border-radius:20px; width:40px; margin-top:10px; height:40px; float:right; margin-right:50px;">';
					echo '<p style="font-size:30px; color:black; text-decoration:bold; margin-right:80px; float:right;">'.$_SESSION["user_name"].'</p>';
					echo '<a href="logout.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:20px; float:right;">Log out</p></a>';
				}
				else{
					echo'<a href="login.php"><p style="font-size:30px; color:black; text-decoration:bold; margin-right:20px; float:right;">Log in</p></a>';
				}
		?>
</div>
<div id="content">
		<?php 
			require 'connect.php';
			$month=$_POST['month'];
			$date=date_parse($month); // converts month string into integer form.
			var_dump($date['month']);
			$sql="SELECT blogtitle,username,d_o_blog FROM bloginfo";
			$query=mysqli_query($conn,$sql);
			if(!$query){
				echo "failed";
			}
			else{
				echo "sucess";
			}
			$sql_run=mysqli_query($conn,$sql);
			if(mysqli_num_rows($sql_run)>0){
				while($sql_row=mysqli_fetch_assoc($sql_run))
				{
					$blogtitle=$sql_row['blogtitle'];
					$username=$sql_row['username'];
					$dateofblog=$sql_row['d_o_blog'];
					//$month_s=DATE_FORMAT($dateofblog,'%c');
					$month_s= date('M',$dateofblog);
					if($date==$month_s)
					{
					echo $blogtitle.'<br>'.$username;
					}
				}
			}
		?>
</div>
</body>
</html>