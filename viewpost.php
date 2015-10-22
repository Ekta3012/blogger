<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger - post</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		#content{
				background-color: #FFEBCD;
				width: 90%;
				height: 100%;
				margin-left: 105px;
				padding-left: 30px;
				padding-top: 30px;
				padding-bottom: 50px;
				opacity: 0.7;
			}
	</style>
</head>
<body>
	<div id="header">
		<p style="display:inline; font-size:60px; color:#03a9f4; text-decoration:bold; margin-left:30px; font-family:Broadway;">
		Blogger - Posts</p>
		<a href="logout.php">
		<p style="float:right; margin-right:50px; font-size:30px; color:black;">Log out</p></a>
		<img src="<?php echo $_SESSION['imgsrc'];?>" class="header_img">
		<a href="dashboard.php"><p style="float:right; color:black; margin-right:20px; display:inline; font-size:30px;">
		<?php 
			echo $_SESSION['user_name'];
		?></p></a>
	</div>
	<div id="content">
	<h1>Posts Made By You</h1>
	<?php 
		require 'connect.php';
		$username=$_SESSION['user_name'];
		$b_id=$_POST['id1'];
		$sql = "SELECT * FROM postinfo /*WHERE username='$username'*/";
		$result=mysqli_query($conn,$sql);
		if(!$result){
			echo "failed";
		}
		else {
			//echo "sucessful";
		}
		$mysql_run=mysqli_query($conn,$sql);
		if(isset($_SESSION['user_name']) && isset($_SESSION['mail']))
			{  
				if(mysqli_num_rows($mysql_run)>0)
				{
					while($sql_row = mysqli_fetch_assoc($mysql_run))
					{	
						$posttitle=$sql_row['posttitle'];
						$post=$sql_row['post'];
						$dateofpost=$sql_row['d_o_post'];
						$user_name=$sql_row['username'];
						$blogid=$sql_row['blog_id'];
						if($user_name==$username)
						{	if($b_id==$blogid)    //displays the post of the blog on which you click.
							{
								$time=$sql_row['time'];
							echo '<div id="posts" style="width:80%; height:100%;">
									<span style="text-decoration:bold; font-size:30px;">'. $posttitle.'<span style="font-size:15px; margin-left:10px;">'.$dateofpost.'&nbsp &nbsp'.$time.'</span></span><br>
									<span style="font-size:20px;">'. $post.'</span></div>';
							echo'<br><br>';
								
							}
						}
					}
				}
			}
		
	?>
	<!--<?php //echo $_POST['comment'];?>-->
	</body>
</html>