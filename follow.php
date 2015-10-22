<?php 
	require 'connect.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogs | Follow</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<style>
		#sideleft{
			float: left;
			opacity:0.7;
			width:200px; 
			margin-left:70px;
			height:630px;
			padding-left:30px;
			padding-top: 30px;
			padding-right: 30px;
			font-size: 30px;
			
		}
		#sideright{
			float: right;
			font-size: 35px;
			background-color: #FFF0F5;
			opacity: 0.7;
			width:74%;
			padding-top: 10px;
			padding-left:20px;
			padding-bottom:20px; 
		}		
		a{
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
	<div id="header">
	<?php 
		$mysql="SELECT * FROM profileinfo";
		$mysql_run=mysqli_query($conn,$mysql);
		if(mysqli_num_rows($mysql_run)>0){
			while ($mysql_row=mysqli_fetch_assoc($mysql_run)) {
				$username=$mysql_row['email'];
				if($_SESSION['mail']==$username){
				$_SESSION['imgsrc']=$mysql_row['profile_img'];
				}
			}
		}
	?>
		<p style="display:inline; font-size:60px; color:#03a9f4; text-decoration:bold; margin-left:30px; font-family:Broadway;">
		Blogger - Dashboard</p>
		<a href="logout.php">
		<p style="float:right; margin-right:50px; font-size:30px; color:black;">Log out</p></a>
		<a href="home.php">
		<p style="float:right; margin-right:50px; font-size:30px; color:black;">Home</p></a>
		<img src="<?php echo $_SESSION['imgsrc']; ?>" class="header_img">
		<p style="float:right; margin-right:10px; display:inline; font-size:30px;">
		<?php 
			echo '<a href="dashboard.php">'.$_SESSION['user_name'].'</a>';
		?></p>
	</div>
	<div id="sideleft">
		<header><?php echo $_SESSION['user_name'];?>'s Blogs</header><br><br>
			<a href="profileview.php"><button>View Profile</button></a><br><br>
			<a href="newblog.php"><button>New Blog</button></a><br><br>
			<font color="blue">Reading List | All Blogs </font><br><br>
			<a href="follow.php"><button>Following</button>
		</div>
		<div id="sideright">
			<?php 
				$sql="SELECT  * FROM follow";
				$result=mysqli_query($conn,$sql);
				if(!$result){
					echo "failed";
				}
				if(mysqli_num_rows($result)>0)
				{
					while($sql_row=mysqli_fetch_assoc($result))
					{	
						//displaying blogs by user
						$follower=$sql_row['follower'];
						if($follower == $_SESSION['user_name']) // check for username and its blog in bloginfo table.
						{
							$username=$sql_row['username'];
							$blog_id=$sql_row['blog_id'];
							$user_id=$sql_row['user_id'];
							$mysql="SELECT * FROM bloginfo WHERE blog_id='$blog_id'";
							$myquery=mysqli_query($conn,$mysql);
							if(!$myquery){
								echo "failed";
							}
							else{
								$my_query=mysqli_query($conn,$mysql);
								if(mysqli_num_rows($my_query)>0){
									while($mysql_row=mysqli_fetch_assoc($my_query)){
										$blogtitle=$mysql_row['blogtitle'];
										$time=$mysql_row['time'];
										$date=$mysql_row['d_o_blog'];
								echo $blogtitle.'&nbsp &nbsp <font size="5px">-'.$username.'&nbsp &nbsp</font><font size="3px">'.$date.'&nbsp'.$time.'</font><br>';
								$mysql="SELECT * FROM postinfo WHERE blog_id='$blog_id'";	
								$query=mysqli_query($conn,$mysql);
								if(mysqli_num_rows($query)>0){
									while($sql_row=mysqli_fetch_assoc($query)){
										$b_title=$sql_row['blogtitle'];
										if($b_title==$blogtitle){
											$post=$sql_row['post'];
											$posttitle=$sql_row['posttitle'];
											$date=$sql_row['d_o_post'];
											$time=$sql_row['time'];
											echo'<p style="color:#03a9f4; font-size:25px;">'.$posttitle.'<font size="3px">&nbsp &nbsp'.$date.'&nbsp'.$time.'</font><br>'.$post.'</p>';	
											}
											
										}
									}		
									}
								}
							}
						// createpost ,viewpost, view blog.
						//in view blog we can like, comment, see blog with post, date of post.
						}
						
					}
				}
			?>
		</div> 
	</div>
</body>
</html>